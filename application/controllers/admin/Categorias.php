<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->model('categorias_model','categories');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'LojasWEB - Categorias cadastradas';
		$data['title_h2'] = 'Categorias cadastradas';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/categorias/listar';

		$data['categorias'] = $this->categories->getCategorias() ;


		$this->load->view('admin/template/index', $data);
	}

	public function modulo($id=NULL)
	{
		if($id){
			$data['title']='Atualizar categoria';
			$data['it_category'] = $this->categories->getCategoria($id)->row();
			if(!$data['it_category']){
				setMsg('message','Categoria não foi encontrada.','Ops! um erro aconteceu.','erro');
				redirect('admin/categorias','refresh');
			}
		}else{
			$data['title']='Novo cadastro';
			$data['it_category'] = NULL;
		}
		$data['title_h2'] = 'Cadastrar Categoria';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'previous_page' => base_url('admin/categorias'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		//$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/categorias/modulo';
		$this->load->view('admin/template/index', $data);
	}
	public function core()
	{
		$this->form_validation->set_rules('name', 'Nome', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == TRUE) {
			$dadosCategoria['nome'] = $this->input->post('name');
			$dadosCategoria['ativo'] = $this->input->post('active');

			if($this->input->post('id')){
				$this->categories->doUpdate($dadosCategoria,$this->input->post('id'));
				redirect('admin/categorias', 'refresh');
			}else{
				$this->categories->doInsert($dadosCategoria);
				redirect('admin/categorias/modulo', 'refresh');
			}
		} else {
			$this->modulo();
		}

	}
}

/* End of file Controllername.php */

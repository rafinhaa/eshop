<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->model('clientes_model','clients');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'LojasWEB - Clientes cadastrados';
		$data['title_h2'] = 'Clientes cadastrados';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/clientes/listar';

		$data['clientes'] = $this->clients->getClientes() ;


		$this->load->view('admin/template/index', $data);
	}

	public function modulo($id=NULL)
	{
		if($id){
			$data['title']='Atualizar cadastro';
			$data['it_client'] = $this->clients->getCliente($id)->row();
			if(!$data['it_client']){
				setMsg('message','Cliente não foi encontrado.','Ops! um erro aconteceu.','erro');
				redirect('admin/clientes','refresh');
			}
		}else{
			$data['title']='Novo cadastro';
			$data['it_client'] = NULL;
		}
		$data['title_h2'] = 'Cadastrar Clientes';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'previous_page' => base_url('admin/clientes'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		//$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/clientes/modulo';
		$this->load->view('admin/template/index', $data);
	}

	public function core()
	{
		echo '<pre>';
		 print_r($this->input->post());
		 exit;
	}
}

/* End of file .php */

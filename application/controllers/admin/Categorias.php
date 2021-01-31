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
		foreach($data['categorias'] as $key => $value)
		{
			$value->id_categoriapai = $this->categories->getCategoriaPaiNome($value->id_categoriapai);
		}
		$this->load->view('admin/template/index', $data);
	}

	public function modulo($id=NULL)
	{
		if($id){
			$data['title']='Atualizar categoria';
			$data['it_category'] = $this->categories->getCategoria($id);
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
		$data['cat_pai'] = $this->categories->getCatPai();
		$data['view'] = 'admin/categorias/modulo';
		$this->load->view('admin/template/index', $data);
	}
	public function core()
	{
		$this->form_validation->set_rules('name', 'Nome', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == TRUE) {
			$dadosCategoria['nome'] = $this->input->post('name');
			$dadosCategoria['ativo'] = $this->input->post('active');

			if($this->input->post('id_categoria_pai')){
				$dadosCategoria['id_categoriapai'] = $this->input->post('id_categoria_pai');
			}else{
				$dadosCategoria['id_categoriapai'] = NULL;
			}
			if($this->input->post('id')){
				$dadosCategoria['ultima_atualizacao'] = dataDiaDb();
				if($this->categories->doUpdate($dadosCategoria,$this->input->post('id'))){
					setMsg('message','Categoria alterada.','Sucesso!','sucesso');
				}else{
					setMsg('message','Categoria não foi alterada.','Ops! um erro aconteceu.','erro');
				}
				redirect('admin/categorias', 'refresh');
			}else{
				if($this->categories->doInsert($dadosCategoria)){
					setMsg('message','Categoria cadastrada.','Sucesso!','sucesso');
				}else{
					setMsg('message','Categoria não foi cadastada.','Ops! um erro aconteceu.','erro');
				}
				redirect('admin/categorias/modulo', 'refresh');
			}
		} else {
			$this->modulo();
		}

	}
	public function delete($id=NULL){
		if($id){
			if($this->categories->doDelete($id)){
				setMsg('message','Categoria deletada.','Sucesso!','sucesso');
				redirect('admin/categorias', 'refresh');
			}else{
				setMsg('message','Categoria não foi deletada.','Ops! um erro aconteceu.','erro');
				redirect('admin/categorias', 'refresh');
			}
		}else{
			setMsg('message','Categoria não foi deletado.','Ops! um erro aconteceu.','erro');
			redirect('admin/clientes', 'refresh');
		}
	}
}

/* End of file Controllername.php */

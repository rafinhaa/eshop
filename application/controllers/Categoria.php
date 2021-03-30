<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
		$this->load->model('loja/loja_model');
		$this->load->model('loja/categoria_model');
	}

	public function index($meta_link=NULL)	
	{
		if(is_null($meta_link)){
			redirect('/','refresh');
		}
		$data['dados'] = $this->config_model->getConfig();
		$data['categorias'] = $this->loja_model->getCategorias();
		$data['subcat'] = $this->loja_model->getSubCategoria();

		$id_categoria = $this->categoria_model->getCategoriaId($meta_link);
		$data['produtos'] = $this->categoria_model->getProdutosCategorias($id_categoria->id);
		
		$data['header'] = 'loja/template/header2';
		$data['view'] = 'loja/list/categorias';
		
		$this->load->view('loja/template/index', $data);
	}

}
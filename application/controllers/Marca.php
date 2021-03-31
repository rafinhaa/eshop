<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
		$this->load->model('loja/loja_model');
		$this->load->model('loja/marca_model');
	}

	public function index($meta_link=NULL)	
	{
		if(is_null($meta_link)){
			redirect('/','refresh');
		}
		$data['dados'] = $this->config_model->getConfig();
		$data['categorias'] = $this->loja_model->getCategorias();
		$data['subcat'] = $this->loja_model->getSubCategoria();
		$data['marcas'] = $this->loja_model->getMarcas();

		$id_marca = $this->marca_model->getMarcaId($meta_link);
		$data['produtos'] = $this->marca_model->getProdutosMarca($id_marca->id);
		
		$data['breadcrumb'] = array(
			'home' => base_url('/'),
			'marcas' => base_url('/marcas'),
			'this_page' => $id_marca->nome,
		);
		
		$data['header'] = 'loja/template/header2';
		$data['view'] = 'loja/list/marcas';
		
		$this->load->view('loja/template/index', $data);
	}

}
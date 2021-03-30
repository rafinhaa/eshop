<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
		$this->load->model('loja/loja_model');
		$this->load->model('loja/produto_model');
	}

	public function index($meta_link=NULL)	
	{
		if(is_null($meta_link)){
			redirect('/','refresh');
		}
		$data['dados'] = $this->config_model->getConfig();
		$data['categorias'] = $this->loja_model->getCategorias();
		$data['subcat'] = $this->loja_model->getSubCategoria();

		$data['produto'] = $this->produto_model->getProdutoMeta($meta_link);
		$data['fotos'] = $this->produto_model->getFotos($data['produto']->id);
		$data['count_fotos'] = count($data['fotos']);
		$data['marca'] = $this->produto_model->getMarca($data['produto']->id);
		$data['categoria'] = $this->produto_model->getCategoria($data['produto']->id);
		
		$data['header'] = 'loja/template/header2';
		$data['view'] = 'loja/produto';
		
		$this->load->view('loja/template/index', $data);
	}

}

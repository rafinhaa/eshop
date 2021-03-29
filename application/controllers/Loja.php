<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja	extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
		$this->load->model('loja_model');
	}

	public function index()
	{
		$data['dados'] = $this->config_model->getConfig();
		$data['categorias'] = $this->loja_model->getCategorias();
		$data['subcat'] = $this->loja_model->getSubCategoria();		
		$data['destaque'] = $this->loja_model->getProdutoDestaque($data['dados']->p_destaque);
		
		$this->load->view('loja/template/index', $data);
	}

}

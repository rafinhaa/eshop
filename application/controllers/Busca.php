<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busca extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
		$this->load->model('loja/loja_model');
		$this->load->model('loja/busca_model');
		$this->load->library('someclass');
	}

	public function index()	
	{
		if(!$this->input->post()){
			redirect('/','refresh');
		}
		$data['dados'] = $this->config_model->getConfig();
		$data['categorias'] = $this->loja_model->getCategorias();
		$data['subcat'] = $this->loja_model->getSubCategoria();
		$data['marcas'] = $this->loja_model->getMarcas();

		$data['produtos'] = $this->busca_model->getProdutoSearch($this->input->post('search'));
		
		$data['produtos_cart'] = $this->someclass->list();
		$data['total'] = 0;
		//echo '<pre>'; print_r($data['produtos_cart']); die;
		foreach ($data['produtos_cart'] as $p){
			$data['total'] += ($p->valor * $p->quant);
		}

		$data['breadcrumb'] = array(
			'home' => base_url('/'),
			'this_page' => $this->input->post('search'),
		);
		
		$data['header'] = 'loja/template/header2';
		$data['view'] = 'loja/busca';
		
		$this->load->view('loja/template/index', $data);
	}

}
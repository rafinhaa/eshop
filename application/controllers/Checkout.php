<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
		$this->load->model('loja/loja_model');
		$this->load->model('loja/checkout_model');
		$this->load->library('someclass');
	}

	public function index()	
	{		
		$data['dados'] = $this->config_model->getConfig();
		$data['categorias'] = $this->loja_model->getCategorias();
		$data['subcat'] = $this->loja_model->getSubCategoria();
		$data['marcas'] = $this->loja_model->getMarcas();
		
		$data['produtos_cart'] = $this->someclass->list();
		$data['total'] = 0;
		//echo '<pre>'; print_r($data['produtos_cart']); die;
		foreach ($data['produtos_cart'] as $p){
			$data['total'] += ($p->valor * $p->quant);
		}

		$data['breadcrumb'] = array(
			'home' => base_url('/'),
			'this_page' => base_url('/checkout')
		);
		
		$data['header'] = 'loja/template/header2';
		$data['view'] = 'loja/checkout';
		
		$this->load->view('loja/template/index', $data);
	}

	public function login(){
		$data['dados'] = $this->config_model->getConfig();
		$data['categorias'] = $this->loja_model->getCategorias();
		$data['subcat'] = $this->loja_model->getSubCategoria();
		$data['marcas'] = $this->loja_model->getMarcas();
		
		$data['produtos_cart'] = $this->someclass->list();

		$data['breadcrumb'] = array(
			'home' => base_url('/'),
			'this_page' => base_url('/checkout')
		);
		
		$data['header'] = 'loja/template/header2';
		$data['view'] = 'loja/checkout/index';
		
		$this->load->view('loja/template/index', $data);
	}

}
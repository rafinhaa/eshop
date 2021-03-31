<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinho	extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
		$this->load->model('loja/loja_model');
		$this->load->library('someclass');
	}

	public function index()
	{		
		$data['dados'] = $this->config_model->getConfig();
		$data['categorias'] = $this->loja_model->getCategorias();
		$data['subcat'] = $this->loja_model->getSubCategoria();	
		$data['produtos'] = $this->someclass->list();
		$data['total'] = 0;
		$data['peso'] = 0;

		//echo '<pre>'; print_r($data['produtos']); die;

		foreach ($data['produtos'] as $p){
			$data['total'] += ($p->valor * $p->quant);
			$data['peso'] += $p->peso;
		}
		
		$data['breadcrumb'] = array(
			'home' => base_url('/'),
			'this_page' => base_url('/carrinho')
		);

		$data['header'] = 'loja/template/header2';
		$data['view'] = 'loja/carrinho';

		$this->load->view('loja/template/index', $data);
	}
	public function adicionar()
	{		
		$this->someclass->add(1,5);
		$this->someclass->add(2,1);
	}

	public function limparcarrinho()
	{
		$this->someclass->clearCart();
	}
	public function alterar()
	{
		$this->someclass->alterQuant(1,1);
	}
	public function apagar($id)
	{	
		if($id){
			$this->someclass->del($id);
			redirect('carrinho');
		}		
	}

}

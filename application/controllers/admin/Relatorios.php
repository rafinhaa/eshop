<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->model('relatorios_model','reports');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'LojasWEB - Pedidos';
		$data['title_h2'] = 'Pedidos';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/relatorios/relatorios';

		$this->load->view('admin/template/index', $data);
	}


	public function diario(){
			
		$data['title'] = 'LojasWEB - Relatório ' . formataDataDiaDb(dataDiaDb(1));
		$data['title_h2'] = 'Relatório ' . formataDataDiaDb(dataDiaDb(1));
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/relatorios/imprimir';
		$data['report'] = $this->reports->getDiario();

		if(is_null($data['report']) or isset($data['report'])){
			setMsg('message','Não existe relatório nesse período.','Ops!','info');
			redirect('admin/pedidos', 'refresh');	
		}
		
		$t_frete = 0;
		$t_pedido = 0;
		$t_produto = 0;

		foreach($data['report'] as $r ){
			$t_frete += $r->total_frete;
			$t_pedido += $r->total_pedido;
			$t_produto += $r->total_produto;
		}
		$data['t_frete'] = $t_frete;
		$data['t_pedido'] = $t_pedido;
		$data['t_produto'] = $t_produto;

		$this->load->model('config_model');
		$data['loja'] = $this->config_model->getConfig();

		$this->load->view('admin/template/index', $data);
	}
	public function mais_vendidos(){
			
		$data['title'] = 'LojasWEB - Relatório produtos mais vendidos';
		$data['title_h2'] = 'Relatório peoduto mais vendidos';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		$data['users'] = $this->ion_auth->users()->result();

		$this->load->model('config_model');
		$data['loja'] = $this->config_model->getConfig();

		$data['view'] = 'admin/relatorios/mais_vendidos';
		$data['report'] = $this->reports->getProdutosMaisVendidos();
/*
		if(is_null($data['report']) or isset($data['report'])){
			setMsg('message','Não existe relatório nesse período.','Ops!','info');
			redirect('admin/pedidos', 'refresh');	
		}*/

		$this->load->view('admin/template/index', $data);
	}
}

/* End of file Controllername.php */

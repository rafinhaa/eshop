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

		$data['view'] = 'admin/pedidos/listar';
		$data['pedidos'] = $this->reports->getPedidos() ;

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
		//$data['itens'] = $this->reports->getItens($id_pedido);

		$this->load->model('config_model');
		$data['loja'] = $this->config_model->getConfig();

		$this->load->view('admin/template/index', $data);
	}
}

/* End of file Controllername.php */

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->model('dashboard_model','dashboard');
	}

	public function index()
	{
		$data['title'] = 'LojasWEB - Dashboard';
		$data['title_h2'] = 'Dashboard';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		$data['users'] = $this->ion_auth->users()->result();
		$data['view'] = 'admin/principal/dashboard';
		
		$data['t_pedidos'] = $this->dashboard->getTotal('pedidos') ;
		$data['t_produtos'] = $this->dashboard->getTotal('produtos') ;
		$data['t_clientes'] = $this->dashboard->getTotal('clientes') ;
		$data['t_categorias'] = $this->dashboard->getTotal('categorias');
		$data['pedidos'] = $this->dashboard->getPedidos();
		$data['clientes'] = $this->dashboard->getClientes();

		$this->load->view('admin/template/index', $data);
	}

}

/* End of file Controllername.php */

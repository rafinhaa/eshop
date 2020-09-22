<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->model('clientes_model','clients');
	}

	public function index()
	{
		$data['title'] = 'LojasWEB - Clientes cadastrados';
		$data['title_h2'] = 'Clientes cadastrados';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/clientes/listar';

		$data['clientes'] = $this->clients->getClientes() ;


		$this->load->view('admin/template/index', $data);
	}

}

/* End of file .php */

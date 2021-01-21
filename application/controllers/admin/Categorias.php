<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->model('categorias_model','categories');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'LojasWEB - Categorias cadastradas';
		$data['title_h2'] = 'Categorias cadastradas';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/categorias/listar';

		$data['categorias'] = $this->categories->getCategorias() ;


		$this->load->view('admin/template/index', $data);
	}

}

/* End of file Controllername.php */

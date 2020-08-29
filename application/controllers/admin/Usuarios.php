<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'LojasWEB - Usuários cadastrados';
		$data['title_h2'] = 'Usuários cadastrados';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'this_page' => $data['title_h2'],
		);
		$data['user'] = $this->ion_auth->user()->row();
		$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/usuarios/listar';
		$this->load->view('admin/template/index', $data);
	}

	public function modulo($id=NULL)
	{
		$dados = NULL;
		if ($id){
			$data['title'] = 'LojasWEB - Atualizar cadastro';
		}else{
			$data['title'] = 'LojasWEB - Novo cadastro';
		}
		$data['dados'] = $dados;
		$data['title_h2'] = 'Cadastrar Usuários';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'previous_page' => base_url('admin/usuarios'),
			'this_page' => $data['title_h2'],
		);
		$data['user'] = $this->ion_auth->user()->row();
		$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/usuarios/modulo';
		$this->load->view('admin/template/index', $data);

	}
	public function core()
	{
		$this->form_validation->set_rules('username', 'Usuário', 'required|min_length[5]');
		$this->form_validation->set_rules('first_name', 'Nome', 'required|min_length[2]');
		$this->form_validation->set_rules('last_name', 'Sobrenome', 'required|min_length[2]');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Senha', 'trim|required|min_length[8]');

		/*
		echo '<pre>';
		print_r($this->input->post());
		exit;
		*/

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
			);
			$group = array('1'); // Sets user to admin.
			if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){
				$this->session->set_flashdata('message', '
					<div class="alert alert-success alert-dismissible">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                		<h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                		Usuário cadastrado
              		</div>              	
				');
				redirect('admin/usuarios','refresh');
			}
		} else {
			$this->modulo();
		}
	}

}

/* End of file Controllername.php */

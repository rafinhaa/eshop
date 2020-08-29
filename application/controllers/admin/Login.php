<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->ion_auth->logged_in())
		{
			redirect('admin');
		}
		$this->form_validation->set_rules('password', 'Senha', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == TRUE) {
			$identity = $this->input->post('email');
			$password = $this->input->post('password');
			$remember = ($this->input->post('remember') != NULL ? TRUE : FALSE);
			if ($this->ion_auth->login($identity, $password, $remember)){
				$user = $this->ion_auth->user()->row();
				$this->session->set_flashdata('message', '
					<div class="alert alert-success alert-dismissible">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                		<h4><i class="icon fa fa-check"></i> Olá ' . $user->first_name . ' ' . $user->last_name .'!</h4>
                		Seja bem vindo ao sistema.
              		</div>              	
				');
				redirect('/admin','refresh');
			}else{
				$this->session->set_flashdata('message', '<div class="callout callout-danger">Usuário ou senha inválido!</div>');
				redirect('/admin/login','refresh');
			}
		} else {
			$this->load->view('admin/template/login');
		}
	}

	public function logout()
	{
		$this->ion_auth->logout();
		$this->session->set_flashdata('message', '<div class="callout callout-success">Você fez logout do sistema.</div>');
		redirect('/admin','refresh');
	}	
}

/* End of file Controllername.php */

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
		$data['user_admin'] = $this->ion_auth->user()->row();
		$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/usuarios/listar';
		$this->load->view('admin/template/index', $data);
	}

	public function modulo($id=NULL)
	{
		if ($id){
			$data['title'] = 'LojasWEB - Atualizar cadastro';
			$data['it_user'] = $this->ion_auth->user($id)->row();
			if(!$data['it_user']){
				setMsg('message','Usuário não foi encontrado.','Ops! um erro aconteceu.','erro');
				redirect('admin/usuarios','refresh');
			}
		}else{
			$data['title'] = 'LojasWEB - Novo cadastro';
			$data['it_user'] = NULL;
		}
		$data['title_h2'] = 'Cadastrar Usuários';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'previous_page' => base_url('admin/usuarios'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
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
		if($this->input->post('id')){
			$id = $this->input->post('id');
			$data = array(
				'username' => $this->input->post('username'),
				'first_name' => $this->input->post('first_name'),
				'last_name' =>  $this->input->post('last_name'),
				'email' =>  $this->input->post('email'),
				'active' =>  $this->input->post('active'),
			);
			if($this->input->post('password')){
				$data['password'] = $this->input->post('password');
			}
			if ($this->ion_auth->update($id, $data)){
				setMsg('message','O usuário foi atualizado.','Sucesso!','sucesso');
				redirect('admin/usuarios','refresh');
			}else {
				setMsg('message','Não foi possível atualizar o usuário.','Ops! ocorreu um erro!','erro');
				redirect('admin/usuarios/modulo','refresh');
			}
		}	elseif ( $this->form_validation->run() == TRUE)
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'active' => $this->input->post('active'),
			);

			$group = array('1'); // Sets user to admin.
			if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){
				setMsg('message','O novo usuário foi cadastrado.','Sucesso!','sucesso');
				redirect('admin/usuarios','refresh');
			}else {
				setMsg('message','Não foi possível cadastrar o usuário.','Ops! ocorreu um erro!','erro');
				redirect('admin/usuarios/modulo','refresh');
			}
		} else {
			$this->modulo();
		}
	}
	public function delete($id=NULL){
		if($id){
			if ( $id == 1){
				setMsg('message','Não é possível deletar o administrador.','Ops! ocorreu um erro.','erro');
				redirect('admin/usuarios','refresh');
			}
			if ( $this->session->userdata('user_id') == $id){
				setMsg('message','Você não pode se deletar.','Ops! ocorreu um erro.','erro');
				redirect('admin/usuarios','refresh');
			}
			$this->ion_auth->delete_user($id);
			setMsg('message','Usuario deletado.','Sucesso!','sucesso');
			redirect('admin/usuarios','refresh');
		} else {
			setMsg('message','Você precisa selecionar um usuário.','Ops! ocorreu um erro!','erro');
			redirect('admin/usuarios/modulo','refresh');
		}
	}

}

/* End of file Controllername.php */

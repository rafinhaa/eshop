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
		$this->load->library('form_validation');
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

	public function modulo($id=NULL)
	{
		if($id){
			$data['title']='Atualizar cadastro';
			$data['it_client'] = $this->clients->getCliente($id)->row();
			if(!$data['it_client']){
				setMsg('message','Cliente não foi encontrado.','Ops! um erro aconteceu.','erro');
				redirect('admin/clientes','refresh');
			}
		}else{
			$data['title']='Novo cadastro';
			$data['it_client'] = NULL;
		}
		$data['title_h2'] = 'Cadastrar Clientes';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'previous_page' => base_url('admin/clientes'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		//$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/clientes/modulo';
		$this->load->view('admin/template/index', $data);
	}

	public function core()
	{
		$this->form_validation->set_rules('name', 'Nome', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('cpf', 'CPF', 'trim|required|min_length[14]|max_length[14]');
		$this->form_validation->set_rules('dt_nascimento', 'Data de nascimento', 'trim|required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');


		if ($this->form_validation->run() == TRUE) {
			$dadosClientes['nome'] = $this->input->post('name');
			$dadosClientes['cpf'] = $this->input->post('cpf');
			$dadosClientes['data_nascimento'] = $this->input->post('dt_nascimento');
			$dadosClientes['CEP'] = $this->input->post('CEP');
			$dadosClientes['endereco'] = $this->input->post('endereco');
			$dadosClientes['numero'] = $this->input->post('numero');
			$dadosClientes['bairro'] = $this->input->post('bairro');
			$dadosClientes['complemento'] = $this->input->post('complemento');
			$dadosClientes['cidade'] = $this->input->post('cidade');
			$dadosClientes['estado'] = $this->input->post('estado');
			$dadosClientes['email'] = $this->input->post('email');
			$dadosClientes['senha'] = $this->input->post('password');
			$dadosClientes['ativo'] = $this->input->post('active');

			if($this->input->post('id')){
				$dadosClientes['ultima_atualizacao'] = dataDiaDb();
				$this->clients->doUpdate($dadosClientes,$this->input->post('id'));
				redirect('admin/clientes', 'refresh');
			}else{
				$dadosClientes['data_cadastro'] = dataDiaDb();
				$this->clients->doInsert($dadosClientes);
				redirect('admin/clientes/modulo', 'refresh');
			}
		} else {
			$this->modulo();
		}

	}
	public function delete($id=NULL){
		if($id){
			if($this->clients->doDelete($id)){
				setMsg('message','Cliente foi deletado.','Sucesso!','sucesso');
				redirect('admin/clientes', 'refresh');
			}else{
				setMsg('message','Cliente não foi deletado.','Ops! um erro aconteceu.','erro');
				redirect('admin/clientes', 'refresh');
			}
		}else{
			setMsg('message','Cliente não foi deletado.','Ops! um erro aconteceu.','erro');
			redirect('admin/clientes', 'refresh');
		}
	}

}

/* End of file .php */

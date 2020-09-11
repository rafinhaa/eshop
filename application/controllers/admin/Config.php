<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->library('form_validation');
		$this->load->model('config_model');
	}

	public function index()
	{
		$this->form_validation->set_rules('titulo', 'Título', 'trim|required|min_length[5]|max_length[12]');
		if ($this->form_validation->run() == TRUE or FALSE) {
			/*echo '<pre>';
			print_r($this->input->post());*/
			$dados['titulo'] = $this->input->post('titulo');
			$dados['empresa'] = $this->input->post('empresa');
			$dados['cep'] = $this->input->post('cep');
    		$dados['bairro'] = $this->input->post('bairro');
			$dados['complemento'] = $this->input->post('complemento');
			$dados['cidade'] = $this->input->post('cidade');
			$dados['estado'] = $this->input->post('estado');
			$dados['email'] = $this->input->post('email');
			$dados['telefone'] = $this->input->post('telefone');
    		$dados['p_destaque'] = $this->input->post('p_destaque');
    		$dados['data_atualizacao'] = dataDiaDb();

			if($this->config_model->doUpdate($dados)){
				setMsg('message','Todas as configurações foram salvas.','Sucesso!','sucesso');
				redirect('admin/config','refresh');
			}else{
				setMsg('message','Não foi possível salvar as configurações.','Ops! um erro aconteceu.','erro');
				redirect('admin/config','refresh');
			}


		} else {
			$data['title'] = 'LojaWEB - Configuração';
			$data['title_h2'] = 'Configuração';
			$data['user_admin'] = $this->ion_auth->user()->row();
			$data['breadcrumb'] = array(
				'home' => base_url('admin'),
				'this_page' => $data['title_h2'],
			);
			$data['view'] = 'admin/config/config';
			$data['query'] = $this->config_model->getConfig();




			$this->load->view('admin/template/index', $data);
		}
	}

}

/* End of file Controllername.php */

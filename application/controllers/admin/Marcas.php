<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->model('marcas_model','brands');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'LojasWEB - Marcas cadastradas';
		$data['title_h2'] = 'Marcas cadastradas';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/marcas/listar';

		$data['marcas'] = $this->brands->getMarcas() ;


		$this->load->view('admin/template/index', $data);
	}
	public function modulo($id=NULL)
	{
		if($id){
			$data['title']='Atualizar marca';
			$data['it_brand'] = $this->brands->getMarca($id);
			if(!$data['it_brand']){
				setMsg('message','Marca não foi encontrada.','Ops! um erro aconteceu.','erro');
				redirect('admin/marcas','refresh');
			}
		}else{
			$data['title']='Novo cadastro';
			$data['it_brand'] = NULL;
		}
		$data['title_h2'] = 'Cadastrar Marca';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'previous_page' => base_url('admin/marcas'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		$data['view'] = 'admin/marcas/modulo';
		$this->load->view('admin/template/index', $data);
	}
	public function core()
	{
		$this->form_validation->set_rules('name', 'Nome', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == TRUE) {
			$dadosMarca['nome'] = $this->input->post('name');
			$dadosMarca['ativo'] = $this->input->post('active');
			if($this->input->post('id')){
				$dadosMarca['ultima_atualizacao'] = dataDiaDb();
				if($this->brands->doUpdate($dadosMarca,$this->input->post('id'))){
					setMsg('message','Marca alterada.','Sucesso!','sucesso');
				}else{
					setMsg('message','Marca não foi alterada.','Ops! um erro aconteceu.','erro');
				}
				redirect('admin/marcas', 'refresh');
			}else{
				if($this->brands->doInsert($dadosMarca)){
					setMsg('message','Marca cadastrada.','Sucesso!','sucesso');
				}else{
					setMsg('message','Marca não foi cadastada.','Ops! um erro aconteceu.','erro');
				}
				redirect('admin/marcas/modulo', 'refresh');
			}
		} else {
			$this->modulo();
		}

	}
	public function delete($id=NULL){
		if($id){
			if($this->brands->doDelete($id)){
				setMsg('message','Marca deletada.','Sucesso!','sucesso');
				redirect('admin/marcas', 'refresh');
			}else{
				setMsg('message','Marca não foi deletada.','Ops! um erro aconteceu.','erro');
				redirect('admin/marcas', 'refresh');
			}
		}else{
			setMsg('message','Marca não foi deletado.','Ops! um erro aconteceu.','erro');
			redirect('admin/marcas', 'refresh');
		}
	}

}

/* End of file Marcas.php */

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->model('pedidos_model','orders');
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
		$data['pedidos'] = $this->orders->getPedidos() ;

		$this->load->view('admin/template/index', $data);
	}

	public function modulo($id=NULL)
	{
	
	}
	public function core()
	{
	

	}
	public function delete($id=NULL){
		if($id){
			if($this->orders->doDelete($id)){
				setMsg('message','Pedido deletado.','Sucesso!','sucesso');
				redirect('admin/pedidos', 'refresh');
			}else{
				setMsg('message','Pedido não foi deletado.','Ops! um erro aconteceu.','erro');
				redirect('admin/pedidos', 'refresh');
			}
		}else{
			setMsg('message','Pedido não foi deletado.','Ops! um erro aconteceu.','erro');
			redirect('admin/pedidos', 'refresh');
		}
	}

	public function mudar_status($id_pedido,$id_status=NULL){	
		if(!id){
			setMsg('message','Erro ao carregar o pedido.','Ops! um erro aconteceu.','erro');
			redirect('admin/pedidos', 'refresh');	
		}	
		$dadosStatus['status'] = $this->input->post('new-status');
		$dadosStatus['ultima_atualizacao'] = dataDiaDb();
		$this->orders->doUpdate($dadosStatus,$id_pedido);
		redirect('admin/pedidos', 'refresh');
	}

	public function imprimir($id_pedido){
		if(!$id_pedido){
			setMsg('message','Erro ao carregar o pedido.','Ops! um erro aconteceu.','erro');
			redirect('admin/pedidos', 'refresh');	
		}
		$pedido = $this->orders->getPedido($id_pedido);
		if(!$pedido){
			setMsg('message','Perido não existente.','Ops! um erro aconteceu.','erro');
			redirect('admin/pedidos', 'refresh');	
		}	
		$data['title'] = 'LojasWEB - Imprimir Pedido ' . $id_pedido;
		$data['title_h2'] = 'Imprimir Pedido ' . $id_pedido;
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/pedidos/imprimir';
		$data['pedido'] = $pedido;
		$data['itens'] = $this->orders->getItens($id_pedido);

		$this->load->model('config_model');
		$data['loja'] = $this->config_model->getConfig();

		$this->load->view('admin/template/index', $data);
	}
}

/* End of file Controllername.php */

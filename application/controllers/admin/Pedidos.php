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
}

/* End of file Controllername.php */

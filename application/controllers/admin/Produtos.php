<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->model('produtos_model','products');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['title'] = 'LojasWEB - Produtos cadastrados';
		$data['title_h2'] = 'Produtos cadastrados';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();
		$data['users'] = $this->ion_auth->users()->result();

		$data['view'] = 'admin/produtos/listar';

		$data['produtos'] = $this->products->getProdutos() ;


		$this->load->view('admin/template/index', $data);
	}
	public function modulo($id=NULL)
	{
		if($id){
			$data['title']='Atualizar produto';
			$data['it_product'] = $this->products->getProduto($id)->row();
			if(!$data['it_product']){
				setMsg('message','Produto não foi encontrado.','Ops! um erro aconteceu.','erro');
				redirect('admin/produtos','refresh');
			}
		}else{
			$data['title']='Novo cadastro';
			$data['it_product'] = NULL;
		}
		$data['title_h2'] = 'Cadastrar Produtos';
		$data['breadcrumb'] = array(
			'home' => base_url('admin'),
			'previous_page' => base_url('admin/produtos'),
			'this_page' => $data['title_h2'],
		);
		$data['user_admin'] = $this->ion_auth->user()->row();

		$data['marcas'] = $this->products->getMarcas();
		$data['categorias'] = $this->products->getCategorias();

		$data['view'] = 'admin/produtos/modulo';
		$this->load->view('admin/template/index', $data);
	}
	public function core()
	{

		$this->form_validation->set_rules('name', 'Nome', 'trim|required|min_length[2]');
/**
		$this->form_validation->set_rules('cpf', 'CPF', 'trim|required|min_length[14]|max_length[14]');
		$this->form_validation->set_rules('dt_nascimento', 'Data de nascimento', 'trim|required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
 * echo '<pre>';
print_r($this->input->post());
die;
*/

		if ($this->form_validation->run() == TRUE) {
			$dadosProdutos['nome'] = $this->input->post('name');
			$dadosProdutos['cod_produto'] = $this->input->post('code');
			$dadosProdutos['valor'] = formataDecinal($this->input->post('value'));
			$dadosProdutos['peso'] = $this->input->post('size');
			$dadosProdutos['altura'] = $this->input->post('height');
			$dadosProdutos['largura'] = $this->input->post('width');
			$dadosProdutos['comprimento'] = $this->input->post('length');
			$dadosProdutos['info'] = $this->input->post('information');
			$dadosProdutos['controlar_estoque'] = $this->input->post('control_stok');
			$dadosProdutos['estoque'] = $this->input->post('stock');
			$dadosProdutos['id_marca'] = $this->input->post('brandy');
			$dadosProdutos['id_categoria'] = $this->input->post('category');
			$dadosProdutos['destaque'] = $this->input->post('featured');
			$dadosProdutos['ativo'] = $this->input->post('active');

			if($this->input->post('id')){
				$dadosProdutos['ultima_atualizacao'] = dataDiaDb();
				$this->products->doUpdate($dadosProdutos,$this->input->post('id'));
				redirect('admin/produtos', 'refresh');
			}else{
				$dadosProdutos['data_cadastro'] = dataDiaDb();
				$this->products->doInsert($dadosProdutos);
				redirect('admin/Produtos/modulo', 'refresh');
			}
		} else {
			$this->modulo();
		}

	}
	public function delete($id=NULL){
		if($id){
			if($this->products->doDelete($id)){
				setMsg('message','Produto foi deletado.','Sucesso!','sucesso');
				redirect('admin/produtos', 'refresh');
			}else{
				setMsg('message','Produto não foi deletado.','Ops! um erro aconteceu.','erro');
				redirect('admin/produtos', 'refresh');
			}
		}else{
			setMsg('message','Produto não foi deletado.','Ops! um erro aconteceu.','erro');
			redirect('admin/produtos', 'refresh');
		}
	}
}

/* End of file .php */

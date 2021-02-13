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
		$fotos = NULL;
		if($id){
			$data['title']='Atualizar produto';
			$data['it_product'] = $this->products->getProduto($id)->row();
			if(!$data['it_product']){
				setMsg('message','Produto não foi encontrado.','Ops! um erro aconteceu.','erro');
				redirect('admin/produtos','refresh');
			}
			$fotos = $this->products->getFotosProdutos($id);
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
		$data['fotos'] = $fotos;

		$data['view'] = 'admin/produtos/modulo';
		$this->load->view('admin/template/index', $data);
	}
	public function core()
	{
		$this->form_validation->set_rules('name', 'Nome', 'trim|required|min_length[2]');

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

				$id_produto = $this->session->userdata('last_id');
				$foto_produto = $this->input->post('foto_produto');
				$t_produto = count($foto_produto);

				for ($i=0; $i < $t_produto; $i++){
					$fotos['id_produto'] = $id_produto;
					$fotos['foto'] = $foto_produto[$i];
					$this->products->doInsertFotos($fotos);
				}

				redirect('admin/produtos', 'refresh');
			}else{
				$dadosProdutos['data_cadastro'] = dataDiaDb();

				$this->products->doInsert($dadosProdutos);
				$id_produto = $this->session->userdata('last_id');
				$foto_produto = $this->input->post('foto_produto');
				$t_produto = count($foto_produto);
				for ($i=0; $i < $t_produto; $i++){
					$fotos['id_produto'] = $id_produto;
					$fotos['foto'] = $foto_produto[$i];
					$this->products->doInsertFotos($fotos);
				}

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
	public function upload()
	{
		/*
		echo '<pre>';
		print_r($_FILES);		
		$array = 
		[	
				"foto_produto" => array(
					"name" =>	  $_FILES['aksfileupload']['name'][0],
					"type" => 	  $_FILES['aksfileupload']['type'][0],
					"tmp_name" => $_FILES['aksfileupload']['tmp_name'][0],
					"error" =>	  $_FILES['aksfileupload']['error'][0],
					"size" =>     $_FILES['aksfileupload']['size'][0]	
				)
				
			
		];
		$_FILES = $array;
		print_r($_FILES);
		*/
		$folder = './upload/produtos';
		$config['upload_path'] = $folder;
		$config['allowed_types'] = 'jpg|png|gif|jpeg';
		$config['max_size'] = 2048;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);

		if($this->upload->do_upload('foto_produto')){
			$retorno['file_name'] = $this->upload->data('file_name');
			$retorno['msg'] = 'Foto Enviada com Sucesso!';
			$retorno['erro'] = 0;
		}else{
			$retorno['msg'] = $this->upload->display_errors();
			$retorno['erro'] = 25;

		}
		echo json_encode($retorno);
	}
}

/* End of file .php */

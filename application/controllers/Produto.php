<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
		$this->load->model('loja/loja_model');
		$this->load->model('loja/produto_model');
		$this->load->library('someclass');
	}

	public function index($meta_link=NULL)	
	{
		if(is_null($meta_link)){
			redirect('/','refresh');
		}
		$data['dados'] = $this->config_model->getConfig();
		$data['categorias'] = $this->loja_model->getCategorias();
		$data['subcat'] = $this->loja_model->getSubCategoria();

		$data['produto'] = $this->produto_model->getProdutoMeta($meta_link);
		$data['fotos'] = $this->produto_model->getFotos($data['produto']->id);
		$data['count_fotos'] = count($data['fotos']);
		$data['marca'] = $this->produto_model->getMarca($data['produto']->id);
		$data['categoria'] = $this->produto_model->getCategoria($data['produto']->id);

		$data['produtos_cart'] = $this->someclass->list();
		$data['total'] = 0;
		//echo '<pre>'; print_r($data['produtos_cart']); die;
		foreach ($data['produtos_cart'] as $p){
			$data['total'] += ($p->valor * $p->quant);
		}

		$data['breadcrumb'] = array(
			'home' => base_url('/'),
			'categoria' => base_url('/categoria'),
			'this_page' => $data['produto']->nome,
		);

		$data['header'] = 'loja/template/header2';
		$data['view'] = 'loja/produto';
		
		$this->load->view('loja/template/index', $data);
	}

	public function calcularFrete(){
		$url  = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?';
		$url .= 'nCdEmpresa=';
		$url .= '&sDsSenha+=';
		$url .= '&nCdServico=';
		$url .= '&sCepOrigem=';
		$url .= '&sCepDestino=';
		$url .= '&nVlPeso=';
		$url .= '&=nCdFormato';
		$url .= '&=nVlComprimento';
		$url .= '&=nVlAltura';
		$url .= '&=nVlLargura';
		$url .= '&=nVlDiametro';
		$url .= '&=sCdMaoPropria';
		$url .= '&=nVlValorDeclarado';
		$url .= '&=sCdAvisoRecebimento';

		echo $url;

	}
	
}

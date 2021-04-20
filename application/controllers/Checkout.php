<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
		$this->load->model('loja/loja_model');
		$this->load->model('loja/checkout_model');
		$this->load->library('someclass');
	}

	public function index()	
	{		
		$data['dados'] = $this->config_model->getConfig();
		$data['categorias'] = $this->loja_model->getCategorias();
		$data['subcat'] = $this->loja_model->getSubCategoria();	
		$data['produtos'] = $this->someclass->list();
		$data['produtos_cart'] = $data['produtos'];
		$data['total'] = 0;
		$data['peso'] = 0;

		//echo '<pre>'; print_r($data['produtos']); die;

		foreach ($data['produtos'] as $p){
			$data['total'] += ($p->valor * $p->quant);
			$data['peso'] += ($p->peso * $p->quant);
		}

		$data['breadcrumb'] = array(
			'home' => base_url('/'),
			'this_page' => base_url('/checkout')
		);
		
		$data['header'] = 'loja/template/header2';
		$data['view'] = 'loja/checkout';
		
		$this->load->view('loja/template/index', $data);
	}

	public function login(){
		$data['dados'] = $this->config_model->getConfig();
		$data['categorias'] = $this->loja_model->getCategorias();
		$data['subcat'] = $this->loja_model->getSubCategoria();	
		$data['produtos'] = $this->someclass->list();
		$data['produtos_cart'] = $data['produtos'];
		$data['total'] = 0;
		$data['peso'] = 0;

		//echo '<pre>'; print_r($data['produtos']); die;

		foreach ($data['produtos'] as $p){
			$data['total'] += ($p->valor * $p->quant);
			$data['peso'] += ($p->peso * $p->quant);
		}

		$data['breadcrumb'] = array(
			'home' => base_url('/'),
			'this_page' => base_url('/checkout')
		);
		
		$data['header'] = 'loja/template/header2';
		$data['view'] = 'loja/checkout/index';
		
		$this->load->view('loja/template/index', $data);
	}
	public function calculaFreteCheckout(){
		$this->load->model('loja/ajax_model');

		if($this->input->post('cep')){
			$cep = $this->input->post('cep');
			$id  = $this->input->post('id');
			if(!preg_match('/[0-9]{5}-[0-9]{3}/',$cep)){
				$return['erro'] = 15;
				$return['msg'] = 'Formato do CEP está inválido!';
				echo json_encode($return);
				die;
			}
		}		
		$config = $this->ajax_model->getParamEnvio();
		$maiorProduto = $this->someclass->getMaiorProduto();
		$pesoTotal = $this->someclass->getTotalPeso();

		$url  = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?';
		$url .= 'nCdServico=04014';
		$url .= '&nCdEmpresa=';
		$url .= '&sDsSenha=';
		$url .= '&sCepDestino=' .$cep;
		$url .= '&sCepOrigem=' .$config->cep_origem;
		$url .= '&nVlAltura=' .$maiorProduto['altura'];
		$url .= '&nVlLargura=' .$maiorProduto['largura'];
		$url .= '&nVlDiametro=0';
		$url .= '&nVlComprimento=' .$maiorProduto['comprimento'];
		$url .= '&nVlPeso=' .$pesoTotal;
		$url .= '&nCdFormato=1';
		$url .= '&sCdMaoPropria=N';
		$url .= '&nVlValorDeclarado=0';
		$url .= '&sCdAvisoRecebimento=N';
		$url .= '&StrRetorno=xml';

		//echo $url; die;

		$xml = simplexml_load_file($url);
		$xml = json_encode($xml);
		

		$result = json_decode($xml);
		$new_value = number_format(formataDecimal($result->cServico->Valor)) + number_format($config->somar_frete);
		$result->cServico->Valor = formataMoedaReal($new_value);
		$result->cServico->erro = 0;
		echo json_encode($result);
	}
}
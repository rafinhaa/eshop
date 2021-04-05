<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('loja/produto_model');
		$this->load->model('loja/ajax_model');
	}

	public function calcularFrete(){

		if($this->input->post('cep') && $this->input->post('id')){
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

		$url  = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?';
		$url .= 'nCdServico=04014';
		$url .= '&nCdEmpresa=';
		$url .= '&sDsSenha=';
		$url .= '&sCepDestino=' .$config->cep_origem;
		$url .= '&sCepOrigem=88820000';
		$url .= '&nVlAltura=10';
		$url .= '&nVlLargura=11';
		$url .= '&nVlDiametro=0';
		$url .= '&nVlComprimento=20';
		$url .= '&nVlPeso=0,0004';
		$url .= '&nCdFormato=1';
		$url .= '&sCdMaoPropria=N';
		$url .= '&nVlValorDeclarado=0';
		$url .= '&sCdAvisoRecebimento=N';
		$url .= '&StrRetorno=xml';

		//echo $url; die;

		$xml = simplexml_load_file($url);
		$xml = json_encode($xml);

		$result = json_decode($xml);
		$result->cServico->Valor = 'R$ ' . $result->cServico->Valor;
		$result->cServico->erro = 0;
		echo json_encode($result);
	}
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('loja/produto_model');
	}

	public function calcularFrete(){
		$url  = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?';
		$url .= 'nCdServico=04014';
		$url .= '&nCdEmpresa=';
		$url .= '&sDsSenha=';
		$url .= '&sCepDestino=88801000';
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
		echo json_encode($result);
	}
	
}

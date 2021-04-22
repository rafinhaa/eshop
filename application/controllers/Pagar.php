<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagar	extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('loja/pagar_model');
	}

	public function index()
	{		
		redirect('/');
	}

	public function pg_session_id()
	{		
		$query = $this->pagar_model->getConfigPagseguro();
		$param['email'] = $query->email;
		$param['token'] = $query->token;
		$url;
		
		$ch = curl_init();

		if($query->sandbox == 1){
			$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?';
			//curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		}else{
			$url = 'https://ws.pagseguro.uol.com.br/v2/sessions?';
			//curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,true);
		}		

		//curl_setopt($ch,CURL_HTTPHEADER,array('Content-Type: application/x-www-form-urlencoded; charset=ISO-UTF-8'));

		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_POST,2);
		curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($param));
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,30);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36");

		//echo $url . http_build_query($param); die;

		$result = curl_exec($ch);
		curl_close($ch);

		$xml = simplexml_load_file($result);

		echo json_encode($xml);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagar	extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('loja/pagar_model');
		$this->load->library('form_validation');
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
		curl_setopt($ch,CURLOPT_POST,count($param));
		curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($param));
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,30);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36");

		//echo $url . http_build_query($param); die;

		$result = curl_exec($ch);
		curl_close($ch);

		$xml = simplexml_load_file($result);
		$json = json_encode($xml);
		$std = json_decode($json);
		$return;
		if(isset($std->id )){
			$return = [
				'erro'=> 0,
				'msg'=> 'Sucesso!',
				'id_sessao' => $std->id
			];
		}else{
			$return = [
				'erro'=> 5000,
				'msg' => 'Erro ao gerar sessão de pagamento, tente novamente!'
			];
		}

		echo json_encode($return);
	}
	public function pg_boleto()
	{			
		$this->form_validation->set_rules('name','Nome','required');
		$this->form_validation->set_rules('last-name','Sobrenome','required');
		$this->form_validation->set_rules('cpf','CPF é obrigatorio','required|is_unique[clientes.cpf]');
		$this->form_validation->set_rules('number','Número de telefone é obrigatorio','required');
		$this->form_validation->set_rules('email','E-mail é obrigatorio','required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('senha','Senha é obrigatorio','required|min_length[6]');
		$this->form_validation->set_rules('country_name','Pais é obrigatorio','required');
		$this->form_validation->set_rules('cep','CEP é obrigatorio','required');
		$this->form_validation->set_rules('state-province','Estado é obrigatorio','required');
		$this->form_validation->set_rules('address','Estado é obrigatorio','required');
		$this->form_validation->set_rules('number_house','Número da casa é obrigatorio','required');		
		$this->form_validation->set_rules('bairro','Bairro é obrigatorio','required');		

		if($this->form_validation->run()){
			$retorno = [
				'erro' => 0,
				'msg' => 'Enviado com sucesso',
			];

			$cliente = [
				'nome' => $this->input->post('name'),
				'cpf' => $this->input->post('cpf'),
				'cep' => $this->input->post('cep'),
				'endereco' => $this->input->post('address'),
				'numero' => $this->input->post('number_house'),
				'bairro' => $this->input->post('bairro'),
				'cidade' => $this->input->post('country_name'),
				'estado' => $this->input->post('state-province'),
			];

			$this->pagar_model->doInsertCliente($cliente);
			$id_cliente = $this->session->userdata('last_id');

			$username = $this->input->post('email');
			$password = $this->input->post('senha');
			$email = $this->input->post('email');		
			$additional_data = [
				'id_cliente' => $id_cliente,
			];	
			$group = array('2'); // Sets user to admin.
		
			$this->ion_auth->register($username, $password, $email, $additional_data, $group);

		}else{
			$retorno = [
				'erro' => 10,
				'msg' => validation_errors(),
			];
		}
		echo json_encode($retorno);

	}
}

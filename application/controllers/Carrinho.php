<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinho	extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
		$this->load->model('loja/loja_model');
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
			'this_page' => base_url('/carrinho')
		);

		$data['header'] = 'loja/template/header2';
		$data['view'] = 'loja/carrinho';

		$this->load->view('loja/template/index', $data);
	}
	public function adicionar()
	{		
		if($this->input->post('id')){
			$id = $this->input->post('id');
			$this->someclass->add($id,1);

			$produtos = $this->someclass->list();
			$total = 0;	
			$peso = 0;
			//echo '<pre>'; print_r($data['produtos']); die;
	
			foreach ($produtos as $p){
				$total += ($p->valor * $p->quant);
				$peso += $p->peso;
			}
			$json = ['erro' => 0,
					 'msg' => 'Produto adicionado ao carrinho com sucesso!',
					 'total' => formataMoedaReal($total),
					 'count' => count($produtos),
					 'item' => $this->someclass->listOne($id)	
					];
			echo json_encode($json);
			//return json_encode($json);
		}		
	}

	public function limparcarrinho()
	{
		$this->someclass->clearCart();
	}
	public function alterar()
	{
		if($this->input->post('id')){
			$id = $this->input->post('id');			
			$quant = $this->input->post('value');			
			$this->someclass->alterQuant($id,$quant);

			$produtos = $this->someclass->list();
			$totalProduto = 0;	
			$total = 0;	
			$peso = 0;
			//echo '<pre>'; print_r($data['produtos']); die;
	
			foreach ($produtos as $p){
				if($p->id == $id){
					$totalProduto += ($p->valor * $p->quant);					
				}
				$total += ($p->valor * $p->quant);					
				$peso += ($p->peso * $p->quant);	
			}
			$json = ['erro' => 0,
					 'msg' => 'Produto do carrinho alterado com sucesso!',
					 'total' => formataMoedaReal($total),
					 'totalProduto' => formataMoedaReal($totalProduto),
					 'peso' => $peso,
					 'count' => count($produtos)
					];
			echo json_encode($json);
			//return json_encode($json);
		}				
	}
	public function apagar($id=NULL)
	{	
		if($id || $this->input->post('id')){
			if(is_null($id)){
				$id = $this->input->post('id');
			}
			$this->someclass->del($id);

			$produtos = $this->someclass->list();
			$total = 0;	
			//echo '<pre>'; print_r($data['produtos']); die;
	
			foreach ($produtos as $p){
				$total += ($p->valor * $p->quant);
			}
			$json = ['erro' => 0,
					 'msg' => 'Produto removido do carrinho com sucesso!',
					 'total' => formataMoedaReal($total),
					 'count' => count($produtos)
					];
			echo json_encode($json);			
		}		
	}

	public function calculaFreteCarrinho(){
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

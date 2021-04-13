<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Someclass
{
    public function __construct()
	{
        if(!isset($_SESSION['carrinho'])){
            $_SESSION['carrinho'] = [];
        }
	}
    public function add($id,$quant)
	{
        if(isset($_SESSION['carrinho'][$id])){
            $_SESSION['carrinho'][$id] = isset($_SESSION['carrinho'][$id]) + $quant;
        }else{
            $_SESSION['carrinho'][$id] = $quant;
        }
    }
    public function alterQuant($id,$quant)
	{
        if(isset($_SESSION['carrinho'][$id])){
            if($quant > 0){
                $_SESSION['carrinho'][$id] = $quant;
            }else{
                $this->del($id);
            }
        }
    }
    public function del($id)
	{
        unset($_SESSION['carrinho'][$id]);
    }
    public function list()
	{
        $CI =& get_instance();
        $CI->load->model('loja/carrinho_model');
        $indice = 0;
        $return = [];
        $result = [];
        $total = 0;        
        foreach($_SESSION['carrinho'] as $id => $quant){
           $result = $CI->carrinho_model->getProduto($id);
           $return[$indice] = $result;
           $return[$indice]->quant = $quant;
           $return[$indice]->subtotal = number_format($quant * $return[$indice]->valor,2,'.','');
           $indice++;
        }
        return $return;
    }
    public function clearCart()
	{
        unset($_SESSION['carrinho']);
    }
    public function listOne($id)
	{
        $CI =& get_instance();
        $CI->load->model('loja/carrinho_model');
        $indice = 0;
        $return = [];
        $result = [];
        $total = 0;
           $result = $CI->carrinho_model->getProduto($id);
           $result->valor = formataMoedaReal($result->valor);
        return $result;
    }

    public function listDimensao()
	{
        $CI =& get_instance();
        $CI->load->model('loja/carrinho_model');
        $indice = 0;
        $retorno = [];
        $total = 0;        
        foreach($_SESSION['carrinho'] as $id => $quant){
           $query = $CI->carrinho_model->getProduto($id);
           $retorno[$indice]['id'] = $query->id;
           $retorno[$indice]['largura'] = $query->largura;
           $retorno[$indice]['altura'] = $query->altura;
           $retorno[$indice]['comprimento'] = $query->comprimento;
           $retorno[$indice]['dimensao'] = $query->largura + $query->altura + $query->comprimento;           
           $indice++;
        }
        return $retorno;
    }

    public function getMaiorProduto()
	{        
        $produto = $this->listDimensao();
        $maior = NULL;
        $item = [];

        foreach($produto as $indice => $linha){
            if($maior == NULL){
                $maior = $linha['dimensao'];
                $item  = $linha;
            }else{
                if($linha['dimensao'] > $maior){
                    $maior = $linha['dimensao'];
                    $item  = $linha;
                }
            }
        }
        return $item;
    }
    public function getTotalPeso()
	{        
        $produtos = $this->list();
        $pesoTotal = 0;

        foreach($produtos as $indice => $linha){
            $pesoTotal += $linha->peso * $linha->quant;
        }
        return $pesoTotal;
    }
}
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
        echo 'list';
    }
    public function clearCart()
	{
        unset($_SESSION['carrinho']);
    }
}
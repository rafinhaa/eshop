<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinho
{

    public function __construct()
	{
        if(!isset($_SESSION['carrinho'])){
            $_SESSION['carrinho'] = [];
        }
	}
    public function add($id,$quant)
	{

    }
    public function alteraQuant($id,$quant)
	{

    }
    public function del($id,$quant)
	{

    }
    public function list()
	{

    }
    public function total()
	{

    }
    public function totalPeso()
	{

    }
    public function totalItem()
	{

    }
}
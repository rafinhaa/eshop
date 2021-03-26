<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja	extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
		$this->load->model('loja_model');
	}

	public function index()
	{
		$data['dados']= $this->config_model->getConfig();
		$data['categorias']= $this->loja_model->getCategorias();

		//$sub_cat = $this->loja_model->getSubCategoria(29);
		//echo '<pre>';
		foreach ($data['categorias'] as $c){
			$sub_cat = $this->loja_model->getSubCategoria($c->id);
			if ( $sub_cat ) {
				foreach ($sub_cat as $sub) {
					//echo $sub->nome;
				}
			}
		}

		//print_r($sub_cat);
		$this->load->view('loja/template/index', $data);
	}

}

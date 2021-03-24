<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja	extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
	}

	public function index()
	{
		$data['dados']= $this->config_model->getConfig();
		$this->load->view('loja/template/index', $data);
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagar_model	extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('loja/pagar_model');
	}

	public function index()
	{		
		redirect('/');
	}
}

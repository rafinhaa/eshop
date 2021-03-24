<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja	extends CI_Controller {

	public function index()
	{
		$data=null;
		$this->load->view('loja/template/index', $data);
	}

}

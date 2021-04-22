<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagar_model extends CI_Model
{
	public function getConfigPagseguro(){
		return $this->db->get('config_pagseguro')->row();
	}
}

/* End of file .php */

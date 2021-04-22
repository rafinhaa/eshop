<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagar_model extends CI_Model
{
	public function getConfigPagseguro(){
		$this->db->get('config_pagseguro')->row();
		return $this->db->limit(1);
	}
}

/* End of file .php */

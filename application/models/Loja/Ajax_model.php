<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends CI_Model
{
	public function getParamEnvio(){
		$this->db->where(['id' => 1]);
		$this->db->limit(1);
		return $this->db->get('config_correios')->row();
	}
}

/* End of file .php */

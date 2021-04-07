<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends CI_Model
{
	public function getParamEnvio(){
		$this->db->where(['id' => 1]);
		$this->db->limit(1);
		return $this->db->get('config_correios')->row();
	}
	public function getProduto($id){
		$this->db->where(['id' => $id, 'ativo' => 1]);
		$this->db->limit(1);
		return $this->db->get('produtos')->row();
	}
}

/* End of file .php */

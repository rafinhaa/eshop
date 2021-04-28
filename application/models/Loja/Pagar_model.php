<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagar_model extends CI_Model
{
	public function getConfigPagseguro(){
		return $this->db->get('config_pagseguro')->row();
	}

	public function doInsertCliente($dados=NULL){
		if(is_array($dados)){
			$this->db->insert('clientes',$dados);
			$last_id = $this->db->insert_id();
			$this->session->set_userdata('last_id',$last_id);
		}
	}
}

/* End of file .php */

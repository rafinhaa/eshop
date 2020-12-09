<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model
{
	public function getClientes()
	{
		return $this->db->get('clientes')->result();
 	}
	public function getCliente($id)
	{
		//return $this->db->get('clientes')->where($id + '= id')->result();
		return  $this->db->get_where('clientes', array('id' => $id));
	}
}

/* End of file .php */

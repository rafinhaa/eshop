<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model
{
	public function getClientes()
	{
		return $this->db->get('clientes')->result();
 	}

}

/* End of file .php */

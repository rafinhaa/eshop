<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model
{
	public function getCategorias()
	{
		return $this->db->get('categorias')->result();
	}

}

/* End of file .php */

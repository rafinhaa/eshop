<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja_model extends CI_Model
{
	public function getCategorias(){
		$this->db->where('ativo',1);
		return $this->db->get('categorias')->result();
	}	
	public function getSubCategoria($id_categoriapai=NULL){
		$this->db->where(['ativo' => 1, 'id_categoriapai' => $id_categoriapai]);
		return $this->db->get('categorias')->result();
	}
}

/* End of file .php */

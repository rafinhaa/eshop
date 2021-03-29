<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja_model extends CI_Model
{
	public function getCategorias(){
		$this->db->where(['ativo' => 1, 'id_categoriapai' => NULL]);
		return $this->db->get('categorias')->result();
	}	
	public function getSubCategoria(){
		$this->db->where(['ativo' => 1, 'id_categoriapai !=' => NULL]);
		return $this->db->get('categorias')->result();
	}
	public function getProdutoDestaque($quantidade=NULL){
		if($quantidade){
			$this->db->where(['ativo' => 1, 'destaque' => 1]);
			$this->db->limit($quantidade);
			$this->db->order_by('id','RANDOM');
			return $this->db->get('produtos')->result();
		}
	}
}

/* End of file .php */

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
			$this->db->select('p.*, f.foto');
			$this->db->from('produtos as p');
			$this->db->join('produtos_fotos as f','f.id_produto = p.id');
			$this->db->where(['p.ativo' => 1, 'p.destaque' => 1]);
			$this->db->limit($quantidade);
			$this->db->order_by('id','RANDOM');
			$this->db->distinct();
			return $this->db->get('produtos')->result();
		}
	}
}

/* End of file .php */

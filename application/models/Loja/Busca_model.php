<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busca_model extends CI_Model
{
	public function getProdutoSearch($query=NULL){
		if($query){
			$this->db->select('p.*, f.foto');
			$this->db->from('produtos as p');
			$this->db->join('produtos_fotos as f','f.id_produto = p.id');
			$this->db->where(['p.ativo' => 1, 'p.destaque' => 1]);
			$this->db->like('p.nome',$query,'both');
			return $this->db->get()->result();
		}
	}
}
/* End of file .php */
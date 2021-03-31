<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinho_model extends CI_Model
{
	public function getProduto($id=NULL){
		if($id){
			$this->db->select('p.*, f.foto');
			$this->db->from('produtos as p');
			$this->db->join('produtos_fotos as f','f.id_produto = p.id');
			$this->db->where(['p.ativo' => 1, 'p.destaque' => 1, 'p.id' => $id]);
			$this->db->like('1');
			return $this->db->get()->row();
		}
	}
}
/* End of file .php */
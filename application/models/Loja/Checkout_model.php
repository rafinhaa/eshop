<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends CI_Model
{

	public function getCategoriaId($categoria=NULL){
		if($categoria){
			$this->db->select('id,nome');
			return  $this->db->get_where('categorias', array('meta_link' => $categoria))->row();
		}
	}
	public function getProdutosCategorias($id_categoria=NULL){
		if($id_categoria){
			$this->db->select('
				p.nome,
				p.valor,
				p.meta_link,
				f.foto
			');
			$this->db->from('produtos as p');
			$this->db->join('produtos_fotos as f','f.id_produto = p.id');
			$this->db->where(['p.ativo' => 1, 'p.id_categoria' => $id_categoria]);
			$this->db->order_by('id','RANDOM');
			$this->db->distinct();
			return $this->db->get('produtos')->result();
		}
	}
}
/* End of file .php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_Model
{

	public function getProdutoMeta($meta=NULL){
		if($meta){			
			$this->db->where(['ativo' => 1, 'meta_link' => $meta]);
			$this->db->limit(1);
			return $this->db->get('produtos')->row();
		}
	}

	public function getFotos($id){
		if($id){			
			$this->db->where('id_produto', $id);
			return $this->db->get('produtos_fotos')->result();
		}
	}
	public function getMarca($id){
		if($id){			
			$this->db->select('m.nome');
			$this->db->from('marcas as m');
			$this->db->join('produtos as p','m.id = p.id_marca');
			$this->db->where('p.id', $id);
			return $this->db->get()->row();
		}
	}

	public function getCategoria($id){
		if($id){			
			$this->db->select('c.nome');
			$this->db->from('categorias as c');
			$this->db->join('produtos as p','c.id = p.id_categoria');
			$this->db->where('p.id', $id);
			return $this->db->get()->row();
		}
	}
}

/* End of file .php */

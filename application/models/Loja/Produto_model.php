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
}

/* End of file .php */

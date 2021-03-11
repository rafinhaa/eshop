<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios_model extends CI_Model
{
	public function getDiario(){
		$this->db->where('data_cadastro', dataDiaDb(1));
		return $this->db->get('pedidos')->result();
	}

	public function getItens($id)
	{
		return  $this->db->get_where('pedidos_item', array('id_pedido' => $id))->result();
	}
}

/* End of file .php */

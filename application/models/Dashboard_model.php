<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	public function getTotal($tab=NULL)
	{
		//return $this->db->get($tab)->result();
		return $this->db->get($tab)->num_rows();
 	}
	public function getPedidos(){
		$this->db->select('id, nome, total_pedido, status');
		$this->db->from('pedidos');
		$this->db->order_by('data_cadastro', 'DESC');
		$this->db->limit(10);
		return $this->db->get()->result();
	}
	public function getClientes(){
		$this->db->select('nome, ');
		$this->db->from('clientes');
		$this->db->order_by('data_cadastro', 'DESC');
		$this->db->limit(10);
		return $this->db->get()->result();
	}
}



/* End of file .php */

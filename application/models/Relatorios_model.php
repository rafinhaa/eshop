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

	public function getProdutosMaisVendidos(){
		$this->db->select('produtos.cod_produto, produtos.nome, produtos_mais_vendidos.quant_vendidos');
		$this->db->from('produtos');
		$this->db->join('produtos_mais_vendidos','produtos_mais_vendidos.id_produto = produtos.id');
		$this->db->where('produtos.ativo',1);
		$this->db->order_by('produtos_mais_vendidos.quant_vendidos','desc');
		return $this->db->get()->result();
	}
}

/* End of file .php */

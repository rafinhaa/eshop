<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model
{
	public function getPedidos()
	{
		return $this->db->get('pedidos')->result();
	}
	public function getPedido($id)
	{
		return  $this->db->get_where('pedidos', array('id' => $id))->row();
	}
	public function doInsert($dados=NULL)
	{
		if(is_array($dados)){
			$this->db->insert('pedidos',$dados);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
	}
	public function doUpdate($dados=NULL, $id=NULL)
	{
		if(is_array($dados) && $id){
			$this->db->update('pedidos',$dados,array('id' => $id));
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
	}
	public function doDelete($id=NULL)
	{
		if($id){
			$this->db->delete('pedidos',array('id' => $id));
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
	}
}

/* End of file .php */

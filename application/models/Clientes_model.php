<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model
{
	public function getClientes()
	{
		return $this->db->get('clientes')->result();
 	}
	public function getCliente($id)
	{
		//return $this->db->get('clientes')->where($id + '= id')->result();
		return  $this->db->get_where('clientes', array('id' => $id));
	}
	public function doInsert($dados=NULL)
	{
		if(is_array($dados)){
			$this->db->insert('clientes',$dados);
			if($this->db->affected_rows() > 0){
				setMsg('message','Cliente cadastrado.','Sucesso!','sucesso');
			}else{
				setMsg('message','Cliente não foi cadastado.','Ops! um erro aconteceu.','erro');
			}
		}
	}
	public function doUpdate($dados=NULL, $id=NULL)
	{
		if(is_array($dados) && $id){
			$this->db->update('clientes',$dados,array('id' => $id));
			if($this->db->affected_rows() > 0){
				setMsg('message','Cliente alterada.','Sucesso!','sucesso');
			}else{
				setMsg('message','Cliente não foi alterada.','Ops! um erro aconteceu.','erro');
			}
		}
	}
	public function doDelete($id=NULL)
	{
		if($id){
			$this->db->delete('clientes',array('id' => $id));
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
	}
}



/* End of file .php */

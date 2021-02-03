<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model
{
	public function getProdutos()
	{
		return $this->db->get('produtos')->result();
 	}
	public function getProduto($id)
	{
		return  $this->db->get_where('produtos', array('id' => $id));
	}
	public function doInsert($dados=NULL)
	{
		if(is_array($dados)){
			$this->db->insert('produtos',$dados);
			if($this->db->affected_rows() > 0){
				setMsg('message','Produto cadastrado.','Sucesso!','sucesso');
			}else{
				setMsg('message','Produto não foi cadastado.','Ops! um erro aconteceu.','erro');
			}
		}
	}
	public function doUpdate($dados=NULL, $id=NULL)
	{
		if(is_array($dados) && $id){
			$this->db->update('produtos',$dados,array('id' => $id));
			if($this->db->affected_rows() > 0){
				setMsg('message','Produto alterada.','Sucesso!','sucesso');
			}else{
				setMsg('message','Produto não foi alterada.','Ops! um erro aconteceu.','erro');
			}
		}
	}
	public function doDelete($id=NULL)
	{
		if($id){
			$this->db->delete('produtos',array('id' => $id));
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
	}
}



/* End of file .php */

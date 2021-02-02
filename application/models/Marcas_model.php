<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas_model extends CI_Model
{
	public function getMarcas()
	{
		return $this->db->get('marcas')->result();
	}
	public function getMarca($id)
	{
		return  $this->db->get_where('marcas', array('id' => $id))->row();
	}
	public function doInsert($dados=NULL)
	{
		if(is_array($dados)){
			$this->db->insert('marcas',$dados);
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
			$this->db->update('marcas',$dados,array('id' => $id));
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
			$this->db->delete('marcas',array('id' => $id));
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
	}
}

/* End of file .php */

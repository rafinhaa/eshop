<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model
{
	public function getCategorias()
	{
		return $this->db->get('categorias')->result();
	}
	public function getCategoria($id)
	{
		//return $this->db->get('clientes')->where($id + '= id')->result();
		return  $this->db->get_where('categorias', array('id' => $id));
	}
	public function doInsert($dados=NULL)
	{
		if(is_array($dados)){
			$this->db->insert('categorias',$dados);
			if($this->db->affected_rows() > 0){
				setMsg('message','Categoria cadastrada.','Sucesso!','sucesso');
			}else{
				setMsg('message','Categoria não foi cadastada.','Ops! um erro aconteceu.','erro');
			}
		}
	}
	public function doUpdate($dados=NULL, $id=NULL)
	{
		if(is_array($dados) && $id){
			$this->db->update('categorias',$dados,array('id' => $id));
			if($this->db->affected_rows() > 0){
				setMsg('message','Cliente alterado.','Sucesso!','sucesso');
			}else{
				setMsg('message','Cliente não foi alterado.','Ops! um erro aconteceu.','erro');
			}
		}
	}
	public function doDelete($id=NULL)
	{
		if($id){
			$this->db->delete('categorias',array('id' => $id));
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
	}

	public function getCatPai()
	{
		$this->db->where('id_categoriapai',NULL);
		return $this->db->get('categorias')->result();
	}

	public function getCategoriaPaiNome($id=NULL)
	{
		if($id){
			return  $this->db->get_where('categorias', array('id' => $id))->row('nome');
		}

	}
}

/* End of file .php */

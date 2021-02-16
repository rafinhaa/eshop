<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model
{
	public function getProdutos()
	{
		$this->db->select('p.*');
		$this->db->from('produtos AS p');
		$this->db->join('marcas AS m','m.id = p.id_marca','left');
		$this->db->join('categorias AS c','c.id = p.id_categoria','left');
		$query = $this->db->get();
		return $query->result();
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
				$last_id = $this->db->insert_id();
				$this->session->set_userdata('last_id',$last_id);
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
	public function getMarcas(){
		$this->db->where('ativo',1);
		return $this->db->get('marcas')->result();
	}
	public function getCategorias(){
		$this->db->where('ativo',1);
		return $this->db->get('categorias')->result();
	}
	public function doInsertFotos($dados=NULL)
	{
		if(is_array($dados)){
			$this->db->insert('produtos_fotos',$dados);
		}
	}
	public function getFotosProdutos($id=NULL){
		if($id){
			$this->db->where('id_produto',$id);
			return $this->db->get('produtos_fotos')->result();
		}
	}
	public function doDeleteFotoProduto($id=NULL)
	{
		if($id){
			$this->db->delete('produtos_fotos',['id_produto' => $id]);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
	}
}



/* End of file .php */

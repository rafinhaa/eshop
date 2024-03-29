<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function setMsg($id, $msg, $titulo, $tipo)
{
	$CI =& get_instance();
	switch ($tipo){
		case 'erro':
			$CI->session->set_flashdata($id, '
					<div class="alert alert-error alert-dismissible">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                		<h4><i class="icon fa fa-check"></i>'. $titulo .'</h4>
                		'. $msg .'
              		</div>              	
				');
			break;
		case 'sucesso';
			$CI->session->set_flashdata($id, '
					<div class="alert alert-success alert-dismissible">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                		<h4><i class="icon fa fa-check"></i>'. $titulo .'</h4>
                		'. $msg .'
              		</div>              	
				');
			break;
		case 'info';
			$CI->session->set_flashdata($id, '
					<div class="alert alert-info alert-dismissible">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                		<h4><i class="icon fa fa-check"></i>'. $titulo .'</h4>
                		'. $msg .'
              		</div>              	
				');
			break;
	}
	return FALSE;
}
function getMsg($id)
{
	$CI =& get_instance();
	if($CI->session->flashdata($id)){
		echo $CI->session->flashdata($id);
	}
}
function errosValidacao($id)
{
	if (validation_errors($id)){
		echo validation_errors('<p class="callout callout-danger">','</p>');
	}
}

function dataDiaDb($mode=NULL){
	if(!is_null($mode) && $mode==1){
		date_default_timezone_get('America/Sao_Paulo');	
		$formato = 'DATE_W3C';
		$stringdedata = "d-m-Y";
		$data = time();
		$data = date($stringdedata, $data);
		return $data;
	}else{
		date_default_timezone_get();
		$formato = 'DATE_W3C';
		$time = time();
		return date(DATE_RFC822, $time);
	}
}

function formataDataDiaDb($data=NULL){
	if(!is_null($data) ){
		return str_replace('-','/',$data);
	}
}

function createModelButton($type,$button_name,$data_target){
	switch ($type) {
		case 'modal-info':
			echo anchor('#',$button_name, array('class'=>'btn btn-info','data-toggle'=>'modal','data-target'=>$data_target));
			break;
		case 'modal-danger':
			echo anchor('#',$button_name, array('class'=>'btn btn-danger','data-toggle'=>'modal','data-target'=>$data_target));
			break;
		case 'modal-warning':
			echo anchor('#',$button_name, array('class'=>'btn btn-warning','data-toggle'=>'modal','data-target'=>$data_target));
			break;
		case 'modal-success':
			echo anchor('#',$button_name, array('class'=>'btn btn-success','data-toggle'=>'modal','data-target'=>$data_target));
			break;
	}
}
function createModalMessage($type,$data_target,$modal_title,$modal_body,$link,$button_name=NULL){
	
	echo '
		<div class="modal '.$type.' fade" id="'.$data_target.'">
			  <div class="modal-dialog">
				<div class="modal-content">
				<form action="'. $link .'" method="POST">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span></button>
						<h4 class="modal-title">'.$modal_title.'</h4>
					</div>
					<div class="modal-body">
						<p>'.$modal_body.'</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Voltar</button>
						<button type="submit" class="btn btn-outline">'. (!is_null($button_name) ? $button_name : 'Sim') .'</button>
					</div>
				 </form>   
				</div>
				<!-- /.modal-content -->
			  </div>
			  <!-- /.modal-dialog -->
			</div>
	';
}

function formataMoedaReal($valor,$real=NULL){
	if($valor){
		return $valor = ($valor == true ? 'R$ ' : '' ) . number_format($valor, 2,',','.');
	}
}

function formataDecimal($valor){
	$v = str_replace('.','',$valor);	
	return str_replace(',','.',$v);
}

function slug($string=NULL){
	$string = remove_acentos($string);
	return url_title($string, '-', TRUE);
}

function remove_acentos($string=NULL){
	$procurar    = array('À','Á','Ã','Â','É','Ê','Í','Ó','Õ','Ô','Ú','Ü','Ç','à','á','ã','â','é','ê','í','ó','õ','ô','ú','ü','ç');
	$substituir  = array('a','a','a','a','e','r','i','o','o','o','u','u','c','a','a','a','a','e','e','i','o','o','o','u','u','c');
	return str_replace($procurar, $substituir, $string);
}
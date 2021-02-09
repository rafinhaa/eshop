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

function dataDiaDb(){
	date_default_timezone_get('America/Sao_paulo');
	$formato = 'DATE_W3C';
	$time = time();
	return date(DATE_RFC822, $time);
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
function createModalMessage($type,$data_target,$modal_title,$modal_body,$link){
	echo '
		<div class="modal '.$type.' fade" id="'.$data_target.'">
			  <div class="modal-dialog">
				<div class="modal-content">
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
					<a href="'.$link.'" type="button" class="btn btn-outline">Sim</a>
				  </div>
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

function formataDecinal($valor){
	return str_replace('.','',$valor).str_replace(',','.',$valor);
}

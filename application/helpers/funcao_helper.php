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

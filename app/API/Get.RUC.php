<?php

	$json = '12343210';

	$arr_ruc = json_decode($json);
	if(json_last_error() !== JSON_ERROR_NONE){
		die('error de json');
	}

	$ruc_doc = val_ruc_doc($arr_ruc) ? $input_json : die('error de ruc');
	settype($num_doc, "int");

	require_once '../models/Class.Negocio.php';
	$cli = new Negocio();

		$res = $cli->get_exist_negocio($ruc_doc);
	
	if ($res) {
		$res_api = false;//error ya existe el negocio
	} else {
		require_once 'Abs.Apis_Query.php';
		$res_api = GET_API::get_RUC_Data($ruc_doc); //devolvemos array
	}

	echo json_encode($res_api);	
?>
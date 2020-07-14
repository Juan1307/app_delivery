<?php

	$json = '["CLI","829281239"]'; //recibimos un array

	$arr_dni = json_decode($json);
	if(json_last_error() !== JSON_ERROR_NONE or count($arr_dni) !== 2){
		die('error de json');
	}

	$opt = ($arr_dni[0] === 'CLI' or $arr_dni[0] === 'NEG') ? $opt : die('error de option');
	$num_doc = val_num_doc($arr_dni[1]) ? $arr_dni[1] : die('error de dni');
	settype($num_doc, "int");	
	
	require_once '../models/Mod.Personas/App.Personas.php';
	$per = new Personas();

		$res = $per->get_exist_persona($num_doc, $opt); //POR VER
	  
	if ($res) {
		$res_api = false;//error ya existe el cliente o negociante
	} else {
		require_once 'Abs.Apis_Query.php';
		$res_api = GET_API::get_DNI_Data($num_doc); //decolvemos el array
	}

	echo json_encode($res_api);	
?>
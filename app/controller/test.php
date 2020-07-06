<?php

$json = '{
	"usuario":{
		"user":"Alvaro_23",
		"pass":"alva1234"
	},
	"persona":{	
		"tipo":"CLIN",
		"num_doc":"12343222",
		"nombres":"Alvarado wjsdkjsadasjdasdjsa ",
		"apellidos":"Casanova asdasdsa Rojas",
		"sexo":true,
		"direccion":"Av Los Nogales-. #423",
		"fecha_nac":"12-02-1998",
		"cel_tel":"897788882"
	},
	"negocio":{
		"imagen":"casita.jpg",
		"ruc":"23123243333",
		"nombre":"El nuevo prron",
		"tipo":"Tienda",
		"horario":"10:pm - 80:am",
		"direccion":"Av Los Nogales #423",
		"descrip":"la mejor tienda del mundo"
	}
}';

require_once '../config/Tools.php';

$arr = get_json($json);

if (isset($arr['error'])) {
	die('json error');
}

$arr = (isset($arr['persona']) and isset($arr['usuario'])) ? $arr : die('error de llave');

$arr_per = $arr['persona'];

	
	if (isset($arr_per['num_doc'])   and isset($arr_per['nombres'])   and 
		isset($arr_per['apellidos']) and isset($arr_per['sexo'])      and 
		isset($arr_per['direccion']) and isset($arr_per['fecha_nac']) and 
		isset($arr_per['cel_tel'])   and ver_persona($arr_per)){

		echo "todo ok";
	}else{
		echo "opps";
	}



/*
foreach ($arr_per as $key => $val) {

	if ($key === 'num_doc' and (!is_numeric($val) or strlen($val) !== 8)) {
		echo "error num_doc  -  $val";
		break;
	}
	if ($key === 'nombres' and !preg_match('/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ\s]+$/', $val) or strlen($val) > 30){
		echo "error en nombres  -  $val";
		break;
	}
	if ($key === 'apellidos' and !preg_match('/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ\s]+$/', $val) or strlen($val) > 50){
		echo "error en apellidos  -  $val";
		break;
	}
	if ($key === 'sexo' and !is_bool($val)){
		echo "error de sexo  -  $val";
		break;
	}
	if ($key === 'direccion' and !preg_match("/^[a-zA-Z0-9-.áÁéÉíÍóÓúÚñÑüÜ#\s]+$/", $val) or strlen($val) > 40){
		echo "error de direccion  -  $val";
		break;
	}
	if ($key === 'fecha_nac' and !(date('d-m-Y', strtotime($val)) == $val)) {
		echo "error de fecha_nac  -  $val";
		break;
	}
	if ($key === 'cel_tel' and (!is_numeric($val) or strlen($val) !== 9)){
		echo "error de celular  -  $val";
		break;
	}
}


/*
		foreach ($arr_per as $key => $value) {
			if ($key === 'num_doc') {
				if (!is_numeric($value) and !strlen($value) === 8) {
					break;
				}
				continue;				
			}elseif($key == ('nombres' or 'apellidos')){

				if (!preg_match('/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ\s]+$/', $value) and strlen($value) <= 30) {
					break;
				}
				continue;
			}elseif($key === 'sexo'){
				if (!is_bool($value)) {
					break;
				}
				continue;
			}elseif($key === 'direccion'){
				if (!preg_match('/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ\s]+$/', $value) and strlen($value) <= 30) {
					break;
				}
				continue;
			}elseif($key === 'fecha_nac'){
				if (!preg_match('/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ\s]+$/', $value) and strlen($value) <= 30) {
					break;
				}
				continue;
			}else{
				if (!is_numeric($value) and !strlen($value) === 8) {
					break;
				}
				continue;
			}


/*$b = VF::verify_usuario($arr['usuario']);

$arr_per = is_array($p) ? $p : die('error');
$arr_usu = is_array($u) ? $u : die('error');

$opt = $arr['persona'][0];

switch ($opt) {
	case 'CLIE':

		$num_doc = val_num_doc($arr['persona'][1]) ? $arr['persona'][1] : die('error de numdoc'); 
		settype($num_doc, "int");

		require_once '../models/Mod.Personas/Class.Cliente.php';

		$cli = new Cliente();

			$res = $cli->get_state_persona($num_doc,'CLIENTE'); //se podria hacer en la api de DNI
		
		if (!$res) {

			$est = $cli->pst_cliente($arr_per,$arr_usu);

			($est) ? header("Location:ruta") : die('error');
		
		}else{
			die('existe - error');
		}

	break;
	
	case 'NEGO':
		$arr_neg = (isset($arr['negocio'])) ? $arr['negocio'] : die('error');

		$arr_cln = VF::verify_negocio($arr_neg); //validamos datos del negocio
		
		$arr_neg = (!isset($arr_cln['error'])) ? $arr_cln : die('error'); 
		
		# code... validamos el negocio
	break;
	
	default:
		die('error option :/');
	break;
}*/

?>	

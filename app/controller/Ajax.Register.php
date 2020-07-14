
<?php
//no validamos tipo ya que lo evalue el swicht

$json = '{
	"usuario":{
		"user":"alva1234_22",
		"pass":"ÚñÑüÜASDasd"
	},
	"persona":{	
		"tipo":"CLIN",
		"num_doc":"12343222",
		"nombres":"Alvarado",
		"apellidos":"Casanova Rojas",
		"sexo":true,
		"direccion":"Av Los Nogales-. #423",
		"fecha_nac":"12-02-1989",
		"cel_tel":"897788882"
	},
	"negocio":{
		"imagen":"casita.jpg",
		"ruc":"23123243333",
		"nombre":"El nuevo prron",
		"tipo":"Tienda",
		"hora-ini":"10:00",
		"hora-fin":"10:00",
		"direccion":"Av Los Nogales #423",
		"descrip":"la mejor tienda del mundo"
	}
}';

require_once '../config/Tools.php';

$arr = get_json($json);
if (isset($arr['error'])) {
	die('json error');
}
$arr = (isset($arr['persona'],$arr['usuario'])) ? $arr : die('error de llave');

	$arr_per = $arr['persona'];
	if (!isset($arr_per['num_doc'],$arr_per['nombres'],$arr_per['apellidos'],
		$arr_per['sexo'],$arr_per['direccion'],$arr_per['fecha_nac'],
		$arr_per['cel_tel']) or !ver_persona($arr_per)){

		die('error de persona');
	}


	$arr_usu = $arr['usuario'];
	if (!isset($arr_usu['user'],$arr_usu['pass']) or !ver_usuario($arr_usu)) {
		
		die('error de usuario');
	}

$opt = $arr_per['tipo'];

switch ($opt) {

	case 'CLI':
		require_once '../models/Mod.Personas/Class.Cliente.php';

		$cli = new Cliente();
		$est = $cli->pst_cliente($arr_per,$arr_usu);

		echo json_encode($est);

	break;
	
	case 'NEG':
	
		$arr_neg = (isset($arr['negocio'])) ? $arr['negocio'] : die('error');
		if (!isset($arr_neg['ruc'],$arr_neg['nombre'],$arr_neg['tipo'],
			$arr_neg['hr_ini'],$arr_neg['hr_fin'],$arr_neg['direccion']) 
			or !ver_negocio($arr_neg)) {

			die('error de negocio');
		}
		
		require_once '../models/Mod.Personas/Class.Negociante.php';

		$neg = new Negociante();
		$est = $neg->pst_negociante($arr_per, $arr_usu, $arr_neg);

		echo json_encode($est);

	break;
	
	default:
		die('error option :/');
	break;
}

?>	

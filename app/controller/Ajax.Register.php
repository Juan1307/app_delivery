
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

		echo "persona valida";	

	}else{

		die('error de persona');
	
	}

	$arr_usu = $arr['usuario'];

	if (isset($arr_usu['user']) and isset($arr_usu['pass'])) {
		
		//and ver_usuario($arr_usu)
		echo "usuario valido";	
	
	} else {

		die('error de usuario');
	
	}

	foreach ($arr_usu as $key => $val) {

		if ($key === 'user' and !preg_match('/^[a-zA-Z0-9-#_áÁéÉíÍóÓúÚñÑüÜ:\s]+$/', $val) or strlen($val) > 20) {
			echo "error de user input";
			break;
		}
		if ($key === 'pass' and !preg_match('/^[a-zA-Z0-9-#_áÁéÉíÍóÓúÚñÑüÜ:\s]+$/', $val) or strlen($val) > 20){
			echo "error de pass input";
			break;
		}
	}

$opt = $arr_per['tipo'];


/*


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

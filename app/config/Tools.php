<?php
	/**
	 * Herramientas y funciones globales
	 */
	function get_json(string $json) : array
	{
		$parse = json_decode($json, true);
		return (json_last_error() !== JSON_ERROR_NONE) ? ['error'=>'Ooops json error'] : $parse;
	}

	function val_num_doc(string $num) : bool
	{
		return (is_numeric($num) and strlen($num) === 8) ? true : false;
	}

	function val_num_ruc(string $ruc) : bool
	{
		return (is_numeric($ruc) and strlen($num) === 10) ? true : false;
	}

	function ver_persona(array $arr_per) : bool
	{
		$est = null;

		foreach ($arr_per as $key => $val) {

			if ($key === 'num_doc' and (!is_numeric($val) or strlen($val) !== 8)) {
				$est = true;				
				break;
			}
			if ($key === 'nombres' and !preg_match('/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ\s]+$/', $val) or strlen($val) > 30){
				$est = true;
				break;
			}
			if ($key === 'apellidos' and !preg_match('/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ\s]+$/', $val) or strlen($val) > 50){
				$est = true;
				break;
			}
			if ($key === 'sexo' and !is_bool($val)){
				$est = true;
				break;
			}
			if ($key === 'direccion' and !preg_match("/^[a-zA-Z0-9-.áÁéÉíÍóÓúÚñÑüÜ#\s]+$/", $val) or strlen($val) > 40){
				$est = true;
				break;
			}
			if ($key === 'fecha_nac' and !(date('d-m-Y', strtotime($val)) == $val)) {
				$est = true;
				break;
			}
			if ($key === 'cel_tel' and (!is_numeric($val) or strlen($val) !== 9)){
				$est = true;
				break;
			}
		}

		return ($est) ? false : true ;
	}

	function ver_usuario(array $arr_usu) : bool
	{
		$est = null;

		foreach ($arr_usu as $key => $val) {

			if ($key === 'user' and !preg_match('/^[a-zA-Z0-9-#_áÁéÉíÍóÓúÚñÑüÜ:\s]+$/', $val) or strlen($val) > 20) {
				$est = true;			
				break;
			}
			if ($key === 'pass' and !preg_match('/^[a-zA-Z0-9-#_áÁéÉíÍóÓúÚñÑüÜ:\s]+$/', $val) or strlen($val) > 20){
				$est = true;
				break;
			}
		}

		return ($est) ? false : true ;
	}

	function ver_negocio(array $arr_neg) : bool
	{
		$est = null;

		foreach ($arr_per as $key => $val) {

			if ($key === 'nombre' and !preg_match('/^[a-zA-Z0-9-#áÁéÉíÍóÓúÚñÑüÜ\s]+$/', $val) or strlen($val) > 30){
				$est = true;
				break;
			}
			if ($key === 'tipo' and $val !== 'Tienda' or $val !== 'Restaurant' or strlen($val) > 1){
				$est = true;
				break;
			}
			if ($key === 'hr_ini' and !is_bool($val)){
				$est = true;
				break;
			}
			if ($key === 'hr_fin' and !is_bool($val)){
				$est = true;
				break;
			}
			if ($key === 'direccion' and !preg_match("/^[a-zA-Z0-9-.áÁéÉíÍóÓúÚñÑüÜ#\s]+$/", $val) or strlen($val) > 40){
				$est = true;
				break;
			}
			if ($key === 'fecha_nac' and !(date('d-m-Y', strtotime($val)) == $val)) {
				$est = true;
				break;
			}
			if ($key === 'cel_tel' and (!is_numeric($val) or strlen($val) !== 9)){
				$est = true;
				break;
			}
		}

		return ($est) ? false : true ;
	}
 ?>
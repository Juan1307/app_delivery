<?php


	if (!val_id($id)) {
		die('error en id');
	}
	settype($id, "int");

	require_once '../models/Persona.php';

	$nego = new Negociante();

	switch ($mt) {

		case 'GET':
			
		break;

		case 'PUT':
			if (!val_data($request)) {
				die('error datos corruptos');
			}

			$data = $cli->put_cliente_id($id_cli, $data);

			echo json_encode($data);
		break;

		case 'DEL':
			$data = $cli->get_persona_id($id_cli, 'CLIENTE');

			echo json_encode($data);
		break;

		default:
			die('error back :/');
		break;
	}


 ?>
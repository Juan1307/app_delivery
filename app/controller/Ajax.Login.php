<?php 
	
	$request;
	$user = $request['user'];
	$pass = $request['pass'];

	if (!verify_param($user,$pass)) {
		die('Ooops error de autenticacion');
	}

	switch ($opt) {
		case 'CLIENTE':
			# code... 
		break;

		case 'NEGOCIANTE':
			# code...
		break;
		
		default:
			die('error back :/');
		break;
	}

 ?>
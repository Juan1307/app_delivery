<?php 
	
	$request;
	$user = $request['user'];
	$pass = $request['pass'];

	if (!verify_param($user,$pass)) {
		die('Ooops error de autenticacion');
	}

	switch ($opt) {
		case 'CLI':
			# code... 
		break;

		case 'NEG':
			# code...
		break;

		case 'TRA':
			# code...
			break;
		
		default:
			die('error back :/');
		break;
	}

 ?>
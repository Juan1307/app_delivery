<?php 
	
	require_once 'App.Personas.php';
	/**
	 * Calse Cliente
	 */
	class Cliente extends Personas
	{

		public function pst_cliente(array $data) : bool
		{
			$per = $data['persona'];
			$usu = $data['usuario'];
			//
		}

		public function put_cliente(array $data) : bool
		{
			$usu = $data['usuario'];
		}
	}


 ?>
<?php 
	
	require_once 'App.Personas.php';
	/**
	 * Calse Cliente
	 */
	class Trabajador extends Personas
	{
		public function pst_trabajador(array $data) : bool
		{
			$per = $data['persona'];
			$usu = $data['usuario'];
		}

		public function put_trabajador(array $data) : bool
		{
			$per = $data['persona'];
			$usu = $data['usuario'];
		}
	}
 ?>
<?php 

	/**
	 * Clase negocio
	 */
	class Negocio extends DB
	{

		function __construct()
		{
			parent::__construct();
		}

		public function pst_negocio(array $data, int $id_per) : bool
		{
			# Para añadir mas negocios a una persona o negociante
		}

		public function del_negocio(int $id_neg, int $id_per) : bool
		{
			# Para eliminar un negocio 
		}

		//FILTROS DE NEGOCIO
		public function get_exist_negocio(int $n_ruc) : bool
		{
			# code...
		}

	}

 ?>
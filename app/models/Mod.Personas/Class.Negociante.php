<?php 
	
	require_once 'App.Personas.php';
	/**
	 * Calse Cliente
	 */
	class Negociante extends Personas
	{
		public function get_negocios(int $id) : array 
		{
		    #Config data-table¡
		    $sql = $this->mysql->prepare("SELECT * FROM tbl_det_usu_neg INNER JOIN tbl_usuarios ON 
                                      	  	id_per_usu = id_neg_per_usu WHERE id_per_usu = $id");
		      	$sql->execute();
		    $data = $sql->fetchAll();
		    
		    return $data;
		}

		public function pst_negociante(array $per, array $usu, array $neg) : bool
		{
		    $sql = $this->mysql->prepare("SELECT COUNT(1) FROM tbl_personas INNER JOIN tbl_usuarios ON id_persona = id_per_usu 
		    							  WHERE p_num_doc = '$dni' AND p_tipo = '$tp'");
		    $sql->execute();
		    $sql = $this->mysql->prepare("SELECT COUNT(1) FROM tbl_personas INNER JOIN tbl_usuarios ON id_persona = id_per_usu 
		    							  WHERE p_num_doc = '$dni' AND p_tipo = '$tp'");
		    $sql->execute();
		    $sql = $this->mysql->prepare("SELECT COUNT(1) FROM tbl_personas INNER JOIN tbl_usuarios ON id_persona = id_per_usu 
		    							  WHERE p_num_doc = '$dni' AND p_tipo = '$tp'");
		    $sql->execute();
		}

		public function put_negociante(array $usu, array $neg) : bool
		{
			$usu = $data['persona'];
			$per = $data['negocio'];
		}

		#MANEJO DE TRABAJADORES
		public function pst_trabajador(array $data, int $id) : bool
		{
			
		}

		public function put_trabajador(array $data, int $id) : bool
		{
			
		}

		public function del_trabajador(int $id, int $id_tb) : bool
		{
			
		}

	}


 ?>
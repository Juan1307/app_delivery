<?php 
	
	require_once 'App.Personas.php';
	/**
	 * Calse Cliente
	 */
	class Cliente extends Personas
	{

		public function pst_cliente(array $arr_per, array $arr_user) : bool
		{
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

      		try {

				$this->mysql->beginTransaction();

				$sql = $this->mysql->prepare("INSERT INTO tbl_personas VALUES(NULL, :)");

					$sql->bindParam(":tipo",$nombres,PDO::PARAM_STR);
					$sql->bindParam(":num_doc",$apellidos,PDO::PARAM_STR);
					$sql->bindParam(":nombres",$ndni,PDO::PARAM_STR);
					$sql->bindParam(":apellidos",$contacto,PDO::PARAM_STR);
					$sql->bindParam(":sexo",$usuario,PDO::PARAM_BOOL);
					$sql->bindParam(":direccion",$hash,PDO::PARAM_STR);
					$sql->bindParam(":fecha_nac",$privilegio,PDO::PARAM_STR);
					$sql->bindParam(":cel_tel",$id_dir,PDO::PARAM_INT);

				$sql = $this->mysql->prepare("SELECT COUNT(1) FROM tbl_personas INNER JOIN tbl_usuarios ON id_persona = id_per_usu 
		    							  WHERE p_num_doc = '$dni' AND p_tipo = '$tp'");

			
				$this->mysql->commit();
			} catch (Exception $e){
				$this->mysql->rollback();
			}
		}

		public function put_cliente(array $user) : bool
		{
			$usu = $data['usuario'];
		}
	}


 ?>
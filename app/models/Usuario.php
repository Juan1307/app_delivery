<?php 
	
	require_once '../config/cnx.php';
	
	/** * Clase Usuarios*/
	class Usuario extends DB
	{
		function __construct() {
			parent::__construct();
		}

		public function get_Users(int $pag) : array
		{ 
			#Config paginacion
		    $pg = parent::getConfigTable('tbl_usuarios', $pag);
		    $dh = $pg['d_h'];
		    	unset($pg['d_h']);

		    #Config data-table¡
		    $sql = $this->mysql->prepare("SELECT * FROM tbl_usuarios LIMIT $dh, 10");
		      	$sql->execute();

		    $data = $sql->fetchAll();
		    $outdata = array('data'=> $data);
		    
		    return array_merge($outdata, $pg);
		}
		
		public function get_User_Id(int $user_id) : array
		{
			$sql = $this->mysql->prepare("SELECT * FROM tbl_usuarios WHERE id_usuario=:id_user");

				$sql->bindParam(":id_user",$user_id,PDO::PARAM_INT);

				$sql->execute();

			return $sql->fetchAll();
		}

		public function put_Usuario(array $user_put) : bool
		{
			$sql = $this->mysql->prepare("UPDATE tbl_usuarios SET u_usuario=:user, u_password=:pass WHERE id_usuario=:id_user");

				$sql->bindParam(":id_user",$user_put[0],PDO::PARAM_INT);
				$sql->bindParam(":user",$user_put[1],PDO::PARAM_STR);
				$sql->bindParam(":pass",$user_put[2],PDO::PARAM_STR);
			
			return $sql->execute();
		}

		public function del_Usuario(int $user_id) : bool
		{
			$sql = $this->mysql->prepare("DELETE FROM tbl_usuarios WHERE id_usuario=:id_user");

				$sql->bindParam(":id_user",$user_id,PDO::PARAM_INT);

			return $sql->execute();
		}

		
	}

	$user = new Usuario();

	$u = $user->get_Users(1);
	echo "<hr>";
	var_export($u);

?>
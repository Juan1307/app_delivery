<?php 
	
	require_once '../config/cnx.php';
	
	/* Clase Usuarios*/

	class Personas extends DB
	{
		function __construct() {
			parent::__construct();
		}

		public function get_personas(string $tp, int $pag) : array
		{
			#Config paginacion
		    $sql = $this->mysql->prepare("SELECT COUNT(1) FROM tbl_personas INNER JOIN tbl_usuarios ON 
                                      	id_persona = id_per_usu WHERE p_tipo = '$tp'");
		      	$sql->execute();
      		$total = $sql->fetchColumn();
		    
		    $pg = parent::getConfigTable($total, $pag);
		    $dh = $pg['d_h'];
		    	unset($pg['d_h']);

		    #Config data-table¡
		    $sql = $this->mysql->prepare("SELECT * FROM tbl_personas INNER JOIN tbl_usuarios ON id_persona = id_per_usu 
		    							  WHERE p_tipo = '$tp' LIMIT $dh, $pag");
		      	$sql->execute();
		    $data = $sql->fetchAll();
		    
		    $outdata = array('data'=> $data);
		    
		    return array_merge($outdata, $pg);
		}

		public function get_persona_id(string $tp, int $id) : array
		{
		    $sql = $this->mysql->prepare("SELECT * FROM tbl_personas INNER JOIN tbl_usuarios ON id_per_usu = id_persona 
		    							  WHERE id_persona = $id AND p_tipo = '$tp'");
		      	$sql->execute();
		    return $sql->fetch();
		}

		public function del_persona_id(string $tp, int $id) : array
		{
		    $sql = $this->mysql->prepare("SELECT * FROM tbl_personas INNER JOIN tbl_usuarios ON id_per_usu = id_persona 
		    							  WHERE id_persona = $id AND p_tipo = '$tp'");
		      	$sql->execute();
		    return $sql->fetch();
		}

		public function pst_cliente(array $data, string $tp) : bool
		{
			$per = $data['persona'];
			$usu = $data['usuario'];
		}

		public function pst_negocio(array $data, string $tp) : bool
		{
			$per = $data['persona'];
			$usu = $data['usuario'];
			$neg = $data['negocio'];
		}
	}

	$user = new Personas();

	$u = $user->get_personas('CLIENTE',1);

	echo "<hr>";
	var_export($u);

	$i = $user->get_persona_id(3);
	echo "<hr>";
	var_export($i);

?>
<?php 
  /*DB conexion - PDO */

  class DB 
  {

    protected $mysql = NULL;

    function __construct(){

      try {
          
          $this->mysql = $this->getConnection(); //asigna conexion

      } catch (PDOException $e) {

          echo $e->getMessage();//imprimo el error
          die();
      }
    }

    private function getConnection()
    {  
      # DSN - config
      define("HOST", 'localhost');
      define("DB", 'db_appdelivery_test');
      define("PORT", 3306);
      define("CHARSET", 'utf8');
      #Config DSN
      define("DSN", 'mysql:host='.HOST.';dbname='.DB.';port='.PORT.';charset='.CHARSET);

      # user y pass
      $user = 'root';
      $pass = '';

        # opciones - PDO
        $op = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

      # API - DBH handle
      $dbh = new PDO(DSN,$user,$pass,$op);

      # LOG - errors
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $dbh;
    }

    protected function getConfigTable(int $total ,int $pag, $p_pag = 10) : array
    {

      $total_pag = ceil($total/ $p_pag);

        if ($pag > $total_pag) {
          $pag = $total_pag;
        }

      $pag = ($pag == 0) ? 0 : $pag - 1;
        //$pag -=1;
      $d_h = $pag * $p_pag;

        #siguiente y anterior
        $pag_s = ($pag >= $total_pag - 1) ? 1 : $pag + 2;
        $pag_a = ($pag < 1) ? $total_pag : $pag;

      return [  'd_h' => $d_h,'total_r' => $total,
                'pag_act' => ( $pag + 1),'pag_sig' => $pag_s,
                'pag_ant' => $pag_a,'total_p' => $total_pag];
    }

  }

 ?>
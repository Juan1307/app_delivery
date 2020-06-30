<?php 

/**
 * Clase Pedido
 */
class Pedido extends DB
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_pagos_cli(int $id) :array
	{
		# Trae los pagos hechos por el cliente
	}

	public function get_pedidos_cli(int $id) :array
	{
		# Trae los pedidos hechos por el cliente
	}

}

 ?>
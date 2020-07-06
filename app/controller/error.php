<?php

    // Un string json válido
    require_once '../models/Mod.Personas/Class.Cliente.php';

    $cli = new Cliente();

    $res = $cli->probando_xd('sadasd');
    echo "$res";


    $res = Personas::probando_xd('sadasd');
    echo "$res";
?>
<?php

require 'class.db.php';

    /*$query="select * from sip_buddies";
    $sockets = db::getInstance()->getResult($query);

    echo "Resultados: <br/>";
    //var_dump($sockets);*/

    $module = $_GET["module"];
    $view   = $_GET["view"];
    $id     = $_GET["id"];

    include 'layout.main.php';


 ?>

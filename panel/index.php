<?php

require 'class.db.php';

    /*$query="select * from sip_buddies";
    $sockets = db::getInstance()->getResult($query);

    echo "Resultados: <br/>";
    //var_dump($sockets);*/

    if ($_GET["module"])
      $module = $_GET["module"];
    if ($_GET["view"])
      $view   = $_GET["view"];
    if ($_GET["id"])
      $id     = $_GET["id"];

    include 'layout.main.php';


 ?>

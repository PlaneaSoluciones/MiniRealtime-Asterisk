<?php

require 'class.db.php';

    $query="select * from sip_buddies";
    $sockets = db::getInstance()->getResult($query);

    echo "Resultado: <br/>";
    var_dump($sockets);
 ?>

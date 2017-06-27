<?php

require 'class.db.php';

    $query="select * from sip_buddies";
    $sockets = db::getInstance()->getResult($query);

    echo "resultado: <br/>";
    var_dump($sockets);
 ?>

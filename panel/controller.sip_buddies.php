<?php

switch ($view) {
    case "add":
        edit(null);
        break;
    case "edit":
        edit($id);
        break;
    default: // List
        showlist();
        break;
}

function showlist(){
  // Mostrar listado

  $query="select id, name, default_user from sip_buddies";
  $sockets = db::getInstance()->getResult($query);
  echo $sockets[id];
}

function edit($id){
  if ($_POST['type'] == "edit" or $_POST['type'] == "new"){
    // Guardar cambios en base de datos
  }else{
    // Mostrar formulario de edicion
    ?>

      <form action="" method="post" class="form">
        <fieldset>
          <legend>Extensión</legend>
            <label for="extension">Extensión</label>
            <input type="text" name="extension" id="extension" placeholder="101">

            <label for="cellerid">Caller ID</label>
            <input type="text" name="cellerid" id="cellerid" placeholder="Pepito">
        </fieldset>
      </form>
    <?php
  }
}

 ?>

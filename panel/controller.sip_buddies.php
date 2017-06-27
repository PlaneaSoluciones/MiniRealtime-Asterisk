<?php

switch ($view) {
    case "add":
        edit(null);
        break;
    case "edit":
        edit($id);
        break;
    default: // List
        list();
        break;
}

function list(){
  // Mostrar listado
}

function edit($id){
  if ($_POST['type'] == "edit" or $_POST['type'] == "new"){
    // Guardar cambios en base de datos
  }else{
    // Mostrar formulario de edicion
    ?>

      <form action="" method="post">
        <fieldset>
          <legend>Extensi'on</legend>
            <label for="extension">Extensi'on</label>
            <input type="text" name="extension" id="extension" placeholder="101">

            <label for="cellerid">Caller ID</label>
            <input type="text" name="cellerid" id="cellerid" placeholder="Pepito">
        </fieldset>
      </form>
    <?php
  }
}

 ?>

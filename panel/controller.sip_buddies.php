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
}

function edit($id){
  if ($_POST['type'] == "edit" or $_POST['type'] == "new"){
    // Guardar cambios en base de datos
    echo "Guardar datos en base de datos";
  }else{
    // Mostrar formulario de edicion
    echo "Editar"; // borrar
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

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
  }
}

 ?>

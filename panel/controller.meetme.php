<?php

switch ($view) {
    case "add":
        edit(null, $type);
        break;
    case "edit":
        edit($id, $type);
        break;
    default: // List
        showlist();
        break;
}

function showlist(){
  global $db;
  // Mostrar listado
  $query="select confno, pin, adminpin from meetme";
  $dbdata = db::getInstance()->query($query);

  if (isset ($dbdata)){
    ?>
    <table>
      <tr>
        <th>Numero Conf</th>
        <th>PIN</th>
        <th>Admin PIN</th>
        <th></th>
      </tr>
    <?php
    foreach ($dbdata as $data) {
      echo '<tr>';
        echo '<td>'.$data['confno'].'</td>';
        echo '<td>'.$data['pin'].'</td>';
        echo '<td>'.$data['adminpin'].'</td>';
        echo '<td><a href="?module='.$module.'&view=edit&id='.$data['id'].'">Editar</a></td>';
      echo '</tr>';
    }
    ?>
    </table>
    <?php
  }

}

function edit($id, $postType){

  if ($postType == "store"){
    if ($id == null){ // ADD NEW ENTRY

    }else{ // EDIT ENTRY WITH ID $ID

    }
    // Guardar cambios en base de datos

  }else{
    // Mostrar formulario de edicion
    ?>

      <form action="" method="post" class="form">
        <fieldset>
          <legend>Extensión</legend>
            <label for="extension">Extensión</label>
            <input type="text" name="extension" id="extension" placeholder="101">

            <label for="callerid">Caller ID</label>
            <input type="text" name="callerid" id="callerid" placeholder="Pepito">
        </fieldset>
      </form>
    <?php
  }
}

 ?>

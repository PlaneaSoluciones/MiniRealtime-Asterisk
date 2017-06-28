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
  global $db, $module;
  // Getting element list
  $query="select id, confno, pin, adminpin from meetme";
  $dbdata = db::getInstance()->query($query);
  // Showing HTML table list 
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
        echo '<td><a href="?module='.$module.'&view=edit&id='.$data['id'].'">Editar</a> | <a href="?module='.$module.'&view=delete&id='.$data['id'].'">Eliminar</a></td>';
      echo '</tr>';
    }
    ?>
    </table>
    <?php
  }

}

function edit($id, $postType){

  if ($postType == "store"){
    $confno   = (isset($_POST['confno'])  ? $_POST['confno'] : null);
    $pin      = (isset($_POST['pin'])  ? $_POST['pin'] : null);
    $adminpin   = (isset($_POST['adminpin'])  ? $_POST['adminpin'] : null);

    if ($id == null){ // ADD NEW ENTRY
      $query="insert into meetme (confno, pin, adminpin) values ('$confno', '$pin', '$adminpin')";
      db::getInstance()->query($query);
    }else{ // EDIT ENTRY WITH ID $ID
      $query="update meetme set confno = '$confno', pin = '$pin', adminpin = '$adminpin' where id = '$id'";
      db::getInstance()->query($query);
    }

    header('Location: ?module=meetme');
    exit();

  }else{
    // Getting variables from POST
    if (isset($id)){
      $query="select id, confno, pin, adminpin from meetme where id = $id";
      $dbdata = db::getInstance()->getResult($query);
      $confno = $dbdata['confno'];
      $pin = $dbdata['pin'];
      $adminpin = $dbdata['adminpin'];
    }else{
      $confno = null;
      $pin = null;
      $adminpin = null;
    }
    // HTML form view
    ?>
      <form action="" method="post" class="form">
        <fieldset>
          <legend>Salas de conferencia</legend>
            <label for="confno">Numero de extension</label>
            <input type="text" name="confno" id="confno" placeholder="3001" value="<?php echo $confno ?>">

            <label for="pin">PIN</label>
            <input type="text" name="pin" id="pin" placeholder="0000" value="<?php echo $pin ?>">

            <label for="adminpin">PIN Administrador</label>
            <input type="text" name="adminpin" id="adminpin" placeholder="8888" value="<?php echo $adminpin ?>">

            <input type="hidden" name="type" value="store">
            <input type="submit" value="Enviar">
        </fieldset>
      </form>
    <?php
  }
}

 ?>

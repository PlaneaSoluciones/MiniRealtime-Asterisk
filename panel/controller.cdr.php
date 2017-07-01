<?php

switch ($view) {
    default: // List
        showlist();
        break;
}

function showlist(){
  global $db, $module;
  // Getting element list
//  $query="select calldate, src, dst, duration, disposition from cdr order by calldate desc limit 30";
//  $dbdata = db::getInstance()->query($query);
  // Showing HTML table list
  if (isset ($dbdata)){
    ?>
    <table>
      <tr>
        <th>Fecha</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>Duracion</th>
        <th>Estado</th>
      </tr>
    <?php
    foreach ($dbdata as $data) {
      echo '<tr>';
        echo '<td>'.$data['calldate'].'</td>';
        echo '<td>'.$data['src'].'</td>';
        echo '<td>'.$data['dst'].'</td>';
        echo '<td>'.$data['duration'].'</td>';
        echo '<td>'.$data['disposition'].'</td>';
      echo '</tr>';
    }
    ?>
    </table>
    <?php
  }

}
 ?>

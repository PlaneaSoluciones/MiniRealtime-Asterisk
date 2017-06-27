<div id="menu">
  <ul>
    <li><a href='?module=home' class='<?php if ($module=='home') echo 'active';?>'>Portada</a></li>
    <li><a href='?module=sip_buddies' class='<?php if ($module=='sip_buddies') echo 'active';?>'>Extensiones SIP</a></li>
    <li><a href='?module=sip_buddies' class='<?php if ($module=='queues') echo 'active';?>'>Colas</a></li>
    <li><a href='?module=sip_buddies' class='<?php if ($module=='meetme') echo 'active';?>'>Salas de conferencia</a></li>
    <li><a href='?module=sip_buddies' class='<?php if ($module=='cdr') echo 'active';?>'>Listado de llamadas</a></li>
    <li><a href='?module=sip_buddies' class='<?php if ($module=='click2call') echo 'active';?>'>Click 2 Call</a></li>
  </ul>
</div>

<div id="submenu">
<?php if ($module == 'sip_buddies') {?>
  <ul>
    <li><a href='?module=sip_buddies&view=list'>Listado</a></li>
    <li><a href='?module=sip_buddies&view=add'>Anadir</a></li>
  </ul>
<?php } elseif ($module == 'queues') {?>
  <ul>
    <li><a href='?module=queues&view=list'>Listado</a></li>
    <li><a href='?module=queues&view=add'>Anadir</a></li>
  </ul>
<?php } elseif ($module == 'meetme') {?>
    <ul>
      <li><a href='?module=meetme&view=list'>Listado</a></li>
      <li><a href='?module=meetme&view=add'>Anadir</a></li>
    </ul>
<?php } else {?>

<?php }?>
</div>

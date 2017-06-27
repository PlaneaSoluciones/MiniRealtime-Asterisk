<div id="menu">
  <a href='?module=home' class='<?php if ($module=='home') echo 'selected';?>>'>Portada</a>
  <a href='?module=sip_buddies' class='<?php if ($module=='sip_buddies') echo 'selected';?>>'>Extensiones SIP</a>
  <a href='?module=sip_buddies' class='<?php if ($module=='queues') echo 'selected';?>>'>Colas</a>
  <a href='?module=sip_buddies' class='<?php if ($module=='meetme') echo 'selected';?>>'>Salas de conferencia</a>
</div>

<div id="submenu">
<?php if ($module == 'sip_buddies') {?>
  <a href='?module=sip_buddies&view=list'>Lista</a>
  <a href='?module=sip_buddies&view=add'>Anadir</a>
  <a href='?module=sip_buddies&view=edit'>Editar</a>
<?php } elseif ($module == 'voicemail') {?>

<?php } else {?>

<?php }?>
</div>

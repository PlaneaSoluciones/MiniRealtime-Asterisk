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
  // Mostrar listado
  $query="select id, name, callerid, secret from sip_buddies";
  $dbdata = db::getInstance()->query($query);

  if (isset ($dbdata)){
    ?>
    <table>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Caller Id</th>
        <th>Secret</th>
        <th></th>
      </tr>
    <?php
    foreach ($dbdata as $data) {
      echo '<tr>';
        echo '<td>'.$data['id'].'</td>';
        echo '<td>'.$data['name'].'</td>';
        echo '<td>'.$data['callerid'].'</td>';
        echo '<td>'.$data['secret'].'</td>';
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
      if ($id == null){ // ADD NEW ENTRY

      }else{ // EDIT ENTRY WITH ID $ID

      }
      // Guardar cambios en base de datos

      /*INSERT INTO `sipfriends`
      (`id`, `name`, `ipaddr`, `port`, `regseconds`, `defaultuser`, `fullcontact`, `regserver`, `useragent`, `lastms`, `host`, `type`, `context`, `permit`, `deny`, `secret`, `md5secret`, `remotesecret`, `transport`, `dtmfmode`, `directmedia`, `nat`, `callgroup`, `pickupgroup`, `language`, `allow`, `disallow`, `insecure`, `trustrpid`, `progressinband`, `promiscredir`, `useclientcode`, `accountcode`, `setvar`, `callerid`, `amaflags`, `callcounter`, `busylevel`, `allowoverlap`, `allowsubscribe`, `videosupport`, `maxcallbitrate`, `rfc2833compensate`, `mailbox`, `session-timers`, `session-expires`, `session-minse`, `session-refresher`, `t38pt_usertpsource`, `regexten`, `fromdomain`, `fromuser`, `qualify`, `defaultip`, `rtptimeout`, `rtpholdtimeout`, `sendrpid`, `outboundproxy`, `callbackextension`, `registertrying`, `timert1`, `timerb`, `qualifyfreq`, `constantssrc`, `contactpermit`, `contactdeny`, `usereqphone`, `textsupport`, `faxdetect`, `buggymwi`, `auth`, `fullname`, `trunkname`, `cid_number`, `callingpres`, `mohinterpret`, `mohsuggest`, `parkinglot`, `hasvoicemail`, `subscribemwi`, `vmexten`, `autoframing`, `rtpkeepalive`, `call-limit`, `g726nonstandard`, `ignoresdpversion`, `allowtransfer`, `dynamic`) VALUES
      */
      //(1, '300', '', 0, 1363805200, '300', 'sip:300@192.168.20.6:55612^3Bob', NULL, 'Bria Android 2.2.1', 26, 'dynamic', 'peer', 'inbound', '', NULL, '300', NULL, NULL, 'udp', 'rfc2833', NULL, NULL, NULL, NULL, NULL, 'alaw', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300@default', NULL, NULL, NULL, NULL, NULL, '300', NULL, '300', '5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', NULL, NULL, NULL, '', '300', NULL, '300', NULL, NULL, NULL, NULL, 'yes', 'yes', NULL, NULL, 300, 2, NULL, NULL, 'yes', 'yes');

      // name, defaultuser, fromuser = $name
      // callerid = "<Pepito> ($name)"
      // host = "dynamic"
      // type = "peer"
      // context = "inbound"
      // secret = $password
      // transport = "udp"
      // dtmfmode = {rfc2833,info,inband}
      // insecure = "port,invite"
      // disallow = "all"
      // allow = {alaw;ulaw;g729}
      // canreinvite = {yes,nonat,update}
      // mailbox = $name."@mailbox"
      // callgroup = 0
      // pickupgroup = 0
      // language = "es"
      // call-limit = 10

    }else{
      // Mostrar formulario de edicion
      if (isset($id)){
        $query="select id, name, callerid, secret from sip_buddies where id = $id";
        $dbdata = db::getInstance()->getResult($query);
        $name = $dbdata['name'];
        $callerid = $dbdata['callerid'];
        $host = $dbdata['host'];
        $exttype = $dbdata['type'];
        $context = $dbdata['context'];
        $secret = $dbdata['secret'];

      }else{
        $name = null;
        $callerid = null;
        $host = null;
        $type = null;
        $context = null;
        $secret = null;
      }

      ?>

      <form action="" method="post" class="form">
        <fieldset>
          <legend>Extensión</legend>
            <label for="extension">Extensión</label>
            <input type="text" name="extension" id="extension" placeholder="101" value="<?php echo $name; ?>">

            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Pepito" value="<?php echo $name; ?>">

            <label for="callerid">Caller ID</label>
            <input type="text" name="callerid" id="callerid" placeholder="Pepito" value="<?php echo $callerid; ?>">>

            <label for="host">Host</label>
            <input type="text" name="host" id="host" placeholder="dynamic" value="<?php echo $host; ?>">>

            <label for="exttype">Type</label>
            <input type="text" name="exttype" id="exttype" placeholder="peer" value="<?php echo $exttype; ?>">>

            <label for="context">Context</label>
            <input type="text" name="context" id="context" placeholder="inbound" value="<?php echo $context; ?>">>

            <label for="secret">Secret</label>
            <input type="text" name="secret" id="secret" placeholder="Pepito" value="<?php echo $secret; ?>">>


           <input type="hidden" name="type" value="store">
        </fieldset>
      </form>
    <?php
  }
}
?>

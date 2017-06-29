<?php

//ringall: ring all available channels until one answers (default)
//roundrobin: take turns ringing each available interface (deprecated in 1.4, use rrmemory)
//leastrecent: ring interface which was least recently called by this queue
//fewestcalls: ring the one with fewest completed calls from this queue
//random: ring random interface
//rrmemory: round robin with memory, remember where we left off last ring pass
// -name
// musiconhold						default
// -announce						thank-you-message
// context						internas
// -timeout		        300
// monitor_join
// monitor_format
// -queue_youarenext
// -queue_thereare
// -queue_callswaiting
// -queue_holdtime
// -queue_minutes
// -queue_seconds
// -queue_lessthan
// -queue_thankyou
// -queue_reporthold
// -announce_frequency		60
// announce_round_seconds
// announce_holdtime
// -retry		3
// -wrapuptime		20 //usuario no disponible despues de
// -maxlen		 0 // max people on the queue
// servicelevel
// -strategy
// joinempty						no // callers can join empty queues
// leavewhenempty						yes
// eventmemberstatus
// eventwhencalled
// reportholdtime
// memberdelay		0
// -weight		      0 // importancia de callers
// timeoutrestart
// -periodic_announce	             thank-you-message
// -periodic_announce_frequency		30
// -ringinuse				    yes/no
// setinterfacevar


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
  $query="select id, name from queues_table";
  $dbdata = db::getInstance()->query($query);
  // Showing HTML table list
  if (isset ($dbdata)){
    ?>
    <table>
      <tr>
        <th>Nombre</th>
        <th></th>
      </tr>
    <?php
    foreach ($dbdata as $data) {
      echo '<tr>';
        echo '<td>'.$data['name'].'</td>';
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
    $name   = (isset($_POST['name'])  ? $_POST['name'] : null);
    $timeout   = (isset($_POST['timeout'])  ? $_POST['timeout'] : null);
    $retry   = (isset($_POST['retry'])  ? $_POST['retry'] : null);
    $wrapuptime   = (isset($_POST['wrapuptime'])  ? $_POST['wrapuptime'] : null);
    $maxlen   = (isset($_POST['maxlen'])  ? $_POST['maxlen'] : null);
    $strategy   = (isset($_POST['strategy'])  ? $_POST['strategy'] : null);
    $ringinuse   = (isset($_POST['ringinuse'])  ? $_POST['ringinuse'] : null);
    $weight   = (isset($_POST['weight'])  ? $_POST['weight'] : null);
    $periodic_announce   = (isset($_POST['periodic_announce'])  ? $_POST['periodic_announce'] : null);
    $periodic_announce_frequency   = (isset($_POST['periodic_announce_frequency'])  ? $_POST['periodic_announce_frequency'] : null);
    $announce   = (isset($_POST['announce'])  ? $_POST['announce'] : null);
    $announce_frequency   = (isset($_POST['announce_frequency'])  ? $_POST['announce_frequency'] : null);
    $announce_holdtime   = (isset($_POST['announce_holdtime'])  ? $_POST['announce_holdtime'] : null);
    $queue_youarenext   = (isset($_POST['queue_youarenext'])  ? $_POST['queue_youarenext'] : null);
    $queue_thereare   = (isset($_POST['queue_thereare'])  ? $_POST['queue_thereare'] : null);
    $queue_callswaiting   = (isset($_POST['queue_callswaiting'])  ? $_POST['queue_callswaiting'] : null);
    $queue_holdtime   = (isset($_POST['queue_holdtime'])  ? $_POST['queue_holdtime'] : null);
    $queue_minutes   = (isset($_POST['queue_minutes'])  ? $_POST['queue_minutes'] : null);
    $queue_seconds   = (isset($_POST['queue_seconds'])  ? $_POST['queue_seconds'] : null);
    $queue_lessthan   = (isset($_POST['queue_lessthan'])  ? $_POST['queue_lessthan'] : null);
    $queue_thankyou   = (isset($_POST['queue_thankyou'])  ? $_POST['queue_thankyou'] : null);
    $queue_reporthold   = (isset($_POST['queue_reporthold'])  ? $_POST['queue_reporthold'] : null);


    if ($id == null){ // ADD NEW ENTRY
      $query="insert into queues_table (name, timeout, retry, wrapuptime, maxlen, strategy, ringinuse, weight, periodic_announce, periodic_announce_frequency, announce, announce_frequency, announce_holdtime, queue_youarenext, queue_thereare, queue_callswaiting, queue_holdtime, queue_minutes, queue_seconds, queue_lessthan, queue_thankyou, queue_reporthold) values ('$name', '$timeout', '$retry', '$wrapuptime', '$maxlen', '$strategy', '$ringinuse', '$weight', '$periodic_announce', '$periodic_announce_frequency', '$announce', '$announce_frequency', '$announce_holdtime', '$queue_youarenext', '$queue_thereare', '$queue_callswaiting', '$queue_holdtime', '$queue_minutes', '$queue_seconds', '$queue_lessthan', '$queue_thankyou', '$queue_reporthold')";
      db::getInstance()->query($query);
    }else{ // EDIT ENTRY WITH ID $ID
      $query="update queues_table set name = '$name', timeout = '$timeout', retry = '$retry', wrapuptime = '$wrapuptime' where id = '$id'";
      db::getInstance()->query($query);
      $query="update queues_table set maxlen = '$maxlen', strategy = '$strategy', ringinuse = '$ringinuse', weight = '$weight' where id = '$id'";
      db::getInstance()->query($query);
      $query="update queues_table set periodic_announce = '$periodic_announce', periodic_announce_frequency = '$periodic_announce_frequency', announce = '$announce', announce_frequency = '$announce_frequency' where id = '$id'";
      db::getInstance()->query($query);
      $query="update queues_table set announce_holdtime = '$announce_holdtime', queue_youarenext = '$queue_youarenext', queue_thereare = '$queue_thereare' where id = '$id'";
      db::getInstance()->query($query);
      $query="update queues_table set queue_callswaiting = '$queue_callswaiting', queue_holdtime = '$queue_holdtime', queue_minutes = '$queue_minutes', queue_seconds = '$queue_seconds', queue_lessthan = '$queue_lessthan', queue_thankyou = '$queue_thankyou', queue_reporthold = '$queue_reporthold' where id = '$id'";
      db::getInstance()->query($query);


    }

    header('Location: ?module=queues');
    exit();

  }else{
    // Getting variables from POST
    if (isset($id)){
      $query="select name,timeout,retry,wrapuptime,maxlen,strategy,ringinuse,weight,periodic_announce,periodic_announce_frequency,announce,announce_frequency,announce_holdtime,queue_youarenext,queue_thereare,queue_callswaiting,queue_holdtime,queue_minutes,queue_seconds,queue_lessthan,queue_thankyou,queue_reporthold from queues_table where id = $id";
      $dbdata = db::getInstance()->getResult($query);

      $name = $dbdata['name'];
      $timeout = $dbdata['timeout'];
      $retry = $dbdata['retry'];
      $wrapuptime = $dbdata['wrapuptime'];
      $maxlen = $dbdata['maxlen'];
      $strategy = $dbdata['strategy'];
      $ringinuse = $dbdata['ringinuse'];
      $weight = $dbdata['weight'];
      $periodic_announce = $dbdata['periodic_announce'];
      $periodic_announce_frequency = $dbdata['periodic_announce_frequency'];
      $announce = $dbdata['announce'];
      $announce_frequency = $dbdata['announce_frequency'];
      $announce_holdtime = $dbdata['announce_holdtime'];
      $queue_youarenext = $dbdata['queue_youarenext'];
      $queue_thereare = $dbdata['queue_thereare'];
      $queue_callswaiting = $dbdata['queue_callswaiting'];
      $queue_holdtime = $dbdata['queue_holdtime'];
      $queue_minutes = $dbdata['queue_minutes'];
      $queue_seconds = $dbdata['queue_seconds'];
      $queue_lessthan = $dbdata['queue_lessthan'];
      $queue_thankyou = $dbdata['queue_thankyou'];
      $queue_reporthold = $dbdata['queue_reporthold'];
    }else{
      $name = null;
      $timeout = null;
      $retry = null;
      $wrapuptime = null;
      $maxlen = null;
      $strategy = null;
      $ringinuse = null;
      $weight = null;
      $periodic_announce = null;
      $periodic_announce_frequency = null;
      $announce = null;
      $announce_frequency = null;
      $announce_holdtime = null;
      $queue_youarenext = null;
      $queue_thereare = null;
      $queue_callswaiting = null;
      $queue_holdtime = null;
      $queue_minutes = null;
      $queue_seconds = null;
      $queue_lessthan = null;
      $queue_thankyou = null;
      $queue_reporthold = null;
    }
    // HTML form view
    ?>
      <form action="" method="post" class="form">
        <fieldset>
          <legend>Colas</legend>
            <label for="name">Nombre</label>
            <input type="text" name="name" placeholder="901" value="<?php echo $name ?>">

            <label for="timeout">Tiempo de expiracion</label>
            <input type="text" name="timeout" placeholder="300" value="<?php echo $timeout ?>">

            <label for="retry">Reintentos</label>
            <input type="text" name="retry" placeholder="3" value="<?php echo $retry ?>">

            <label for="wrapuptime">Expiracion del agente</label>
            <input type="text" name="wrapuptime" placeholder="20" value="<?php echo $wrapuptime ?>">

            <label for="maxlen">Numero max de personas en espera</label>
            <input type="text" name="maxlen" placeholder="0" value="<?php echo $maxlen ?>">

            <label for="strategy">Estrategia</label>
            <select name="strategy" id="strategy">
             <option value="ringall"<?php if ($strategy == "ringall") { echo ' selected="selected"';} ?>>ringall</option>
             <option value="roundrobin"<?php if ($strategy == "roundrobin") { echo ' selected="selected"';} ?>>roundrobin</option>
             <option value="leastrecent"<?php if ($strategy == "leastrecent") { echo ' selected="selected"';} ?>>leastrecent</option>
             <option value="fewestcalls"<?php if ($strategy == "fewestcalls") { echo ' selected="selected"';} ?>>fewestcalls</option>
             <option value="random"<?php if ($strategy == "random") { echo ' selected="selected"';} ?>>random</option>
             <option value="rrmemory"<?php if ($strategy == "rrmemory") { echo ' selected="selected"';} ?>>rrmemory</option>
            </select>

            <label for="ringinuse">Sonar si el agente ya esta hablando</label>
            <select name="ringinuse" id="ringinuse">
             <option value="1"<?php if ($ringinuse == "1") { echo ' selected="selected"';} ?>>Si</option>
             <option value="0"<?php if ($ringinuse == "0") { echo ' selected="selected"';} ?>>no</option>
            </select>

            <label for="weight">Importancia</label>
            <input type="text" name="weight" placeholder="0" value="<?php echo $weight ?>">

            <hr>

            <label for="periodic_announce">Anuncio periodico</label>
            <input type="text" name="periodic_announce" placeholder="thank-you-message" value="<?php echo $periodic_announce ?>">

            <label for="periodic_announce_frequency">Intervalo anuncio periodico</label>
            <input type="text" name="periodic_announce_frequency" placeholder="30" value="<?php echo $periodic_announce_frequency ?>">

            <label for="announce">Anuncio inicial</label>
            <input type="text" name="announce" placeholder="thank-you-message" value="<?php echo $announce ?>">

            <label for="announce_frequency">Frecuencia anuncio de posicion en la cola</label>
            <input type="text" name="announce_frequency" placeholder="60" value="<?php echo $announce_frequency ?>">

            <label for="announce_holdtime">Anunciar tiempo estimado</label>
            <select name="announce_holdtime" id="announce_holdtime">
             <option value="yes"<?php if ($announce_holdtime == "yes") { echo ' selected="selected"';} ?>>Si</option>
             <option value="no"<?php if ($announce_holdtime == "no") { echo ' selected="selected"';} ?>>No</option>
             <option value="once"<?php if ($announce_holdtime == "once") { echo ' selected="selected"';} ?>>1 vez</option>
            </select>

            <label for="queue_youarenext">Mensaje "Eres el siguiente"</label>
            <input type="text" name="queue_youarenext" placeholder="queue_youarenext" value="<?php echo $queue_youarenext ?>">

            <label for="queue_thereare">Mensaje "Hay"</label>
            <input type="text" name="queue_thereare" placeholder="queue_thereare" value="<?php echo $queue_thereare ?>">

            <label for="queue_callswaiting">Mensaje "...llamadas esperando"</label>
            <input type="text" name="queue_callswaiting" placeholder="queue_callswaiting" value="<?php echo $queue_callswaiting ?>">

            <label for="queue_holdtime">Mensaje "Tiempo de espera"</label>
            <input type="text" name="queue_holdtime" placeholder="queue_holdtime" value="<?php echo $queue_holdtime ?>">

            <label for="queue_minutes">Mensaje "Minutos"</label>
            <input type="text" name="queue_minutes" placeholder="queue_minutes" value="<?php echo $queue_minutes ?>">

            <label for="queue_seconds">Mensaje "Segundos"</label>
            <input type="text" name="queue_seconds" placeholder="queue_seconds" value="<?php echo $queue_seconds ?>">

            <label for="queue_lessthan">Mensaje "...menos de..."</label>
            <input type="text" name="queue_lessthan" placeholder="queue_lessthan" value="<?php echo $queue_lessthan ?>">

            <label for="queue_thankyou">Mensaje "Gracias"</label>
            <input type="text" name="queue_thankyou" placeholder="queue_thankyou" value="<?php echo $queue_thankyou ?>">

            <label for="queue_reporthold">Mensaje "En espera"</label>
            <input type="text" name="queue_reporthold" placeholder="queue_reporthold" value="<?php echo $queue_reporthold ?>">


            <input type="hidden" name="type" value="store">
            <input type="submit" value="Enviar">
        </fieldset>
      </form>
    <?php
  }
}


 ?>

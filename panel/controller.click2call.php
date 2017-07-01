<?php

switch ($view) {
    case "call":
        call($ext1, $ext2);
        break;
    default: // List
        call(null, null);
        break;
}



function call($ext1, $ext2){

  if (!is_null($ext1)){

    $strHost = "127.0.0.1";
    #specify the username you want to login with (these users are defined in /etc/asterisk/manager.conf)
    #this user is the default AAH AMP user; you shouldn't need to change, if you're using AAH.
    $strUser = "admin";
    #specify the password for the above user
    $strSecret = "123";
    #specify the channel (extension) you want to receive the call requests with
    #e.g. SIP/XXX, IAX2/XXXX, ZAP/XXXX, local/1NXXNXXXXXX@from-internal, etc
    #$strChannel = "local/1NXXNXXXXXX@from-internal";Use this for your cell phone Number;
    $strChannel = "local/".$ext1."@internas";
    #specify the context to make the outgoing call from.  By default, AAH uses from-internal
    #Using from-internal will make you outgoing dialing rules apply
    $strContext = "internas";
    #specify the amount of time you want to try calling the specified channel before hangin up
    $strWaitTime = "30";
    #specify the priority you wish to place on making this call
    $strPriority = "1";
    #specify the maximum amount of retries
    $strMaxRetry = "2";
/*
    $oSocket = fsockopen($strHost, 5038, $errnum, $errdesc) or die("Connection to host failed");
    fputs($oSocket, "Action: login\r\n");
    fputs($oSocket, "Events: off\r\n");
    fputs($oSocket, "Username: $strUser\r\n");
    fputs($oSocket, "Secret: $strSecret\r\n\r\n");
    fputs($oSocket, "Action: originate\r\n");
    fputs($oSocket, "Channel: $strChannel\r\n");
    fputs($oSocket, "WaitTime: $strWaitTime\r\n");
    fputs($oSocket, "CallerId: Click2Call\r\n");
    fputs($oSocket, "Exten: $ext2\r\n");
    fputs($oSocket, "Context: $strContext\r\n");
    fputs($oSocket, "Priority: 1\r\n\r\n");
    fputs($oSocket, "Action: Logoff\r\n\r\n");
    sleep(3);
    fclose($oSocket);

    echo "Llamando...";
*/
  }else{

    // HTML form view
    ?>
      <form action="?module=click2call&view=call" method="post" class="form">
        <fieldset>
          <legend>Click 2 Call</legend>
            <label for="ext1">Ext. Recepcion</label>
            <input type="text" name="ext1" id="ext1" placeholder="101">

            <label for="ext2">Ext. destino</label>
            <input type="text" name="ext2" id="ext2" placeholder="102">

            <input type="hidden" name="type" value="call">
            <input type="submit" value="Enviar">
        </fieldset>
      </form>
    <?php
  }
}

 ?>

<html>
<head>
  <title>MiniRealtime Asterisk Panel</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <?php
    include 'layout.menu.php';

    echo "Modulo ". $module;

    if (file_exists("controller.$module.php"))
      include "controller.$module.php";
  ?>

</body>
</html>

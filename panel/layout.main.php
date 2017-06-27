<html>
<head>

</head>
<body>

  <?php
    include 'layout.menu.php';
    
    if (file_exists("controller.$module.php"))
      include "controller.$module.php";
  ?>

</body>
</html>

<?php
/*Roberto Brown
8-893-2450*/
  ob_start();
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<title>Logout</title>
</head>
<body>
	<?php
  if(isset($_SESSION["usuario_verificado"])){
    session_destroy();
    header("Location: Login.php");
  }else {
    header("Location: Login.php");
  }
   ?>
</body>
</html>

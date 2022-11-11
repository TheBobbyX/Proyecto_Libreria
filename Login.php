<?php
/*Roberto Brown
8-893-2450*/
  ob_start();
  session_start();
  if(isset($_SESSION["usuario_verificado"])){
    header("Location: Inicio.php");
  }else{
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet"  href="css/style.css" type="text/css">
</head>
<body>
	<header>
		<img src="imagenes/libreria.jpg"alt="Logo de Libreria">
	</header>
	<div id=logindiv>
	<h1>Login</h1>
  <?php
    if(!isset($_REQUEST['usuario']) && !isset($_REQUEST['password'])){
   ?>
		<form id=loginform action="Login.php" method="post">
		<input class=logininput type="text" name="usuario"  placeholder="Usuario" required><br>
		<input class=logininput type="password" name="password"  placeholder="Contraseña" required><br>
		<input class=loginbott type="reset" value="Limpiar"> <input class=loginbott type="submit" value="Entrar">
	</form>
  <?php
    }else{
      $usuario = $_REQUEST['usuario'];
      $pass = $_REQUEST['password'];
      $semilla = "$1$".$pass."$";
      $pass_crypt = crypt($pass, $semilla);
      $pass_crypt2 = crypt($pass_crypt,substr(strrev($pass_crypt),0,2));
      require_once("class/usuario.php");
      $obj_login =new login();
      $validar_usuario=$obj_login->verificar_Usuario($usuario,$pass_crypt2);

      foreach ($validar_usuario as $array_resp) {
        foreach ($array_resp as $value) {
          $nfilas = $value;
        }
      }
      if($nfilas > 0){
        $usuario_verificado = $usuario;
        $_SESSION["usuario_verificado"]  = $usuario_verificado;
        header("Location: Inicio.php");
      }else{
        header("Location: Login.php");
      }
    }
   ?>
	</div>
</body>
<footer>
<div id=divinsta>
<a href="https://www.instagram.com/"><img src="imagenes/Instagram.png" alt="Instagram"></a>
<p id=txtredes>Instagram</p>
</div>
<div id=divface>
<a href="https://www.facebook.com/"><img src="imagenes/Facebook.png"  alt="Facebook"></a>
<p id=txtredes>Facebook</p>
</div>
<div id=divtwit>
<a href="https://www.twitter.com/"><img src="imagenes/Twitter.png"  alt="Twitter"></a>
<p id=txtredes>Twitter</p>
</div>
</footer>
</html>
<?php
}
 ?>

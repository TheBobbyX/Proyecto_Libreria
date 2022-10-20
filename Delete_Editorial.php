<?php
/*Roberto Brown
8-893-2450*/
  session_start();
  if(!isset($_SESSION["usuario_verificado"])){
    header("Location: Login.php");
  }else{
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Delete_Autor</title>
<link rel="stylesheet"  href="css/style.css" type="text/css">
</head>
<body>
	<header>
		<img src="imagenes/libreria.jpg" alt="Logo de Libreria">
	</header>
  <?php
  include("Nav.php");
   ?>
	</nav><br><br><br>
  <?php
  require_once("class/editorial.php");
  $obj_editorial= new editorial();
   ?>
		<div id=lanno>
		<h1>Id Editorial</h1>
		<form id=loginform action="Delete_Editorial.php" method="post">
				<input class=logininput type="number" name="Id_Editorial" placeholder="Ingrese Id Editorial..." required> <br>
				<input class=loginbott type="reset" value="Limpiar"> <input class=loginbott type="submit" value="Entrar">
		</form>
		</div><br>
	<section>
    <?php
    if(isset($_REQUEST['Id_Editorial'])){
      $eliminar_editorial=$obj_editorial->eliminar_editorial($_REQUEST['Id_Editorial']);
      foreach ($eliminar_editorial as $array_resp) {
        foreach ($array_resp as $value) {
          $nfilas = $value;
        }
      }
      if($nfilas > 0){
     ?>
      <script type="text/javascript">alert('Editorial eliminada Exitosamente');</script>
    <?php
      }else{
    ?>
			<script type="text/javascript">alert('No se ha Podido eliminar');</script>
  <?php
      }
    }
   ?>
	</section>
</body>
<?php
include("Footer.php");
 ?>
</html>
<?php
}
 ?>

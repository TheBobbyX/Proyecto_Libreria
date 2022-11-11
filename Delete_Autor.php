<?php
/*Roberto Brown
8-893-2450*/
  ob_start();
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
   <br><br><br>
  <?php
  require_once("class/autor.php");
  $obj_autor= new autor();
   ?>
		<div id=lanno>
		<h1>Id Autor</h1>
		<form id=loginform action="Delete_Autor.php" method="post">
				<input class=logininput type="number" name="id_autor" placeholder="Ingrese Id Autor..." required> <br>
				<input class=loginbott type="reset" value="Limpiar"> <input class=loginbott type="submit" value="Entrar">
		</form>
		</div><br>
	<section>
    <?php
    if(isset($_REQUEST['id_autor'])){
      $eliminar_autor=$obj_autor->eliminar_autor($_REQUEST['id_autor']);
      foreach ($eliminar_autor as $array_resp) {
        foreach ($array_resp as $value) {
          $nfilas = $value;
        }
      }
      if($nfilas > 0){
     ?>
      <script type="text/javascript">alert('Autor eliminado Exitosamente');</script>
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

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
<title>Insert_Autor</title>
<link rel="stylesheet"  href="css/style.css" type="text/css">
</head>
<body>
	<header>
		<img src="imagenes/libreria.jpg" alt="Logo de Libreria">
	</header>
  <?php
  include("Nav.php");
  require_once("class/autor.php");
  $obj_autor= new autor();
   ?>
		<div id=Insert_A>
		<h1>Inserción Datos Autor</h1>
			<form action="Insert_Autor.php" method="post">
				<div id=Insert_T_A>
					<p>Nombre</p>
					<p>Apellido</p>
					<p>Nacionalidad</p>
				</div>
				<div id=Insert_I_A>
					<input class=Insert_A_input type="text" name="Nombre" placeholder="Ingrese Nombre..." required>
					<input class=Insert_A_input type="text" name="Apellido" placeholder="Ingrese Apellido..." required>
					<input class=Insert_A_input type="text" name="Nacionalidad" placeholder="Ingrese Nacio..." required>
				</div>
				<div id=Insert_B_A>
					<input class=loginbott type="reset" value="Limpiar"> <input class=loginbott type="submit" value="Entrar">
				</div>
			</form>
		</div>
    <?php
    if(isset($_REQUEST['Nombre'])&&isset($_REQUEST['Apellido'])&&isset($_REQUEST['Nacionalidad'])){
      $insertar_autor=$obj_autor->insertar_autor($_REQUEST['Nombre'],$_REQUEST['Apellido'],$_REQUEST['Nacionalidad']);
      foreach ($insertar_autor as $array_resp) {
        foreach ($array_resp as $value) {
          $nfilas = $value;
        }
      }
      if($nfilas > 0){
     ?>
			<script type="text/javascript">alert('Inserción Efectuada Exitosamente');</script>
    <?php
      }else{
      ?>
			<script type="text/javascript">alert('Error No se ha Podido Realizar la Inserción');</script>
  <?php
      }
    }
   ?>
</body>
<?php
include("Footer.php");
 ?>
</html>
<?php
}
 ?>

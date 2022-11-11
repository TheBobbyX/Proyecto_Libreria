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
<title>Insert_Editorial</title>
<link rel="stylesheet"  href="css/style.css" type="text/css">
</head>
<body>
	<header>
		<img src="imagenes/libreria.jpg" alt="Logo de Libreria">
	</header>
  <?php
    include("Nav.php");
    require_once("class/editorial.php");
    $obj_editorial= new editorial();
   ?>
		<div id=Insert_E>
		<h1>Inserción Datos Editorial</h1>
			<form action="Insert_Editorial.php" method="post">
				<div id=Insert_T_E>
					<p>Nombre</p>
					<p>Telefono</p>
					<p>Direccion</p>
					<p>Ciudad</p>
					<p>Provincia</p>
				</div>
				<div id=Insert_I_E>
					<input class=Insert_E_input type="text" name="Nombre" placeholder="Ingrese Nombre..." required>
					<input class=Insert_E_input type="tel" name="Telefono" placeholder="###-####" pattern="[0-9]{3}-[0-9]{4}" required>
					<input class=Insert_E_input type="text" name="Direccion" placeholder="Ingrese Direccion..." required>
					<input class=Insert_E_input type="text" name="Ciudad" placeholder="Ingrese Ciudad..." required>
					<input class=Insert_E_input type="text" name="Provincia" placeholder="Ingrese Provincia..." required>
				</div>
				<div id=Insert_B_E>
					<input class=loginbott type="reset" value="Limpiar"> <input class=loginbott type="submit" value="Entrar">
				</div>
			</form>
		</div>
    <?php
    if(isset($_REQUEST['Nombre'])&&isset($_REQUEST['Telefono'])&&isset($_REQUEST['Direccion'])&&isset($_REQUEST['Ciudad'])&&isset($_REQUEST['Provincia'])){
      $insertar_editorial=$obj_editorial->insertar_editorial($_REQUEST['Nombre'],$_REQUEST['Telefono'],$_REQUEST['Direccion'],$_REQUEST['Ciudad'],$_REQUEST['Provincia']);
      foreach ($insertar_editorial as $array_resp) {
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

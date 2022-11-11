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
<title>Update_Editorial</title>
<link rel="stylesheet"  href="css/style.css" type="text/css">
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
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
		<div id=Update_A>
		<h2>Actualizacion Datos Editorial</h2>
			<form action="Update_Editorial.php" method="post">
				<div id=Update_T_A>
					<p>Id Editorial</p>
					<p>Valor</p>
				</div>
				<div id=Update_A_Radio>
				<select name="Selection" size="1">
					<option value=Nombre_Editorial>Nombre
					<option value=Telefono>Telefono
					<option value=Direccion>Direccion
					<option value=Ciudad>Ciudad
					<option value=Provincia>Provincia
				</select>
				</div>
				<div id=Update_I_A>
					<input class=Update_A_input type="number" name="Id_Editorial" placeholder="Ingrese Id Editorial..." required>
					<input id=Update_A_input_chang type="text" name="Valor" placeholder="Ingrese Valor..." required>
				</div>
				<div id=Update_B_A>
					<input class=loginbott type="reset" value="Limpiar"> <input class=loginbott type="submit" value="Entrar">
				</div>
			</form>
		</div>
    <?php
    if(isset($_REQUEST['Selection'])&&isset($_REQUEST['Id_Editorial'])&&isset($_REQUEST['Valor'])){
      $actualizar_editorial=$obj_editorial->actualizar_editorial($_REQUEST['Selection'],$_REQUEST['Id_Editorial'],$_REQUEST['Valor']);
      foreach ($actualizar_editorial as $array_resp) {
        foreach ($array_resp as $value) {
          $nfilas = $value;
        }
      }
      if($nfilas > 0){
     ?>
      <script type="text/javascript">alert('Actualizacion Efectuada Exitosamente');</script>
      <?php
        }else{
        ?>
      <script type="text/javascript">alert('No se ha Podido Realizar la actualizacion');</script>
  <?php
      }
    }
   ?>
</body>
<?php
include("Footer.php")
?>
</html>
<?php
}
 ?>

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
<title>Update_Autor</title>
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
		<div id=Update_A>
		<h1>Actualizacion Datos Autor</h1>
			<form action="Update_Autor.php" method="post">
				<div id=Update_T_A>
					<p>Id Autor</p>
					<p>Valor</p>
				</div>
				<div id=Update_A_Radio>
				<select name="Selection" size="1">
					<option value=Nombre>Nombre
					<option value=Apellido>Apellido
					<option value=Nacionalidad>Nacionalidad
				</select>
				</div>
				<div id=Update_I_A>
					<input class=Update_A_input type="number" name="id_autor" placeholder="Ingrese Id Autor..." required>
					<input class=Update_A_input type="text" name="Valor" placeholder="Ingrese Valor..." required>
				</div>
				<div id=Update_B_A>
					<input class=loginbott type="reset" value="Limpiar"> <input class=loginbott type="submit" value="Entrar">
				</div>
			</form>
		</div>
    <?php
    if(isset($_REQUEST['Selection'])&&isset($_REQUEST['id_autor'])&&isset($_REQUEST['Valor'])){
      $actualizar_autor=$obj_autor->actualizar_autor($_REQUEST['Selection'],$_REQUEST['id_autor'],$_REQUEST['Valor']);
      foreach ($actualizar_autor as $array_resp) {
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

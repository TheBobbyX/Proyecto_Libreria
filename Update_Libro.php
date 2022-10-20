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
<title>Update_Libro</title>
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
  require_once("class/libro.php");
  $obj_libro= new libro();
   ?>
		<div id=Update_A>
		<h1>Actualizacion Datos Libro</h1>
			<form action="Update_Libro.php" method="post">
				<div id=Update_T_A>
					<p>ISBN</p>
					<p>Valor</p>
				</div>
				<div id=Update_A_Radio>
				<select name="Selection" size="1">
					<option value=Titulo>Titulo
					<option value=N_Edicion>N° Edicion
					<option value=Copyright>Copyright
					<option value=N_Pag>N° Pag
					<option value=N_Estanteria>N° Estanteria
					<option value=N_Ejemplares>N° Ejemplares
					<option value=Precio>Precio
					<option value=Id_Editorial>Id Editorial
          <option value=Id_Autor>Id Autor
				</select>
				</div>
				<div id=Update_I_A>
					<input class=Update_A_input type="number" name="ISBN" placeholder="Ingrese ISBN..." required>
					<input id=Update_A_input_chang type="text" name="Valor" placeholder="Ingrese Valor..." required>
				</div>
				<div id=Update_B_A>
					<input class=loginbott type="reset" value="Limpiar"> <input class=loginbott type="submit" value="Entrar">
				</div>
			</form>
		</div>
    <?php
    if(isset($_REQUEST['Selection'])&&isset($_REQUEST['ISBN'])&&isset($_REQUEST['Valor'])){
      if($_REQUEST['Selection']=="Copyright"){
        $actualizar_libro=$obj_libro->actualizar_libro($_REQUEST['Selection'],$_REQUEST['ISBN'],date_format(date_create($_REQUEST['Valor'])));
      }else{
        $actualizar_libro=$obj_libro->actualizar_libro($_REQUEST['Selection'],$_REQUEST['ISBN'],$_REQUEST['Valor']);
      }
      foreach ($actualizar_libro as $array_resp) {
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

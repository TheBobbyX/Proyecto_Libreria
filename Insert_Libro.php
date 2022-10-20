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
<title>Insert_Libro</title>
<link rel="stylesheet"  href="css/style.css" type="text/css">
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
   <br>
		<div id=Insert_L>
		<h1>Inserción Datos Libro</h1>
			<form action="Insert_Libro.php" method="post">
				<div id=Insert_T_L>
					<p>Titulo</p>
					<p>N° Edición</p>
					<p>Copyright</p>
					<p>N° Pag</p>
					<p>N° Estanteria</p>
					<p>N° Ejemplares</p>
					<p>Precio</p>
					<p>Id de la Editorial</p>
          <p>Id del Autor</p>
				</div>
				<div id=Insert_I_L>
					<input class=Insert_L_input type="text" name="Titulo" placeholder="Ingrese Titulo..." required>
					<input class=Insert_L_input type="number" name="N_Edicion" placeholder="Ingrese N° Edición..." required>
					<input class=Insert_L_input type="date" name="Copyright" required >
					<input class=Insert_L_input type="number" name="N_Pag" placeholder="Ingrese N° Pag..." required>
					<input class=Insert_L_input type="number" name="N_Estanteria" placeholder="Ingrese N° Estanteria..." required>
					<input class=Insert_L_input type="number" name="N_Ejemplares" placeholder="Ingrese N° Ejemplares..." required>
					<input class=Insert_L_input type="number" name="Precio" placeholder="Ingrese Precio..." required step=".01">
					<input class=Insert_L_input type="number" name="Id_Editorial" placeholder="Ingrese Id de la Ed..." required>
          <input class=Insert_L_input type="number" name="Id_Autor" placeholder="Ingrese Id del Autor..." required>
				</div>
				<div id=Insert_B_L>
					<input class=loginbott type="reset" value="Limpiar"> <input class=loginbott type="submit" value="Entrar">
				</div>
			</form>
		</div>
    <?php
    if(isset($_REQUEST['Titulo'])&&isset($_REQUEST['N_Edicion'])&&isset($_REQUEST['Copyright'])&&
    isset($_REQUEST['N_Pag'])&&isset($_REQUEST['N_Estanteria'])&&isset($_REQUEST['N_Ejemplares'])&&
    isset($_REQUEST['Precio'])&&isset($_REQUEST['Id_Editorial'])&&isset($_REQUEST['Id_Autor'])){

      $insertar_libro=$obj_libro->insertar_libro($_REQUEST['Titulo'],$_REQUEST['N_Edicion'],date_format(date_create($_REQUEST['Copyright']),"Y-m-d"),
      $_REQUEST['N_Pag'],$_REQUEST['N_Estanteria'],$_REQUEST['N_Ejemplares'],$_REQUEST['Precio'],$_REQUEST['Id_Editorial'],$_REQUEST['Id_Autor']);
      foreach ($insertar_libro as $array_resp) {
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

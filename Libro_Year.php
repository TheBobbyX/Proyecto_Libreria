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
<title>Libro_Year</title>
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
		require_once("class/libro.php");
		$obj_libro= new libro();
		if(!isset($_REQUEST['año'])){
	 ?>
		<div id=lanno>
		<h1>AÑO</h1>
		<form id=loginform action="Libro_Year.php" method="post">
				<input class=logininput type="number" name="año" placeholder="Ingrese Año..." required> <br>
				<input class=loginbott type="reset" value="Limpiar"> <input class=loginbott type="submit" value="Entrar">
		</form>
		</div><br>
	  <section>
    <?php
    }else{
      $año=$_REQUEST['año'];
      $validar_libro_año=$obj_libro->verificar_libro_año($año);

      foreach ($validar_libro_año as $array_resp) {
        foreach ($array_resp as $value) {
          $nfilas = $value;
        }
      }
     if($nfilas > 0){
      ?>
  			<h1 align="center">EJEMPLARES EDITADOS EN EL AÑO SELECCIONADO</h1><br>
  			<table id="tautoresc1">
          <thead>
            <tr>
    					<th>TÍTULO</th>
    					<th>EJEMPLARES</th>
    				</tr>
          </thead>
          <tbody>
            <?php
              $obj_libro_año= new libro();
              $listar_libro_año=$obj_libro_año->listar_libro_año($año);
              foreach ($listar_libro_año as $libros_año) {
                print("<tr>\n");
                print("<td>". $libros_año["Titulo"] ."</td>\n");
                print("<td>". $libros_año["Numeros de Ejemplares"] ."</td>\n");
                print("</tr>\n");
              }
            ?>
          </tbody>
			</table>
      <?php
      }else{
        header("Location: Libro_Year.php");
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

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
<title>Libro_Edit PMA</title>
<link rel="stylesheet"  href="css/style.css" type="text/css">
</head>
<body>
<header>
		<img src="imagenes/libreria.jpg" alt="Logo de Libreria">
	</header>
  <?php
  include("Nav.php");
   ?>
   <br>
  <?php
    require_once("class/libro.php");
    $obj_libro= new libro();
   ?>
		<h1 align="center">LIBROS EDITADOS EN PANAMÁ</h1><br>
	<section>
		<table id="tcompleta">
      <thead>
        <tr>
          <th>ISBN</th>
          <th>TITULO</th>
          <th>N° EDICION</th>
          <th>PRECIO</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $listar_libros_nacionales=$obj_libro->listar_libros_nacionales();
          foreach ($listar_libros_nacionales as $libros_nacionales) {
						print("<tr>\n");
						print("<td>". $libros_nacionales["ISBN"] ."</td>\n");
						print("<td>". $libros_nacionales["Titulo"] ."</td>\n");
            print("<td>". $libros_nacionales["Edicion"] ."</td>\n");
            print("<td>". $libros_nacionales["Precio"] ."</td>\n");
						print("</tr>\n");
					}
         ?>
      </tbody>
		</table>
	</section>
</body>
<?php
include("Footer.php");
 ?>
</html>
<?php
}
 ?>

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
<title>Libro_ESt</title>
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
			<br><br>
			<h1 align="center">EJEMPLARES POR ESTANTERIA</h1><br>
      <section>
			<table id="tautoresc1">
				<tr>
					<th>ESTANTERIA</th>
					<th>TOTAL DE LIBROS</th>
				</tr>
        <?php
        $listar_libro_estanteria=$obj_libro->listar_libro_estanteria();
        foreach ($listar_libro_estanteria as $libros_estanteria) {
          print("<tr>\n");
          print("<td>". $libros_estanteria["Estanteria"] ."</td>\n");
          print("<td>". $libros_estanteria["Total de Libros"] ."</td>\n");
          print("</tr>\n");
        }
         ?>
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

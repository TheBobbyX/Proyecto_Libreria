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
<title>Select_Libro</title>
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
		<h1 align="center">LISTA DE LIBROS</h1><br>
	<section>
		<table id="tcompletabig">
      <thead>
        <tr>
					<th>ISBN</th>
					<th>TITULO</th>
					<th>N° DE EDICIÓN</th>
					<th>COPYRIGHT</th>
          <th>N° DE PAGINAS</th>
          <th>N° DE ESTANTERIA</th>
          <th>N° DE EJEMPLARES</th>
          <th>PRECIO</th>
          <th>ID EDITORIAL</th>
          <th>ID AUTOR</th>
				</tr>
      </thead>
      <tbody>
        <?php
          $listar_libro=$obj_libro->listar_libros();
          foreach ($listar_libro as $libros) {
						print("<tr>\n");
						print("<td>". $libros["ISBN"] ."</td>\n");
						print("<td>". $libros["Titulo"] ."</td>\n");
            print("<td>". $libros["N_Edicion"] ."</td>\n");
            print("<td>". $libros["Copyright"] ."</td>\n");
            print("<td>". $libros["N_Pag"] ."</td>\n");
            print("<td>". $libros["N_Estanteria"] ."</td>\n");
            print("<td>". $libros["N_Ejemplares"] ."</td>\n");
            print("<td>". $libros["Precio"] ."</td>\n");
            print("<td>". $libros["Id_Editorial"] ."</td>\n");
            print("<td>". $libros["Id_Autor"] ."</td>\n");
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

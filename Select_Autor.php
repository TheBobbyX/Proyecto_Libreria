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
<title>Select_Autor</title>
<link rel="stylesheet"  href="css/style.css" type="text/css">
</head>
<body>
<header>
		<img src="imagenes/libreria.jpg" alt="Logo de Libreria">
	</header>
  <?php
    include("Nav.php");
    require_once("class/Autor.php");
    $obj_autor= new autor();
   ?>
		<br><br>
		<h1 align="center">LISTA DE AUTORES</h1><br>
	<section>
		<table id="tcompleta">
      <thead>
        <tr>
          <th>ID</th>
					<th>NOMBRE</th>
					<th>APELLIDO</th>
					<th>NACIONALIDAD</th>
				</tr>
      </thead>
				<tbody>
          <?php
            $lista_autores=$obj_autor->listar_autores();
            foreach ($lista_autores as $autores) {
              print("<tr>\n");
              print("<td>". $autores["Id_Autor"] ."</td>\n");
              print("<td>". $autores["Nombre"] ."</td>\n");
              print("<td>". $autores["Apellido"] ."</td>\n");
              print("<td>". $autores["Nacionalidad"] ."</td>\n");
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

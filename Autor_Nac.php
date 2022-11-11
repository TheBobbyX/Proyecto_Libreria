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
<title>Autor_Nac</title>
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
		require_once("class/autor.php");
		$obj_autor= new autor();
	 ?>
		<br><br>
		<h1 align="center">NÚMEROS DE AUTORES POR NACIONALIDAD</h1><br>
	<section>
		<table id="tautoresc1">
      <thead>
        <tr>
					<th>NACIONALIDAD</th>
					<th>CANTIDAD</th>
				</tr>
      </thead>
      <tbody>
        <?php
          $lista_autores_nacionalidad=$obj_autor->listar_autores_nacionalidad();
          foreach ($lista_autores_nacionalidad as $autores_nacionalidad) {
						print("<tr>\n");
						print("<td>". $autores_nacionalidad["NACIONALIDAD"] ."</td>\n");
						print("<td>". $autores_nacionalidad["CANTIDAD"] ."</td>\n");
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

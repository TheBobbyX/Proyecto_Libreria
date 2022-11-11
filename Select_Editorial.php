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
<title>Select_Editorial</title>
<link rel="stylesheet"  href="css/style.css" type="text/css">
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
		<br>
		<h1 align="center">LISTA DE EDITORIALES</h1><br>
	<section>
		<table id="tcompletabig2">
      <thead>
        <tr>
					<th>ID</th>
					<th>NOMBRE</th>
					<th>TELEFONO</th>
					<th>DIRECCION</th>
          <th>CIUDAD</th>
          <th>PROVINCIA</th>
				</tr>
      </thead>
			<tbody>
        <?php
          $listar_editoriales=$obj_editorial->listar_editoriales();
          foreach ($listar_editoriales as $editoriales) {
						print("<tr>\n");
						print("<td>". $editoriales["Id_Editorial"] ."</td>\n");
						print("<td>". $editoriales["Nombre_Editorial"] ."</td>\n");
            print("<td>". $editoriales["Telefono"] ."</td>\n");
            print("<td>". $editoriales["Direccion"] ."</td>\n");
            print("<td>". $editoriales["Ciudad"] ."</td>\n");
            print("<td>". $editoriales["Provincia"] ."</td>\n");
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

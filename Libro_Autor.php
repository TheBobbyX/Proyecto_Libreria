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
<title>Libro_Autor</title>
<link rel="stylesheet"  href="css/style.css" type="text/css">
</head>
<body>
	<header>
		<img src="imagenes/libreria.jpg" alt="Logo de Libreria">
	</header>
	<?php
    include("Nav.php");
		require_once("class/autor.php");
    require_once("class/libro.php");
		$obj_autor= new autor();
		if(!isset($_REQUEST['id_autor'])){
	 ?>
		<div id=autordiv>
		<h1>Autor</h1>
		<form id=loginform action="Libro_Autor.php" method="post">
				<input class=logininput type="number" name="id_autor" placeholder="Ingrese Id Autor..." required> <br>
				<input class=loginbott type="reset" value="Limpiar"> <input class=loginbott type="submit" value="Entrar">
		</form>
		</div><br>
	<section>
		<table id=tautorescompleta>
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
					foreach ($lista_autores as $autores_atributos) {
						print("<tr>\n");
						print("<td>". $autores_atributos["Id_Autor"] ."</td>\n");
						print("<td>". $autores_atributos["Nombre"] ."</td>\n");
						print("<td>". $autores_atributos["Apellido"] ."</td>\n");
						print("<td>". $autores_atributos["Nacionalidad"] ."</td>\n");
						print("</tr>\n");
					}
				 ?>
			</tbody>
			</table>
		<?php
			}else{
				$id_autor=$_REQUEST['id_autor'];
				$validar_autor=$obj_autor->verificar_autor($id_autor);

	      foreach ($validar_autor as $array_resp) {
	        foreach ($array_resp as $value) {
	          $nfilas = $value;
	        }
	      }
			 if($nfilas > 0){
		?>
			<br><br><br>
      <h1 align="center">LIBROS DEL AUTOR SELECICONADO</h1><br>
			<table id="tcompletabig2">
        <thead>
				<tr>
					<th>TÍTULO</th>
					<th>ISBN</th>
          <th>N° DE EDICIÓN</th>
          <th>N° DE ESTANTERIA</th>
          <th>EDITORIAL</th>
					<th>PRECIO</th>
				</tr>
      </thead>
      <tbody>
				<?php
					$obj_libros_autor= new libro();
					$libros_autor=$obj_libros_autor->listar_libros_autor($id_autor);
					foreach ($libros_autor as $libros_atributos){
						print("<tr>\n");
						print("<td>". $libros_atributos["Titulo"] ."</td>\n");
						print("<td>". $libros_atributos["ISBN"] ."</td>\n");
            print("<td>". $libros_atributos["N_Edicion"] ."</td>\n");
            print("<td>". $libros_atributos["N_Estanteria"] ."</td>\n");
            print("<td>". $libros_atributos["Nombre_Editorial"] ."</td>\n");
						print("<td>". $libros_atributos["Precio"] ."</td>\n");
						print("</tr>\n");
					}
        ?>
        </tbody>
			</table>
      <?php
      }else{
        header("Location: Libro_Autor.php");
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

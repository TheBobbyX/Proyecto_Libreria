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
<title>Inicio</title>
<link rel="stylesheet"  href="css/style.css" type="text/css">
</head>
<body>
	<header>
		<img src="imagenes/libreria.jpg" alt="Logo de Libreria">
	</header>
  <?php
  include("Nav.php");
   ?>
	<br><br>
	<section id=PInicio>
	<h2>Origen</h2>
	<br>
	<p>
	El libro es entendido hoy en día como  negro sobre blanco en papel encuadernado, pero no siempre fue así.
	El primer soporte de escritura conocido es la piedra, posteriormente la arcilla, la madera, papiro (Egipto),
	seda (China), hueso, bronce, cerámica, escamas, palma seca (India), papel, soportes electrónicos, piel humana (tatuajes), etc.
	Etimológicamente, las palabras biblos y liber tienen, como primera definición, corteza interior de un árbol. En chino el ideograma del libro son las imágenes en tablas de bambú.
	Las tablillas encontradas en Mesopotamia en el 3.000 a.C. <br><br>
	fueron antecesoras del cálamo, un instrumento en forma de triángulo que servía para imprimir los caracteres en la arcilla antes de ser cocida.
	A esta escritura le siguió la cuneiforme, utilizada por asirios y sumerios, que cocían las tablillas para solidificarlas.
	En Nínive fueron encontradas 22.000 tablillas del siglo VII a. C., era la biblioteca de los reyes de Asiria que disponían de talleres de copistas y lugares idóneos para su conservación. Esto supone que había una organización en torno al libro, un estudio sobre su conservación, clasificación, etc.
	</p>
	</section>
</body>
<?php
include("Footer.php")
?>
</html>
<?php
}
 ?>

<?php
include('db.php');
if ($bd->connect_error) {
 die("Fallo en la conexión: " . $bd->connect_error);
};
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
</head>
<body>
<div class="from">
	<div> 
		<?php
		$cont="SELECT * FROM registro";
		$result=mysqli_query($bd,$cont) or die ("Problemas".mysqli_error());
		?>
		<table>
			
		<?php
		$i=1;
		while ($fila = mysqli_fetch_array($result)){
		ECHO "<tr>";
		$f=$fila["id"];
        ECHO " <TD>".$i."</TD>";
        ECHO " <TD>".ucwords($fila["Nombre"])."</TD>";
		ECHO " <TD>".ucwords($fila["Apellido"])."</TD>";
		ECHO " <TD>".$fila["Edad"]."</TD>";
        ECHO " <TD>".ucwords($fila["Pais"])."</TD>";
        ECHO " <TD>".ucwords($fila["Especialidad"])."</TD>";
        echo "<TD><a href='opcion.php/?id=$f &valor=0'><img src='https://ayudawp.com/wp-content/uploads/2018/09/borrar-imagenes-sin-usar-en-wordpress.png' width='50px'></a></TD>";
        echo "<TD><a href='opcion.php/?id=$f &valor=1'><img src='IMG/pngwing.png' width='50px'></a></TD>";
  		ECHO"</tr>";
  		$i=$i+1;
		}
		?>
		</table>
	</div>

</div>
</body>
</html>


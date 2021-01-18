<?php
include('db.php');
if ($bd->connect_error) {
 die("Fallo en la conexión: " . $bd->connect_error);
};
$d = $_GET["valor"];
$id = $_GET["id"];
if ($d==2) {
	$n=$_GET["nombre"];
	$a=$_GET["apellido"];
	$e=$_GET["edad"];
	$p=$_GET["pais"];
	$es=$_GET["espec"];

	$const="UPDATE `registro` SET `Nombre`='$n',`Apellido`='$a',`Edad`='$e',`Pais`='$p',`Especialidad`='$es' WHERE id = $id";
	$result=mysqli_query($bd,$const) or die ("Problemas".mysqli_error());
	header("Location: ../Registro.php");

}elseif ($d==0) {
	$const="DELETE FROM `registro` WHERE id = $id";
	$result=mysqli_query($bd,$const) or die ("Problemas".mysqli_error());
	header("Location: ../Registro.php");
} elseif ($d==1) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
</head>
<body>
	<?php
	$const="SELECT * FROM registro WHERE id = $id";
	$result=mysqli_query($bd,$const) or die ("Problemas".mysqli_error());	
	while($row = $result->fetch_assoc())
        {
	?>
   <form action="opcion.php" method="GET">
   <h1 class="animate__animated animate__backInLeft">Sistema de Actualizacion</h1>
   <p>Nombre <input type="text"  name="nombre"	value="<?php echo ucwords($row['Nombre']);?>"></p>
   <p>Apellido <input type="text" name="apellido"	value="<?php echo ucwords( $row['Apellido']);?>"></p>
   <p>Edad <input type="number"  name="edad"	value="<?php echo $row['Edad'];?>"></p>
   <p>Pais <input type="text" name="pais"	value="<?php echo ucwords($row['Pais']);?>"></p>
   <p>Especialidad <input type="text"  name="espec"	value="<?php echo ucwords($row['Especialidad']);?>"></p>
   <input type="hidden" name="valor" value="2">
   <input type="hidden" name="id" value="<?php echo $id; ?>">
   <input type="submit" name="submit" value="Guardar Cambios">
   
   </form> 
   <?php
	}

   ?>
</body>
</html>
<?php	
}

?>
<?php
include('db.php');

if (isset($_POST["submit"])) {

  $u =$_POST['usuario'] ;
  $c =$_POST['contraseña'] ;
  $sql ="INSERT INTO login(usuario, contraseña) VALUES ('".$u."','".md5($c)."')";
  $result = mysqli_query($bd,$sql);

  if (!$result) {
      die("Fallo en añadir registro: ".mysqli_error());
  }

  /*try {
    
    
    $stmt = $bd->prepare("INSERT INTO login(usuario, contraseña) VALUES (:user,:contr)");

    $stmt->bindParam(':user',$u);
    $stmt->bindParam(':contr',$c);

    $stmt->execute(); 
    header("Location: ../index.php");
  } catch (PDOException $e) {
      echo $e->getMessage();
  };*/
};
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
</head>
<body>
   <form action="RegistroU.php" method="POST">
   <h1 class="animate__animated animate__backInLeft">Registrar Usuario</h1>
   <p>Usuario <input type="text" placeholder="coloque su nombre de Usuario" name="usuario"></p>
   <p>Contraseña <input type="password" placeholder="coloque su contraseña" name="contraseña"></p>
   <input type="submit" name="submit" value="Ingresar">
   
   </form> 
</body>
</html>
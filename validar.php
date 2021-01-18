<?php
//$user=$_POST['usuario'];

if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"]=="POST") {

    include('db.php');
    if (!isset($_SESSION)) {
        session_start();
    }

    $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : null;
    $password = isset($_POST['contraseña']) ? trim($_POST['contraseña']) : null;
        $cont="SELECT * FROM login WHERE usuario = '".$usuario."' LIMIT 1";

        $result=mysqli_query($bd,$cont) or die ("Problemas".mysqli_error());
        $rows = $result->num_rows;
        if ($rows > 0) {
               while ($fila = mysqli_fetch_array($result)){
               $contr=$fila["contraseña"];
            }
    
            if ($contr == md5($password)) {
                echo "hola";
                    HEADER("Location: azul.php");
            }else{
                HEADER("Location: rojo.php");
            }
        } else {
            HEADER("Location: rojo.php");
        }
        
        
/*
    $cons="SELECT * FROM login where (usuario = :usuario)";
    $stmt = $bd->prepare($cons);
    $stmt->bindParam(":usuario", $usuario);
    $stmt->execute(); 

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $isVerified = password_verify($password, $user['contraseña']);
        if ($isVerified) {
            $_SESSION['login'] = $user;
            header("Location: Azul.php");
            exit();
        } else {
            $_SESSION['status_error'] = "Incorrect Credentials";
            header("Location: rojo.php");
        }
    } else {
        $_SESSION['status_error'] = "Incorrect Credentials";
        header("Location: rojo.php");
    }*/
}
?>
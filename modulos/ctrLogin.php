<?php
session_start();
require_once "conexion.php";

if (isset($_POST['username'])) {

    $usuario = $_POST['username'];
    $password = $_POST['password'];

    $statement = Conexion::conectar()->prepare('SELECT * FROM usuarios WHERE usuario = :user AND pass = :pass');
    $statement->execute(array(':user' => $usuario, ':pass' => $password));

    $res = $statement->fetch();

    if ($res != false) {
        $statement = Conexion::conectar()->prepare('SELECT * FROM usuarios WHERE usuario = :user AND pass = :pass');
        $statement->execute(array(':user' => $usuario, ':pass' => $password));

        while ($fila = $statement->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['nombre'] = $fila["nombre"];
            $_SESSION['usuario'] = $fila["usuario"];
            $_SESSION['estado'] = $fila["estado"];
            $_SESSION['id'] = $fila["id"];
        }
        $_SESSION['iniciarSesion'] = "ok";

        echo '<script> window.location = "../inicio"; </script>';
    }else{
        echo '<script> window.location = "/error"; </script>';
    }
}else{
    echo "error";
}
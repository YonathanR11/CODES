<?php
session_start();
require_once "modulos/conexion.php";

if (isset($_POST['titulo'])) {

    $stmt = Conexion::conectar()->prepare("INSERT INTO codigos (titulo, descripcion, codigo, lenguaje, estado, creacion, usuarios_id) 
        VALUES (:titulo, :descripcion, :codigo, :lenguaje, :estado, :creacion, :usuarios_id)");

    $estado = 1;
    $creacion = date("y") . "-" . date("m") . "-" . date("d");;
    $id = $_SESSION['id'];
    $stmt->bindParam(":titulo", $_POST['titulo'], PDO::PARAM_STR);
    $stmt->bindParam(":descripcion", $_POST['descripcion'], PDO::PARAM_STR);
    $stmt->bindParam(":codigo", $_POST['codigo'], PDO::PARAM_STR);
    $stmt->bindParam(":lenguaje", $_POST['lenguaje'], PDO::PARAM_STR);
    $stmt->bindParam(":estado", $estado, PDO::PARAM_INT);
    $stmt->bindParam(":creacion", $creacion, PDO::PARAM_STR);
    $stmt->bindParam(":usuarios_id", $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo '<script> window.location = "../'.$_POST['lenguaje'].'"; </script>';
    } else {
        echo "ERROR: ".$_SESSION['nombre']." - ".print_r($stmt->errorInfo()). " <br><br><hr><h1>¡Error! :(</h1>";
    }
    $stmt = null;
}else{
    echo'<script type="text/javascript">
        alert("Ocurrio un error");
        javascript:window.history.back();
        location.reload();
        </script>';
}
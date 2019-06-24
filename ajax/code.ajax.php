<?php
include "../modulos/conexion.php";
$idcodeEdit;
$idcodeEditNew;
$CodeNew;
$idcodeDelete;

if (isset($_POST["idcodeEdit"])) {
    $editar = new AjaxCode();
    $editar->idcodeEdit = $_POST["idcodeEdit"];
    $editar->MostrarCode();
}

if (isset($_POST["idcodeEditSave"])) {
    $editar = new AjaxCode();
    $editar->idcodeEditNew = $_POST["idcodeEditSave"];
    $editar->CodeNew = $_POST["codigoEditOK"];
    $editar->EditarCode();
}

if (isset($_POST["idcodeDelete"])) {
    $editar = new AjaxCode();
    $editar->idcodeDelete = $_POST["idcodeDelete"];
    $editar->EliminarCode();
}

class AjaxCode
{
    public function MostrarCode()
    {
        $valor = $this->idcodeEdit;
        $tabla = "codigos";
        $item = "id";
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch();
        echo json_encode($res);
    }

    public function EditarCode()
    {
        $id = $this->idcodeEditNew;
        $code = $this->CodeNew;
        $tabla = "codigos";
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo= :titulo, descripcion= :descripcion, codigo= :codigo, lenguaje= :lenguaje WHERE  id= :id");
        $stmt->bindParam(":titulo", $_POST['tituloEditOK'], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $_POST['descripEditOK'], PDO::PARAM_STR);
        $stmt->bindParam(":codigo", $code, PDO::PARAM_STR);
        $stmt->bindParam(":lenguaje", $_POST['lenguEditOK'], PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo true;
        } else {
            echo false;

        }
    }

    public function EliminarCode()
    {
        $valor = $this->idcodeDelete;
        $tabla = "codigos";
        $item = "id";
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch();
        // echo json_encode($res);
        echo true;
    }
}

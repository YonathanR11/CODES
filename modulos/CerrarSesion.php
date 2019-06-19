<?php

$_SESSION["iniciarSesion"] = "";
$_SESSION["nombre"] = "";
$_SESSION["usuario"] = "";
$_SESSION["estado"] = "";

session_destroy();
$_SESSION = array();

echo '<script> window.location = "/"; </script>';
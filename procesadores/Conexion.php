<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "vidrerialagos";

$conexion = new mysqli($server, $user, $pass, $db);

if ($conexion->connect_errno) {
    die("Conexion Fallida" . $conexion->connect_errno);
}

$conexion->set_charset("utf8mb4");

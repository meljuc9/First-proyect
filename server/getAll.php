<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
$conexion = include_once "conexion.php";
$sentencia = $conexion->query("select id, name, age, date, email, pwd from personas");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($personas);
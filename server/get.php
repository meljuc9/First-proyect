<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if (empty($_GET["idPersona"])) {
    exit("No hay id de persona");
}
$idPersona = $_GET["idPersona"];
$conexion = include_once "conexion.php";
$sentencia = $conexion->prepare("select id, name, age, date, email,'pwd' from personas where id = ?");
$sentencia->execute([$idPersona]);
$persona = $sentencia->fetchObject();
echo json_encode($persona);

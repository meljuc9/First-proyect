<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: DELETE");
$metodo = $_SERVER["REQUEST_METHOD"];
if ($metodo != "DELETE" && $metodo != "OPTIONS") {
    exit("Sólo se permite método DELETE");
}

if (empty($_GET["idPersona"])) {
    exit("No hay id de persona para eliminar");
}
$idPersona = $_GET["idPersona"];
$conexion = include_once "conexion.php";
$sentencia = $conexion->prepare("DELETE FROM personas WHERE id = ?");
$resultado = $sentencia->execute([$idPersona]);
echo json_encode($resultado);

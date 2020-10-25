<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: *");
if ($_SERVER["REQUEST_METHOD"] != "PUT") {
    exit("Solo acepto peticiones PUT");
}
$jsonPersona = json_decode(file_get_contents("php://input"));
if (!$jsonPersona) {
    exit("No hay datos");
}
$conexion = include_once "conexion.php";
$sentencia = $conexion->prepare("UPDATE personas SET name = ?, age = ?, date = ?, email = ?, pwd = ? WHERE id = ?");
$resultado = $sentencia->execute([$jsonPersona->name, $jsonPersona->age, $jsonPersona->date, $jsonPersona->email, $jsonPersona->pwd, $jsonPersona->id]);
echo json_encode($resultado);

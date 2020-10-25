<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
$jsonPersona = json_decode(file_get_contents("php://input"));
if (!$jsonPersona) {
    exit("No hay datos");
}
$conexion = include_once "conexion.php";
$sentencia = $conexion->prepare("insert into (name, age, date, email, pwd) values (?,?,?,?,?)");
$resultado = $sentencia->execute([$jsonPersona->name, $jsonPersona->age, $jsonPersona->date, $jsonPersona->email, $jsonPersona->pwd]);
echo json_encode([
    "resultado" => $resultado,
]);

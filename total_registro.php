<?php

header('Content-Type: application/json');

$host = "localhost";
$user = "root"; 
$password = ""; 
$database = "db_feria";

$conexion = new mysqli($host, $user, $password, $database);

if ($conexion->connect_error) {
    die(json_encode(['error' => 'Fallo en la conexión a la base de datos.']));
}

// Contar el número de registros
$sql = "SELECT COUNT(*) AS total FROM usuarios";
$resultado = $conexion->query($sql);

if ($resultado) {
    $fila = $resultado->fetch_assoc();
    echo json_encode(['registros' => (int)$fila['total']]);
} else {
    echo json_encode(['error' => 'Error al ejecutar la consulta.']);
}

$conexion->close();
?>

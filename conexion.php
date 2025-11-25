<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "superman_rise";

$conn = new mysqli($host, $user, $pass, $db);

// Si hay error de conexión, devolvemos JSON y terminamos
if ($conn->connect_error) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        "status" => "error",
        "msg" => "Error de conexión: " . $conn->connect_error
    ]);
    exit;
}

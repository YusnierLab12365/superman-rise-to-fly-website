<?php
// Evitar cualquier salida antes del JSON
ob_start();
session_start();

require "conexion.php";

header('Content-Type: application/json; charset=utf-8');

// Validar método POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["status" => "error", "msg" => "Método no permitido"]);
    exit;
}

// Capturar datos
$correo = $_POST["correo"] ?? "";
$password = $_POST["password"] ?? "";

if (empty($correo) || empty($password)) {
    echo json_encode(["status" => "error", "msg" => "Faltan datos"]);
    exit;
}

// Buscar usuario
$stmt = $conn->prepare("SELECT id, nombre, correo, contrasena FROM usuarios WHERE correo = ?");
if (!$stmt) {
    echo json_encode(["status" => "error", "msg" => "Error en la consulta"]);
    exit;
}

$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["status" => "error", "msg" => "El correo no está registrado"]);
    exit;
}

$user = $result->fetch_assoc();

// Verificar contraseña
if (!password_verify($password, $user["contrasena"])) {
    echo json_encode(["status" => "error", "msg" => "Contraseña incorrecta"]);
    exit;
}

// Crear sesión
$_SESSION["usuario_id"] = $user["id"];
$_SESSION["usuario_nombre"] = $user["nombre"];
$_SESSION["usuario_correo"] = $user["correo"];

// Respuesta JSON exitosa
echo json_encode(["status" => "success", "msg" => "Inicio de sesión exitoso"]);
exit;

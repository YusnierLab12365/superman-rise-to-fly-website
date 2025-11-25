<?php
require "conexion.php"; // Asegúrate que esto exista y $conn esté bien definido

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["status" => "error", "msg" => "Método no permitido"]);
    exit;
}

// Capturar datos
$nombre = $_POST["nombre"] ?? "";
$correo = $_POST["correo"] ?? "";
$password = $_POST["password"] ?? "";

if (empty($nombre) || empty($correo) || empty($password)) {
    echo json_encode(["status" => "error", "msg" => "Faltan datos"]);
    exit;
}

// Hashear la contraseña
$hash = password_hash($password, PASSWORD_DEFAULT);

// Revisar si el correo ya existe
$stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["status" => "error", "msg" => "El correo ya está registrado"]);
    exit;
}

// Insertar usuario
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $correo, $hash);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "msg" => "Usuario registrado correctamente"]);
} else {
    echo json_encode(["status" => "error", "msg" => "Error al registrar usuario"]);
}
exit;
?>

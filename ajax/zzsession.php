<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados por AJAX
    $zona = isset($_POST['zona']) ? $_POST['zona'] : null;
    $ruta = isset($_POST['ruta']) ? $_POST['ruta'] : null;

    // Actualizar las variables de sesión
    $_SESSION['zona_U'] = $zona;
    $_SESSION['ruta_U'] = $ruta;

    // Responder a la solicitud AJAX
    echo json_encode(['status' => 'success', 'message' => 'Variables de sesión actualizadas']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método de solicitud no permitido']);
}
?>

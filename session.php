<?php
session_start();
print_r($_SESSION);
if (session_status() == PHP_SESSION_NONE) {
    // Configurar la sesión si no está activa
    session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

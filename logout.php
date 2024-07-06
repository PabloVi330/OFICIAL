<?php
session_start();

// Destruye todas las variables de sesión.
session_destroy();

// Agregar encabezados para evitar el almacenamiento en caché.
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Redirige al usuario a la página de inicio o a donde desees después del cierre de sesión.
echo '<script>window.location.href = "./index.php";</script>';


?>

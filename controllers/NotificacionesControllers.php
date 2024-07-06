<?php
require_once('models/NotificationModel.php');

class MaquinasController {
    // Otras funciones del controlador...

    public static function eliminarMaquina($idMaquina) {
        // Lógica para eliminar la máquina
        // ...

        // Envía una notificación de eliminación
        $mensajeNotificacion = "Máquina eliminada: $idMaquina";
        NotificationModel::enviarNotificacion($mensajeNotificacion);
    }

    // Otras funciones del controlador...
}
?>

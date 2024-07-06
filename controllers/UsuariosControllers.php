<?php
include_once '../models/UsuariosModels.php';

class UsuarioController
{

    private $usuario;

    public function __construct()
    {

        $this->usuario = new UsuarioModel();
    }


    public function crearUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
           

            $data = $_POST;
            // Procesar imágenes si se han enviado  5453129748
            if (!empty($_FILES['imagenes']['name'][0])) {
                $uploadDir = 'uploads/users/';
                $uploadedImages = '';
                foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
                    $imageName = basename($_FILES['imagenes']['name'][$key]);
                    $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                    $nombre = $data['nombre']; // Cambia 'codigoP' por la clave correcta en $_POST
                    // Construir un nuevo nombre de imagen usando el código del producto
                    $newImageName = $nombre .'.' . $imageExtension;
                    $targetPath = $uploadDir . $newImageName;
                    
                    if (move_uploaded_file($tmp_name, $targetPath)) {
                        $uploadedImages = $newImageName; // Almacenar el nuevo nombre de la imagen
                    } else {
                        echo "Error al mover la imagen $imageName";
                    }
                }
                if (!empty($uploadedImages)) { 
                    echo "Imágenes recibidas: ";
                } else {
                    echo "No se recibieron imágenes";
                }
            } else {
                $uploadedImages = "usuario.jpg";
            }
            $img = $uploadedImages;
            $data['estado'] = 1;
            $data['foto']  = $img;

            $response = $this->usuario->crearUsuario($data);
            echo json_encode($response);
        }
    }


    public function obtenerUsuarios()
    {
        $response = $this->usuario->obtenerUsuarios();
        echo json_encode($response);
    }

    public function obtenerUsuariosPorSucursal()
    {
        $response = $this->usuario->obtenerUsuariosPorSucursal();
        echo json_encode($response);
    }

    // Obtener un usuario por ID en formato JSON
    public function obtenerUsuarioPorID()
    {

        $result = $this->usuario->obtenerUsuarioPorID($_POST['id_usuario']);
        echo json_encode($result);
    }

    // Actualizar un usuario
    public function editarUsuario()
    {
       // echo '<pre>';print_r($_FILES); echo '</pre>';
        $data = $_POST;
        
        if (!empty($_FILES['Eimagenes']['name'][0])) {
            $directorioDestino = 'uploads/users/';
            $nombresImagenes = "";
            $imagenes = $_FILES['Eimagenes'];

            foreach ($imagenes['tmp_name'] as $key => $tmp_name) {
                $nombre = date('Y-m-d H:i:s');
                $nuevo_nombre = str_replace(":", ".", $nombre);
                $img = $nuevo_nombre.'.png';
                $rutaArchivo = $directorioDestino . $img;

                if (move_uploaded_file($tmp_name, $rutaArchivo)) {
                    $nombresImagenes = $img;
                } 
            }
            $data['Efoto']  = $nombresImagenes;
           
        } else {
            
        }
       
        $response = $this->usuario->editarUsuario($data); // Devuelve una respuesta JSON de éxito
        echo json_encode($response);
    }

    // Eliminar un usuario
    public function eliminarUsuario()
    {
        $response  = $this->usuario->eliminarUsuario($_POST);
        echo json_encode($response);
           
       
    }
}
$controller = new UsuarioController();
if (isset($_GET['action']) && $_GET['action'] == 'obtenerUsuarios') {
    $controller->obtenerUsuarios();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerUsuariosPorSucursal') {
    $controller->obtenerUsuariosPorSucursal();
}
if (isset($_GET['action']) && $_GET['action'] == 'crearUsuarios') {
    $controller->crearUsuario();
}
if (isset($_GET['action']) && $_GET['action'] == 'obtenerUsuarioPorId') {
    $controller->obtenerUsuarioPorID();
}
if (isset($_GET['action']) && $_GET['action'] == 'editarUsuario') {
    $controller->editarUsuario();
}
if (isset($_GET['action']) && $_GET['action'] == 'eliminarUsuario') {
    $controller->eliminarUsuario();
}

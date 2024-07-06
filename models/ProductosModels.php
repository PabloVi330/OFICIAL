<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'db_conection.php';
class ProductoModel
{
    private $conn;

    public function __construct()
    {
        // Reemplaza con el archivo que contiene la conexión a la base de datos
        $this->conn = DBConnection::getInstance();
    }
    //NOTE - METODOS FIJOS
    public function crearProducto($producto)
    {
        try {

            $sql = "INSERT INTO productos ( id_categoria, codigo, descripcion, imagen, stock, precio_compra, precio_venta)
                VALUES (:id_categoria, :codigo, :descripcion, :imagen, :stock, :precio_compra, :precio_venta)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_categoria', $producto['id_categoria']);
            $stmt->bindParam(':codigo', $producto['codigo']);
            $stmt->bindParam(':descripcion', $producto['descripcion']);
            $stmt->bindParam(':imagen', $producto['imagen']);
            $stmt->bindParam(':stock', $producto['stock']);
            $stmt->bindParam(':precio_compra', $producto['precio_compra']);
            $stmt->bindParam(':precio_venta', $producto['precio_venta']);
            $stmt->execute();

            // Obtener el ID del producto insertado
            $idProductoInsertado = $this->conn->lastInsertId();

            // Consulta SQL para obtener el registro completo
            $sql = "SELECT * FROM productos WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $idProductoInsertado);
            $stmt->execute();
            $productoInsertado = $stmt->fetch(PDO::FETCH_ASSOC);

            return $productoInsertado;
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }
    public function crearProductoEnvio($data, $cantidad_envio, $sucursal)
    {

        try {
            $codigo_A = $data['codigo_A'];
            $fk_id_sucursal = $sucursal;
            $fk_id_categoria = $data['fk_id_categoria'];
            $fk_id_usuario = $_SESSION['id_usuario'];
            $fk_id_marca = $data['fk_id_marca'];
            $descripcion_A = $data['descripcion_A'];
            $stock_A = $cantidad_envio;
            $cantidad_A = $data['cantidad_A'];
            $unimed_A = $data['unimed_A'];
            $precio_neto_A = $data['precio_neto_A'];
            $precio_distribucion_A = $data['precio_distribucion_A'];
            $precio_tecnico_A = $data['precio_tecnico_A'];
            $precio_publico_A = $data['precio_publico_A'];
            $precio_fact_A = $data['precio_fact_A'];
            $estado_A = 1;
            $imagenes_A = $data['imagenes'];


            $sql = "INSERT INTO Producto (codigo_A, fk_id_sucursal, fk_id_categoria, fk_id_usuario, descripcion_A, stock_A, cantidad_A, fk_id_marca, unimed_A, precio_neto_A, precio_distribucion_A, precio_tecnico_A, precio_publico_A, precio_fact_A, estado_A, imagenes_A)
                VALUES (:codigo_A, :fk_id_sucursal, :fk_id_categoria, :fk_id_usuario, :descripcion_A, :stock_A, :cantidad_A, :fk_id_marca, :unimed_A, :precio_neto_A, :precio_distribucion_A, :precio_tecnico_A, :precio_publico_A,  :precio_fact_A, :estado_A, :imagenes_A)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':codigo_A', $codigo_A);
            $stmt->bindParam(':fk_id_sucursal', $fk_id_sucursal);
            $stmt->bindParam(':fk_id_categoria', $fk_id_categoria);
            $stmt->bindParam(':fk_id_usuario', $fk_id_usuario);
            $stmt->bindParam(':descripcion_A', $descripcion_A);
            $stmt->bindParam(':stock_A', $stock_A);
            $stmt->bindParam(':cantidad_A', $cantidad_A);
            $stmt->bindParam(':fk_id_marca', $fk_id_marca);
            $stmt->bindParam(':unimed_A', $unimed_A);
            $stmt->bindParam(':precio_neto_A', $precio_neto_A);
            $stmt->bindParam(':precio_distribucion_A', $precio_distribucion_A);
            $stmt->bindParam(':precio_tecnico_A', $precio_tecnico_A);
            $stmt->bindParam(':precio_publico_A', $precio_publico_A);
            $stmt->bindParam(':precio_fact_A', $precio_fact_A);
            $stmt->bindParam(':estado_A', $estado_A);
            $stmt->bindParam(':imagenes_A', $imagenes_A);

            $stmt->execute();
            $this->conn = null;
            return "ok";
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }

    public function editarProducto($data)
    {
        try {
            // SQL para actualizar el producto
            $sql = "UPDATE productos 
                SET 
                    id_categoria = :id_categoria,
                    codigo = :codigo,
                    descripcion = :descripcion,
                    imagen = :imagen,  
                    stock = :stock,
                    precio_compra = :precio_compra,
                    precio_venta = :precio_venta
                WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id_categoria", $data['Eid_categoria']);
            $stmt->bindParam(":codigo", $data['Ecodigo']);
            $stmt->bindParam(":descripcion", $data['Edescripcion']);
            $stmt->bindParam(":imagen", $data['Eimagen']);
            $stmt->bindParam(":stock", $data['Estock']);
            $stmt->bindParam(":precio_compra", $data['Eprecio_compra']);
            $stmt->bindParam(":precio_venta", $data['Eprecio_venta']);
            $stmt->bindParam(":id", $data['Eid_producto']);;

            if ($stmt->execute()) {

                // SQL para seleccionar el producto actualizado
                $sql = "SELECT * FROM productos WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":id", $data['Eid_producto']);
                if ($stmt->execute()) {
                    $productoActualizado = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $productoActualizado;
                }
            }
        } catch (PDOException $e) {
            return "Error al actualizar el artículo: " . $e->getMessage();
        }
    }


    public function eliminarProducto($data)
    {
        try {
            $query = 'DELETE FROM productos WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id', $data['id_producto']);
            $stmt->execute();
            $this->conn = null;
            return "ok";
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }





    //SECTION - METODO DE EDITRA Producto AL HACER LA COMPRA
    public function editarProductoCompra($stock, $precioN, $codigo, $sucursal)
    {
        try {

            $sql = "UPDATE Producto 
                    SET 
                        stock_A = stock_A + '$stock',
                        precio_neto_A = '$precioN'
                    WHERE 
                        codigo_A = '$codigo' AND fk_id_sucursal = '$sucursal'";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            return "ok";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function editarProductoCompraPrecioVenta($precio_neto, $precio_distribucion, $precio_tecnico, $precio_publico, $codigo_A)
    {
        try {

            $sql = "UPDATE Producto 
                    SET 
                        precio_neto_A = '$precio_neto',
                        precio_distribucion_A = '$precio_distribucion',
                        precio_tecnico_A = '$precio_tecnico',
                        precio_publico_A = '$precio_publico'
                    WHERE 
                        codigo_A = '$codigo_A'";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            return "ok";
        } catch (PDOException $e) {
            return "Error al actualizar el artículo: " . $e->getMessage();
        }
    }


    //SECTION METODOS DE ENVIOS

    public function reducirStock($id_Producto, $cantidad)
    {

        try {
            $query = "UPDATE productos SET stock = stock - $cantidad WHERE id = $id_Producto";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();
            return "ok";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function reducirStockTraspaso($id_Producto, $cantidad, $codigo_A, $fk_id_sucursal)
    {

        try {
            $query = "UPDATE Producto SET stock_A = stock_A - $cantidad WHERE codigo_A = '$codigo_A' AND fk_id_sucursal = $fk_id_sucursal";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();
            return "ok";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function sumarStockAlEliminar($id_Producto, $cantidad)
    {

        try {
            $query = "UPDATE productos SET stock = stock + $cantidad WHERE id= $id_Producto";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();
            return "ok";
            
        } catch (PDOException $e) {
            return false;
        }
    }

    public function sumarStock($id_Producto, $cantidad)
    {

        try {
            $query = "UPDATE Producto SET stock_A = stock_A + $cantidad WHERE id_Producto = $id_Producto";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();
            return "ok";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function  buscarProductoEnSucursal($fk_id_sucursal, $codigo_A)
    {
        try {

            $query = "SELECT * FROM Producto WHERE fk_id_sucursal = $fk_id_sucursal AND codigo_A = '$codigo_A'";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();
            // Verificar si la consulta tuvo éxito
            if ($stmt->rowCount() > 0) {
                // La consulta devolvió resultados
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                // La consulta no devolvió resultados
                return "NO";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }






    //STUB - LLAMADAS DE ProductoS
    public function obtenerProductos()
    {
        try {

            $sql = "SELECT * FROM productos ORDER BY id DESC";
            $stmt = $this->conn->query($sql);
            $Productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $Productos;
        } catch (PDOException $e) {
            return 'Error en la llamda a los Productos' . $e->getMessage();
        }
    }

    public function obtenerProductosVentas()
    {
        try {

            $sql = "SELECT * FROM productos ORDER BY id DESC LIMIT 30";
            $stmt = $this->conn->query($sql);
            $Productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $Productos;
        } catch (PDOException $e) {
            return 'Error en la llamda a los Productos' . $e->getMessage();
        }
    }


    public function obtenerProductos1($codigo)
    {
        try {

            $sql = "SELECT 
                        a.*,
                        s.nombreS AS nombre_sucursal,
                        c.nombre_C AS nombre_categoria,
                        u.nombre_U AS nombre_usuario,
                        m.nombre_marca AS nombre_marca,
                        MAX(CASE WHEN a.fk_id_sucursal = 1 THEN stock_A END) AS stock_sucursal_1,
                        MAX(CASE WHEN a.fk_id_sucursal = 2 THEN stock_A END) AS stock_sucursal_2,
                         MAX(CASE WHEN a.fk_id_sucursal = 3 THEN stock_A END) AS stock_sucursal_3,
                          MAX(CASE WHEN a.fk_id_sucursal = 4 THEN stock_A END) AS stock_sucursal_4
                    FROM 
                        Producto AS a
                    LEFT JOIN 
                        sucursal AS s ON a.fk_id_sucursal = s.id_sucursal
                    LEFT JOIN 
                        categoria AS c ON a.fk_id_categoria = c.id_categoria
                    LEFT JOIN 
                        usuario AS u ON a.fk_id_usuario = u.id_usuario
                    LEFT JOIN 
                        marcas AS m ON a.fk_id_marca = m.id_marca
                        WHERE codigo_A = '$codigo'
                GROUP BY
            codigo_A";
            $stmt = $this->conn->query($sql);
            $Productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $Productos;
        } catch (PDOException $e) {
            return 'Error en la llamda a los Productos' . $e->getMessage();
        }
    }




    public  function obtenerProductoPorID($id)
    {
        try {
            $sql = "SELECT * FROM productos WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function obtenerProductoPorCategoria($id_categoria)
    {
        $sql = "SELECT * FROM Producto WHERE fk_id_categoria = :fk_id_categoria";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':fk_id_categoria', $id_categoria);
        $stmt->execute();
        $Producto = $stmt->fetch(PDO::FETCH_ASSOC);
        return $Producto;
    }

    public function obtenerProductoPorDescripcion($descripcion_A)
    {
        try {
            $suc = $_SESSION['fk_id_sucursal'];
            $sql = "SELECT * FROM Producto WHERE descripcion_A LIKE :descripcion_A AND fk_id_sucursal = :suc";
            $stmt = $this->conn->prepare($sql);

            // Utiliza bindValue para asignar los valores de los parámetros
            $stmt->bindValue(':descripcion_A', '%' . $descripcion_A . '%', PDO::PARAM_STR);
            $stmt->bindValue(':suc', $suc, PDO::PARAM_INT);

            $stmt->execute();

            $Producto = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $Producto;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function filtrarProductos($descripcion)
    {
        try {
            $query = "SELECT * FROM productos WHERE descripcion LIKE :descripcion ORDER BY id DESC";
            $stmt = $this->conn->prepare($query);
            $descripcion = '%' . $descripcion . '%';
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function productosPorCategoria()
    {
        try {
            $query = "SELECT c.id_categoria, c.nombre_C, COUNT(a.id_Producto) AS cantidad_productos
            FROM categoria c
            LEFT JOIN Producto a ON c.id_categoria = a.fk_id_categoria
            GROUP BY c.id_categoria, c.nombre_C
            ORDER BY cantidad_productos DESC;
            ";
            $statement = $this->conn->prepare($query);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejo de errores
            return "nos se optubo datos";
        }
    }
}

<?php
require_once('db_conection.php');


class EnvioModel
{

	private $conn;

	public function __construct()
	{
		$this->conn = DBConnection::getInstance();
	}


	public function crearEnvio($data)
	{
        $data['tipo_E'] = "SIN COSTO";
		try {
			$query = "INSERT INTO envios (fk_id_sucursal1, fk_id_sucursal, fk_id_usuario, responsable_E, detalle_E, tipo_E, total_E, impreso_E, estado_E) 
          VALUES (:fk_id_sucursal1, :fk_id_sucursal, :fk_id_usuario, :responsable_E, :detalle_E, :tipo_E, :total_E, :impreso_E, :estado_E)";


			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(":fk_id_sucursal1", $data['fk_id_sucursal1']);
			$stmt->bindParam(":fk_id_sucursal", $data['fk_id_sucursal']);
			$stmt->bindParam(":fk_id_usuario", $_SESSION['id_usuario']);
			$stmt->bindParam(":responsable_E", $data['responsable_E']);
			$stmt->bindParam(":detalle_E", $data['detalle_E']);
			$stmt->bindParam(":tipo_E", $data['tipo_E']);
			$stmt->bindParam(":total_E", $data['total_E']);
			$stmt->bindValue(":impreso_E", 0);
			$stmt->bindValue(":estado_E", "enviado");


			$stmt->execute();
				
		    return "ok";
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function recibirEnvio($id_envio)
	{
		try {
			$sql = "UPDATE envios SET estado_E = :estado_E WHERE id_envio = :id_envio AND  fk_id_usuario <> :id_usuario";
			$stmt = $this->conn->prepare($sql);
			$id_usuario = $_SESSION['id_usuario'];
			$estado_E = 1;
			$stmt->bindParam(':estado_E', $estado_E);
			$stmt->bindParam(':id_envio', $id_envio);
			$stmt->bindParam(':id_usuario', $id_usuario);

			if ($stmt->execute())
				return true;
			else
				return false;
		} catch (PDOException $e) {
			return "Error al recibir envío: " . $e->getMessage();
		}
	}

	public function imprimirEnvio($id_envio)
	{
		try {
			$sql = "UPDATE envios SET impreso_E = impreso_E + 1 WHERE id_envio = :id_envio";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id_envio', $id_envio);
			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			return "Error al incrementar el valor de impreso_E: " . $e->getMessage();
		}
	}

	public function obtenerEnvios()
	{

		if ($_SESSION['area_U'] == 'administrador' || $_SESSION['area_U'] == 'almacen') {
			try {
				$query = "SELECT 
                             e.*,
                             s1.nombreS AS sucursal_origen,
                             s2.nombreS AS sucursal_destino,
                             u.nombre_U AS nombre_usuario
                           FROM 
                             envios AS e
                           LEFT JOIN  
                             sucursal AS s1 ON e.fk_id_sucursal1 = s1.id_sucursal
                           LEFT JOIN  
                             sucursal AS s2 ON e.fk_id_sucursal = s2.id_sucursal
                           LEFT JOIN  
                             usuario AS u ON e.fk_id_usuario = u.id_usuario
                           ORDER BY e.id_envio DESC";
				$stmt = $this->conn->query($query);
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				return false;
			}
		} else {
			try {
				$query = "SELECT 
							 e.*,
							 s.nombreS AS nombre_sucursal,
							 u.nombre_U AS nombre_usuario
						   FROM 
							   envios AS e
						   LEFT JOIN  
							   sucursal AS s ON e.fk_id_sucursal = s.id_sucursal
						   LEFT JOIN  
							   usuario AS u ON e.fk_id_usuario = u.id_usuario
						   WHERE  e.fk_id_sucursal= " . $_SESSION['fk_id_sucursal'];
				$stmt = $this->conn->query($query);
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				return $e->getMessage();
			}
		}
	}
	// Obtener un usuario por ID
	public function obtenerEnviosPorID($id_envio)
	{
		try {
			$query = "SELECT 
                            e.*,
                            s.nombreS AS nombre_sucursal,
                            u.nombre_U AS nombre_usuario
                        FROM 
                            envios AS e
                        LEFT JOIN  
                            sucursal AS s ON e.fk_id_sucursal = s.id_sucursal
                        LEFT JOIN  
                            usuario AS u ON e.fk_id_usuario = u.id_usuario 
                        WHERE id_envio = :id_envio";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':id_envio', $id_envio);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			// Manejar el error de la base de datos
			return false;
		}
	}

	public function obtenerEnviosPorFiltro($columna, $valor)
	{
		try {
			$query = "SELECT *
			 FROM envios  
			 WHERE $columna = :$valor";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(":$valor", $valor);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			return 0;
		}
	}

	public function eliminarEnvio($id_envio)
	{
		$query = 'DELETE FROM envios WHERE id_envio = :id_envio';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id_envio', $id_envio);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}

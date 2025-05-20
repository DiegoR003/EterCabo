<?php

class Database {
    private $hostname = "localhost";
    private $database = "cocacola";
    private $usuario = "root";
    private $clave = "";
    private $charset = "utf8";

    public function conectar() {
        try {
            $conexion = "mysql:host=" . $this->hostname . ";dbname=" . $this->database . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conexion, $this->usuario, $this->clave, $options);

            return $pdo;
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
        
    }

    // Función para insertar un usuario
    public function insertarUsuario($nombre, $correo, $clave, $estado) {
        try {
            $pdo = $this->conectar();

            // Consulta SQL para insertar un usuario
            $sql = "INSERT INTO usuarios (nombre, correo, clave, estado) VALUES (:nombre, :correo, :clave, :estado)";
            $stmt = $pdo->prepare($sql);

            // Asignar parámetros
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->bindParam(':clave', $clave, PDO::PARAM_STR);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_INT);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                return true; // Inserción exitosa
            } else {
                return false; // Fallo en la inserción
            }
        } catch (PDOException $e) {
            echo "Error al insertar usuario: " . $e->getMessage();
            return false;
        }
    }

    public function buscar($tabla, $condicion) {
        // Conectar a la base de datos
        $pdo = $this->conectar();
        
        // Construir la consulta SQL
        $sql = "SELECT * FROM $tabla WHERE $condicion";
        
        try {
            // Preparar y ejecutar la consulta
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            // Verificar si hay resultados
            if ($stmt->rowCount() > 0) {
                // Devolver todos los resultados como un arreglo asociativo
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                // Si no hay resultados, devolver un arreglo vacío
                return [];
            }
        } catch (PDOException $e) {
            // Si ocurre un error con la consulta, capturarlo y mostrarlo
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            return [];
        }
    }

    // Función para obtener todos los usuarios
    public function obtenerUsuarios() {
        $pdo = $this->conectar();
        $sql = "SELECT * FROM usuarios";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Función para agregar un usuario
    public function agregarUsuario($nombre, $email, $clave) {
        // Conectar a la base de datos
        $pdo = $this->conectar();
        
        // Preparar la consulta SQL
        $sql = "INSERT INTO usuarios (nombre, correo, clave, estado) VALUES (:nombre, :correo, :clave, 1)";
        
        // Preparar la sentencia
        $stmt = $pdo->prepare($sql);
        
        // Hasheamos la contraseña antes de almacenarla
        //$claveHashed = password_hash($clave, PASSWORD_BCRYPT);
        
        // Vinculamos los parámetros
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $email, PDO::PARAM_STR);
        $stmt->bindParam(':clave', $clave, PDO::PARAM_STR);
        
        // Ejecutamos la consulta
        $stmt->execute();
    }

    public function editarUsuario($id, $nombre, $email, $clave) {
        // Conectar a la base de datos
        $pdo = $this->conectar();
        
        // Preparar la consulta SQL para actualizar los datos del usuario
        $sql = "UPDATE usuarios SET nombre = :nombre, correo = :correo, clave = :clave WHERE id = :id";
        
        // Preparar la sentencia
        $stmt = $pdo->prepare($sql);
        
        // Hasheamos la nueva contraseña antes de almacenarla
        //$claveHashed = password_hash($clave, PASSWORD_BCRYPT);
        
        // Vinculamos los parámetros
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $email, PDO::PARAM_STR);
        $stmt->bindParam(':clave', $clave, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Ejecutamos la consulta
        $stmt->execute();
    }
    
    public function eliminarUsuario($id) {
        // Conectar a la base de datos
        $pdo = $this->conectar();
        
        // Preparar la consulta SQL para cambiar el estado del usuario a 0
        $sql = "UPDATE usuarios SET estado = 0 WHERE id = :id";
        
        // Preparar la sentencia
        $stmt = $pdo->prepare($sql);
        
        // Vinculamos el parámetro
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Ejecutamos la consulta
        $stmt->execute();
    }
    
    

    // Función para obtener todos los productos
    public function obtenerProductos() {
        $pdo = $this->conectar();
        $sql = "SELECT * FROM productos";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Función para agregar un producto
    public function agregarProducto($nombre, $descripcion, $precio) {
        $pdo = $this->conectar();
        $sql = "INSERT INTO productos (nombre_p, descripcion, precio, estado) VALUES (:nombre_p, :descripcion, :precio, 1)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre_p', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
        $stmt->execute();
    }

    // Función para editar un producto
    public function editarProducto($id, $nombre, $descripcion, $precio) {
        $pdo = $this->conectar();
        $sql = "UPDATE productos SET nombre_p = :nombre_p, descripcion = :descripcion, precio = :precio WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre_p', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
        $stmt->execute();
    }

    // Función para cambiar el estado de un producto
    public function cambiarEstadoProducto($id, $estado) {
        $pdo = $this->conectar();
        $sql = "UPDATE productos SET estado = :estado WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>

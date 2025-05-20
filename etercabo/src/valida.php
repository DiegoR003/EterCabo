<?php
require 'Conexion/DataBase.php'; // Asegúrate de que la clase Database esté disponible

// Recibir los datos del formulario
$var_email = $_POST['email'];
$var_clave = $_POST['clave'];

$db = new Database();
$resultado = $db->buscar("usuarios", "correo = '$var_email' AND clave = '$var_clave'");

if (!empty($resultado)) {
    // Si se encontró un usuario, se puede acceder a sus datos
    foreach ($resultado as $usuario) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $usuario['nombre'];
        $_SESSION['email'] = $usuario['correo'];
        $_SESSION['estado'] = $usuario['estado'];
        $_SESSION['id_usuario'] = $usuario['id']; // Guarda el ID del usuario

        if ($usuario['estado'] == 0) {
            echo "<p>Tu cuenta está desactivada. Por favor, contacta al administrador.</p>";
            exit;
        }
    }

    // Redirigir al panel de administración si el inicio de sesión es exitoso
    header('Location: medidor.php');
    exit;
} else {
    // Si no se encuentra el usuario, mostrar un mensaje de error
    echo "Usuario o contraseña incorrectos.";
    echo "<p>Volver al inicio <a href='login.php'>Login</a></p>";
}
?>



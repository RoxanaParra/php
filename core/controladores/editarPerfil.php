<?php
require_once __DIR__ . '/../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
    session_start();

    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $nuevaContrasena = $_POST['nuevaContrasena'];

    // Validar usuario activo
    $usuarioActual = $_SESSION['user'] ?? null;
    if (!$usuarioActual) {
        header('Location: ../../index.php');
        exit();
    }

    try {
        // Crear la conexión a la base de datos
        $pdo = crearConexion();

        // Comprobar si se debe actualizar la contraseña
        $sql = "UPDATE users_data 
                JOIN users_login ON users_data.idUser = users_login.idUser 
                SET users_data.nombre = :nombre, 
                    users_data.apellidos = :apellidos, 
                    users_data.email = :email";
        
        $params = [
            ':nombre' => $nombre,
            ':apellidos' => $apellidos,
            ':email' => $email,
            ':idUser' => $usuarioActual['idUser']
        ];

        if (!empty($nuevaContrasena)) {
            $hashedPassword = password_hash($nuevaContrasena, PASSWORD_BCRYPT);
            $sql .= ", users_login.password = :password";
            $params[':password'] = $hashedPassword;
        }

        $sql .= " WHERE users_data.idUser = :idUser";

        // Preparar y ejecutar la consulta
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        // Actualizar la sesión con los nuevos datos
        $_SESSION['user']['nombre'] = $nombre;
        $_SESSION['user']['apellidos'] = $apellidos;
        $_SESSION['user']['email'] = $email;

        // Redirigir con mensaje de éxito
        header('Location: perfil.php?mensaje=actualizado');
        exit();

    } catch (PDOException $e) {
        // Manejo de errores
        die("Error al actualizar el perfil: " . $e->getMessage());
    }
}
?>

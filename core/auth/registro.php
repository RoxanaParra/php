<?php

require('../conexion/conexion.php');

function registroUsuario() {
    // Obtener los datos del formulario por medio de $_POST
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $direccion = $_POST['direccion'];
    $sexo = $_POST['sexo'];  

    // Guardar en user_login
    $nombreUsuario = $_POST['nombreUsuario'];
    $password = $_POST['password'];
    $rol = 'user';

    // Crear conexión a la base de datos
    $pdo = crearConexion();
    if (!$pdo) {
        die('Conexión fallida');
    }

    // Preparar la consulta SQL
    $sql = "INSERT INTO users_data (nombre, apellidos, email, telefono, fecha_de_nacimiento, direccion, sexo) 
            VALUES (:nombre, :apellidos, :email, :telefono, :fechaNacimiento, :direccion, :sexo)";

    $stmt = $pdo->prepare($sql);

    // Vincular parámetros
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':fechaNacimiento', $fechaNacimiento);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':sexo', $sexo);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        $accederDatos = [
            'nombreUsuario' => $nombreUsuario,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'rol' => $rol,
        ];

        AlmacenarDatosInicioSesionUsuario($pdo, $accederDatos);

        header('Location: ../../views/Autenticacion/acceso.php');
        exit();
    } else {
        header('Location: ../../views/Autenticacion/registro.php');
        exit();
    }
}

function AlmacenarDatosInicioSesionUsuario($pdo, $accederDatos) {
    $userId = $pdo->lastInsertId();

    // Preparar la consulta SQL para insertar en user_login
    $sql = "INSERT INTO users_login (idUser, usuario, password, rol)
            VALUES (:userId, :nombreUsuario, :password, :rol)";
            
    $stmt = $pdo->prepare($sql);

    // Vincular parámetros
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':nombreUsuario', $accederDatos['nombreUsuario']);
    $stmt->bindParam(':password', $accederDatos['password']);
    $stmt->bindParam(':rol', $accederDatos['rol']);

    return $stmt->execute();
}

registroUsuario();

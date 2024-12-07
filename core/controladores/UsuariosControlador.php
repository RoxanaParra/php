<?php

require_once __DIR__ . '/../conexion/conexion.php';

function handleRequest() {
    if (isset($_POST['method'])) {
        switch ($_POST['method']) {
            case 'store':
                storeUser();
                break;
            case 'delete':
                eliminarUsuario();
                break;
            case 'update':
                editarUsuario($_POST['idUser']);
                break;
        }
    }
}

function indexUsers() {
    $pdo = crearConexion();

    $sql = "SELECT * FROM users_data JOIN users_login ON users_data.idUser = users_login.idUser";

    $stmt = $pdo->prepare($sql);
    
    $stmt->execute();

    return $stmt->fetchAll();
}

//ESTA ES PARA MOSTRAR UN USUARIO
function mostrarUsuario(int $id) {
    $pdo = crearConexion();

    $sql = "SELECT * FROM users_data JOIN users_login ON users_data.idUser = users_login.idUser WHERE users_data.idUser = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();

    return $stmt->fetch();
}

function ObtenerUltimoIdUser() {
    $pdo = crearConexion();

    $sql = "SELECT idUser FROM users_data ORDER BY idUser DESC LIMIT 1";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    return $stmt->fetch();
}

function storeUser() {
    $pdo = crearConexion();

    $name = $_POST['nombre'];
    $lastname = $_POST['apellidos'];
    $email = $_POST['email'];
    $address = $_POST['direccion'];
    $phone = $_POST['telefono'];
    $birthdate = $_POST['fecha_de_nacimiento'];
    $gender = $_POST['sexo'];
    $role = $_POST['rol'];
    $username = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users_data (nombre, apellidos, email, direccion, telefono, fecha_de_nacimiento, sexo) 
            VALUES (:nombre, :apellidos, :email, :direccion, :telefono, :fecha_de_nacimiento, :sexo)";
            
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nombre', $name);
    $stmt->bindParam(':apellidos', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':direccion', $address);
    $stmt->bindParam(':telefono', $phone);
    $stmt->bindParam(':fecha_de_nacimiento', $birthdate);
    $stmt->bindParam(':sexo', $gender);

    // Ejecutar la consulta
    if ($stmt->execute()) {            
        $idUser = ObtenerUltimoIdUser()['idUser'];

        $sql = "INSERT INTO users_login (idUser, usuario, rol, password) 
                VALUES (:idUser, :usuario, :rol, :password)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':usuario', $username);
        $stmt->bindParam(':rol', $role);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            header('Location: ../../views/usuarios/usuarios.php');
            exit();
        } else {
            header('Location: ../../views/usuarios/usuarios.php');
            exit();
        }
    } else {
        header('Location: ../../views/usuarios/usuarios.php');
        exit();
    }
}

function editarUsuario(int $id) {
    $pdo = crearConexion();

    $name = $_POST['nombre'];
    $lastname = $_POST['apellidos'];
    $email = $_POST['email'];
    $address = $_POST['direccion'];
    $phone = $_POST['telefono'];
    $birthdate = $_POST['fecha_de_nacimiento'];
    $gender = $_POST['sexo'];
    $role = $_POST['rol'];
    $username = $_POST['usuario'];
    $idUser = $_POST['idUser'];
    $password = $_POST['password'];

    if(! empty($_POST['password']) && ! password_verify($_POST['password'], $password)) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }

    $sql = "UPDATE users_data 
            JOIN users_login ON users_data.idUser = users_login.idUser 
            SET users_data.nombre = :nombre, 
                users_data.apellidos = :apellidos,
                users_data.email = :email,
                users_data.direccion = :direccion,
                users_data.telefono = :telefono,
                users_data.fecha_de_nacimiento = :fecha_de_nacimiento,
                users_data.sexo = :sexo,
                users_login.usuario = :usuario,
                users_login.rol = :rol" .
                ($password ? ", users_login.password = :password" : "") .
           " WHERE users_data.idUser = :id";

    

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nombre', $name);
    $stmt->bindParam(':apellidos', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':direccion', $address);
    $stmt->bindParam(':telefono', $phone);
    $stmt->bindParam(':fecha_de_nacimiento', $birthdate);
    $stmt->bindParam(':sexo', $gender);
    $stmt->bindParam(':rol', $role);
    $stmt->bindParam(':usuario', $username);
    $stmt->bindParam(':id', $idUser);

    if ($password) {
        $stmt->bindParam(':password', $password);
    }

    if ($stmt->execute()) {
        header('Location: ../../views/usuarios/usuarios.php');
        exit();
    } else {
        header('Location: ../../views/usuarios/usuarios.php');
        exit();
    }
}

function eliminarUsuario() {
    $id = $_POST['idUser'];

    $pdo = crearConexion();

    $sql = "DELETE users_login, users_data FROM users_login INNER JOIN users_data ON users_login.idUser = users_data.idUser WHERE users_login.idUser = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: ../../views/usuarios/usuarios.php');
        exit();
    } else {
        header('Location: ../../views/usuarios/usuarios.php');
        exit();
    }
}

handleRequest();
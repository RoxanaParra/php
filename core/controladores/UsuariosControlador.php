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
                editarUsuario();
                break;
            case 'register':
                registerUser();
                break;
            case 'login':
                loginUser();
                break;
            case 'logout':
                logoutUser();
                break;
            case 'updateProfile':
                updateProfile();
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

function checkIfUserExists($username, $email) {
    $pdo = crearConexion();

    $checkIfUserExists = "SELECT * FROM users_login JOIN users_data ON users_login.idUser = users_data.idUser WHERE users_login.usuario = :usuario OR users_data.email = :email";
    $checkIfUserExistsStmt = $pdo->prepare($checkIfUserExists);
    $checkIfUserExistsStmt->bindParam(':usuario', $username);
    $checkIfUserExistsStmt->bindParam(':email', $email);
    $checkIfUserExistsStmt->execute();
    
    $userExists = $checkIfUserExistsStmt->fetch();

    if($userExists) {
        session_start();
        $_SESSION['error'] = "El usuario o el email ya existe";

        if (basename($_SERVER['HTTP_REFERER']) == 'registro.php') {
            header('Location: ../../views/Autenticacion/registro.php');
        } elseif (basename($_SERVER['HTTP_REFERER']) == 'crearUsuario.php') {
            header('Location: ../../views/usuarios/crearUsuario.php');
        } else {
            header('Location: ../../views/Autenticacion/registro.php');
        }
 
        exit();
    }
}

function saveUser() {
    $pdo = crearConexion();

    $name = $_POST['nombre'];
    $lastname = $_POST['apellidos'];
    $email = $_POST['email'];
    $address = $_POST['direccion'];
    $phone = $_POST['telefono'];
    $birthdate = $_POST['fecha_de_nacimiento'];
    $gender = $_POST['sexo'];
    $role = isset($_POST['rol']) ? $_POST['rol'] : 'user';
    $username = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    checkIfUserExists($username, $email);

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

        return $stmt->execute();
    }else{
        return false;
    }
}

function storeUser() {
    if (saveUser()) {
        header('Location: ../../views/usuarios/usuarios.php');
        exit();
    } else {
        header('Location: ../../views/usuarios/usuarios.php');
        exit();
    }
}

function registerUser() {
    if (saveUser()) {
        header('Location: ../../views/Autenticacion/acceso.php');
        exit();
    } else {
        header('Location: ../../views/Autenticacion/registro.php');
        exit();
    }
}

function loginUser() {
    $pdo = crearConexion();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users_login WHERE usuario = :usuario";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':usuario', $username);

    $stmt->execute();

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();

        $sql = "SELECT * FROM users_data JOIN users_login ON users_data.idUser = users_login.idUser WHERE users_login.idUser = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id', $user['idUser']);

        $stmt->execute();

        $_SESSION['user'] = $stmt->fetch();
        
        header('Location: ../../index.php');
        exit();
    } else {
        header('Location: ../../views/Autenticacion/acceso.php');
        exit();
    }
}

function logoutUser() {
    session_start();
    
    session_destroy();

    header('Location: ../../views/Autenticacion/acceso.php');

    exit();
}

function updateProfile() {
    $pdo = crearConexion();

    $idUser = $_POST['idUser'];
    $name = $_POST['nombre'];
    $lastname = $_POST['apellidos'];
    $email = $_POST['email'];
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $role = $_POST['rol'];
    $username = $_POST['usuario'];

    if(! empty($_POST['password']) && ! password_verify($_POST['password'], $password)) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql = "UPDATE users_data 
            JOIN users_login ON users_data.idUser = users_login.idUser 
            SET users_data.nombre = :nombre, 
                users_data.apellidos = :apellidos,
                users_data.email = :email,
                users_login.password = :password,
                users_login.usuario = :usuario,
                users_login.rol = :rol
            WHERE users_data.idUser = :id";
    }else {
        $sql = "UPDATE users_data   
                JOIN users_login ON users_data.idUser = users_login.idUser 
                SET users_data.nombre = :nombre, 
                    users_data.apellidos = :apellidos,
                    users_data.email = :email,
                    users_login.usuario = :usuario,
                    users_login.rol = :rol
                WHERE users_data.idUser = :id";
    }

    $stmt = $pdo->prepare($sql);

    if (! empty($password)) {
        $stmt->bindParam(':password', $password);
    }

    $stmt->bindParam(':nombre', $name);
    $stmt->bindParam(':apellidos', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':rol', $role);
    $stmt->bindParam(':usuario', $username);
    $stmt->bindParam(':id', $idUser);

    if ($stmt->execute()) {
        $sql = "SELECT * FROM users_data JOIN users_login ON users_data.idUser = users_login.idUser WHERE users_login.idUser = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id', $idUser);

        $stmt->execute();

        session_start();

        $_SESSION['user'] = $stmt->fetch();

        header('Location: ../../views/usuarios/usuarios.php');
        exit();
    } else {
        header('Location: ../../views/usuarios/perfil.php');
        exit();
    }
}

function editarUsuario() {
    $pdo = crearConexion();

    $id= $_POST['idUser'];
    $name = $_POST['nombre'];
    $lastname = $_POST['apellidos'];
    $email = $_POST['email'];
    $address = $_POST['direccion'];
    $phone = $_POST['telefono'];
    $birthdate = $_POST['fecha_de_nacimiento'];
    $gender = $_POST['sexo'];
    $role = $_POST['rol'];
    $username = $_POST['usuario'];
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

    // Bind parameters
    $stmt->bindParam(':nombre', $name);
    $stmt->bindParam(':apellidos', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':direccion', $address);
    $stmt->bindParam(':telefono', $phone);
    $stmt->bindParam(':fecha_de_nacimiento', $birthdate);
    $stmt->bindParam(':sexo', $gender);
    $stmt->bindParam(':rol', $role);
    $stmt->bindParam(':usuario', $username);
    $stmt->bindParam(':id', $id);

    // Only bind the password if it is set
    if (! empty($password)) {
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
<?php

require_once __DIR__ . '/../conexion/conexion.php';

function handleRequest() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Obtener el usuario activo
    $usuarioActivo = $_SESSION['user'] ?? null;

    if (!$usuarioActivo) {
        header('Location: ../../index.php');
        exit();
    }

    // Crear la conexión
    $pdo = crearConexion();

    // Inicializar variables
    $sql = '';
    $params = [];

    // Verificar el rol del usuario y construir la consulta SQL
    if ($usuarioActivo['rol'] === 'admin') {
        // Los administradores ven todas las citas
        $sql = "SELECT * FROM citas JOIN users_data ON citas.idUser = users_data.idUser";
    } else {
        // Los usuarios estándar ven solo sus citas
        $sql = "SELECT * FROM citas JOIN users_data ON citas.idUser = users_data.idUser WHERE users_data.idUser = :idUser";
        $params = [':idUser' => $usuarioActivo['idUser']];
    }

    // Preparar la consulta
    $stmt = $pdo->prepare($sql);

    // Ejecutar la consulta con los parámetros adecuados
    $stmt->execute($params);

    // Obtener las citas
    $citas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $citas ?: [];
}


    if (isset($_POST['method'])) {
        switch ($_POST['method']) {
            case 'store':
                crearCita();
                break;
            case 'delete':
                eliminarCita();
                break;
            case 'show':
                mostrarCita();
                break;
            case 'update':
                editarCita();
                break;
        }
    }


function index() {
    $pdo = crearConexion();

    if($_SESSION['user']['rol'] === 'admin') {
        $sql = "SELECT * FROM citas JOIN users_data ON citas.idUser = users_data.idUser";
    } else {
        $idUser = $_SESSION['user']['idUser'];

        $sql = "SELECT * FROM citas JOIN users_data ON citas.idUser = users_data.idUser WHERE users_data.idUser = :idUser";
    }

    $stmt = $pdo->prepare($sql);

    if(isset($idUser)) {
        $stmt->bindParam(':idUser', $idUser);
    }

    $stmt->execute();

    $citas = $stmt->fetchAll();

    if (empty($citas)) {
        return [];
    }

    return $citas;
}

function mostrarCita($idCita = null) {
    $pdo = crearConexion();

    if(! isset($idCita)) {
        $idCita = $_GET['id'];
    }

    $sql = "SELECT * FROM citas WHERE idCita = :idCita";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':idCita', $idCita);

    $stmt->execute();

    return $stmt->fetch();
}

function crearCita(): void {
    $pdo = crearConexion(); 

    $motivo_cita = $_POST['motivo_cita'];
    $fecha_cita = $_POST['fecha_cita'];
    $idUser = $_POST['idUser'];

    $sql = "INSERT INTO citas (motivo_cita, fecha_cita, idUser)
            VALUES (:motivo_cita, :fecha_cita, :idUser)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':motivo_cita', $motivo_cita);
    $stmt->bindParam(':fecha_cita', $fecha_cita);
    $stmt->bindParam(':idUser', $idUser);

    if ($stmt->execute()) {
        header('Location: ../../views/citas/citas.php');
        exit();
    } else {
        header('Location: ../../views/citas/crearCita.php');
        exit();
    }
}


function editarCita(): void {
    $pdo = crearConexion();

    $idCita = $_POST['id'];
    $motivo_cita = $_POST['motivo_cita'];
    $fecha_cita = $_POST['fecha_cita'];
    $idUser = $_POST['idUser'];

    checarSiLaCitaEsAnteriorALaFechaActual($idCita);

    $sql = "UPDATE citas SET 
            motivo_cita = :motivo_cita, 
            fecha_cita = :fecha_cita,
            idUser = :idUser
            WHERE idCita = :idCita";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':motivo_cita', $motivo_cita);
    $stmt->bindParam(':fecha_cita', $fecha_cita);
    $stmt->bindParam(':idUser', $idUser);
    $stmt->bindParam(':idCita', $idCita);

    if ($stmt->execute()) {
        header('Location: ../../views/citas/citas.php');
        exit();
    } else {
        header('Location: ../../views/citas/editarCita.php');
        exit();
    }
}
function eliminarCita() {
    $pdo = crearConexion();

    $idCita = $_POST['id'];

    checarSiLaCitaEsAnteriorALaFechaActual($idCita);

    $sql = "DELETE FROM citas WHERE idCita = :idCita";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':idCita', $idCita);

    if ($stmt->execute()) {
        header('Location: ../../views/citas/citas.php');
        exit();
    } else {
        header('Location: ../../views/citas/citas.php');
        exit();
    }
}

function ObtenerUsuarios() {
    $pdo = crearConexion();

    $sql = "SELECT * FROM users_data";

    return $pdo->query($sql)->fetchAll();
}

function checarSiLaCitaEsAnteriorALaFechaActual($idCita) {
    $cita = mostrarCita($idCita);

    if($cita['fecha_cita'] <= date('Y-m-d')) {
        session_start();

        $_SESSION['error'] = 'No es posible editar una cita con una fecha anterior a la fecha actual';
        
        header('Location: ../../views/citas/citas.php');
        
        exit();
    }
}


handleRequest();


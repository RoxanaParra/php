<?php

require_once __DIR__ . '/../conexion/conexion.php';
function handleRequest() {
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
}

function index() {
    $pdo = crearConexion();

    $sql = "SELECT * FROM citas JOIN users_data ON citas.idUser = users_data.idUser";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $citas = $stmt->fetchAll();

    if (empty($citas)) {
        echo "No se encontraron citas en la base de datos.";
        exit;
    }

    return $citas;
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

function mostrarCita(int $id) {

        $pdo = crearConexion();
    
        $sql = "SELECT * FROM citas JOIN users_data ON citas.idUser = users_data.idUser WHERE citas.idCita = :idCita";
    
        $stmt = $pdo->prepare($sql);
    
        $stmt->bindParam(':idCita', $id);
    
        $stmt->execute();
        
        return $stmt->fetch();
}


function editarCita(): void {
    $pdo = crearConexion();

    $idCita = $_POST['id'];
    $motivo_cita = $_POST['motivo_cita'];
    $fecha_cita = $_POST['fecha_cita'];
    $idUser = $_POST['idUser'];

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

    handleRequest();


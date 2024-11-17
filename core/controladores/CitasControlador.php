<?php

require_once '../../conexion/conexion.php';

function arranque() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        crear();
    }
}

function listar() {
    //muestra todos los usuarios de la base de datos
}

function mostrar(int $id) {
    //muestra un usuario en la base de datos
}

function crear() {
    try {
        //paso 1: Invocar la conexion (en este caso se invoca de forma global)
        $conexion = crearConexion();

        //2 Preparar la consulta
        $sql = "INSERT INTO citas (idUser, fecha_cita, motivo_cita) VALUES (:usuario, :fecha, :motivo)";

        //3 Preparar el statement
        $statement = $conexion->prepare($sql);

        //4 Vincular los parametros
        $usuario = (int) $_POST['usuario'];
        $fecha = $_POST['fecha'];
        $motivo = $_POST['motivo'];

        $statement->bindParam(':usuario', $usuario);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':motivo', $motivo);

        $statement->execute();
    }catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function editar(int $id) {
    try {
        //paso 1: Invocar la conexion (en este caso se invoca de forma global)
        $conexion = crearConexion();

        //2 Preparar la consulta
        $sql = "UPDATE citas SET idUser = :usuario, fecha_cita = :fecha, motivo_cita = :motivo WHERE idCita = :id";

        //3 Preparar el statement
        $statement = $conexion->prepare($sql);

        //4 Vincular los parametros
        $usuario = (int) $_POST['usuario'];
        $fecha = $_POST['fecha'];
        $motivo = $_POST['motivo'];

        $statement->bindParam(':usuario', $usuario);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':motivo', $motivo);

        $statement->execute();
    }catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function eliminar(int $id) {
    //elimina un usuario de la base de datos
}

arranque();
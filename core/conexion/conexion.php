<?php
function crearConexion (){
    $host = 'localhost';
    $db = 'paginawebphp';
    $user = 'root';
    $pass = '';

    try {
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;

    } catch(PDOException $e){
        echo 'conexion fallida: ' . $e->getMessage();
    }

    }

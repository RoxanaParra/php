<?php

require_once('../../conexion/conexion.php');


function handleRequest() {
    if (isset($_POST ['method'])) {
        switch ($_POST ['method']) {
            case 'crear':
                crear();
                break;
            case 'delete':
                delete();
                break;

        }
    }
}

function index() {
    $pdo = crearConexion();

    $sql = "SELECT * FROM noticias";

    $stmt = $pdo->prepare($sql);

    $stmt->execute ();
    
    return $stmt ->fetchAll();
}

//Crea noticias de la base de datos
function crear(): void {
    $pdo = crearConexion(); 

    $titulo = $_POST ['titulo'];
    $imagen = $_FILES['imagen']['tmp_name'];
    $texto = $_POST ['texto'];
    $fecha = date(format: 'Y-m-d');
    $idUser = 4;

    $sql = "INSERT INTO noticias (titulo, imagen, texto, fecha, idUser)
            VALUES (:titulo, :imagen, :texto, :fecha, :idUser)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':imagen', $imagen);
    $stmt->bindParam(':texto', $texto);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':idUser', $idUser);

    if ($stmt->execute()) {

        header('Location: ../../views/noticias/noticias.php');
        exit();
    } else {
        header('Location: ../../views/noticias/crearNoticia.php');
        exit();
    }
}


//muestra una noticia en la base de datos
function mostrar(int $id) {
    $pdo = crearConexion();

    $sql = "SELECT * FROM noticias WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam('id', $id);

    $stmt->execute ();
    
    return $stmt ->fetch();

}

    //edita una noticia en la base de datos
    function editar() {
        $pdo = crearConexion(); 
    
        $titulo = $_POST ['titulo'];
        $imagen = $_POST ['imagen'];
        $texto = $_POST ['texto'];
        $fecha = $_POST ['fecha'];
        $idUser = $_POST ['idUser'];
    
    
        $sql = "UPDATE noticias SET titulo = :titulo, 
                                    imagen = :imagen, 
                                    texto = :texto, 
                                    fecha = :fecha, 
                                    idUser = :idUser
                WHERE id = :id";
    
        $stmt = $pdo->prepare($sql);
    
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam('id', $id);
    
        if ($stmt->execute()) {
    
            header('Location: ../../views/noticias.php');
            exit();
        } else {
            header('Location: ../../views/noticias.php');
            exit();
        }
    }

    //elimina una noticia de la base de datos
  function eliminar(int $id) {
    $pdo = crearConexion();

    $sql = "DELETE FROM noticias WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam('id', $id);

    if ($stmt->execute()) {

        header('Location: ../../views/noticias.php');
        exit();
    } else {
        header('Location: ../../views/noticias.php');
        exit();
    }

  }

  handleRequest()

?>
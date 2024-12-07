    <?php

    require_once __DIR__ . '/../conexion/conexion.php';

    function handleRequest() {
        if (isset($_POST ['method'])) {
            switch ($_POST ['method']) {
                case 'store':
                    crearNoticia();
                    break;
                case 'eliminar':
                    eliminarNoticia();
                    break;
                case 'mostrar':
                    mostrarNoticia();
                    break;
                case 'editar':
                    editarNoticia();
                    break;
            }
        }
    }

    
    function index() {
        $pdo = crearConexion();
    
        $sql = "SELECT * FROM noticias JOIN users_data ON noticias.idUser = users_data.idUser ORDER BY noticias.idNoticia DESC";
    
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    
        $Noticia = $stmt->fetchAll();
    
        if (empty($Noticia)) {
            echo "No se encontraron noticias en la base de datos.";
            exit;
        }
    
        return $Noticia;
    }

    //Crea noticias de la base de datos
    function crearNoticia(): void {
        $pdo = crearConexion(); 

        $titulo = $_POST ['titulo'];
        $imagen = $_POST['imagen'];
        $texto = $_POST ['texto'];
        $fecha = date('Y-m-d');
        $idUser = $_POST['idUser'];

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
    function mostrarNoticia(int $id) {
        $pdo = crearConexion();

        $sql = "SELECT * FROM noticias WHERE idNoticia = :idNoticia";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':idNoticia', $id);

        $stmt->execute();
        
        return $stmt ->fetch();

    }

        //edita una noticia en la base de datos
    function editarNoticia(): void {
            $pdo = crearConexion();

            $idNoticia = $_POST['id'];
            $titulo = $_POST['titulo'];
            $fecha = $_POST['fecha'];
            $texto = $_POST['texto'];
            $imagen = $_POST['imagen'];
            $idUser = $_POST['idUser'];

            $sql = "UPDATE noticias SET 
            titulo = :titulo, 
            fecha = :fecha, 
            texto = :texto, 
            imagen = :imagen,
            idUser = idUser
            WHERE idNoticia = :idNoticia";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':texto', $texto);
            $stmt->bindParam(':imagen', $imagen);
            $stmt->bindParam(':idNoticia', $idNoticia);
            $stmt->bindParam(':idUser', $idUser);

            if ($stmt->execute()) {
                    header('Location: ../../views/noticias/noticias.php');
                exit();
            } else {
                header('Location: ../../views/noticias/editarNoticia.php');
                exit();
            }
    }

    //elimina una noticia de la base de datos
    function eliminarNoticia(int $id) {
        $pdo = crearConexion();

        $id = $_POST ['id'];

        $sql = "DELETE FROM noticias WHERE idNoticia = :idNoticia";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':idNoticia', $id);

        if ($stmt->execute()) {

            header('Location: ../../views/noticias/noticias.php');
            exit();
        } else {
            header('Location: ../../views/noticias/noticias.php');
            exit();
        }

    }

    function ObtenerUsuarios() {
        $pdo = crearConexion();

        $sql = "SELECT * FROM users_data";

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    handleRequest()

    ?>
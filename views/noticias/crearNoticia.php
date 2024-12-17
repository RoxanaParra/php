<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Crea tus mejores noticias </title>
    <!-- Cargar CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/estilos.css">
</head>
<body>

<!--El siguiente div define un contenedor preparado para albergar una barra de navegación, 
        esté div puede ser manipulado a través de php-->

    <div id="navbar" class="nav">
        <?php include_once('../../navbar.php') ?>
    </div>

    <?php 
        include_once '../../core/controladores/UsuariosControlador.php';

        $usuarios = indexUsers();
    ?>

    <div class="EspacioDebajoDelNavbarNoticia"></div>

    <?php

        if (!isset($_SESSION['user']) || $_SESSION['user']['rol'] !== 'admin') {
            include_once '../../405.php';
            exit();
        }
    ?>

    <div class="mb-5">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="card" style="width: 30rem;">
                <div class="card-body">    
                <form action="../../core/controladores/NoticiasControlador.php" method="POST" class="row g-3" enctype="multipart/form-data">
                <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                            <span id="errorTitulo" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label for="texto" class="form-label">Texto</label>
                            <textarea class="form-control" id="texto" name="texto" required></textarea>
                            <span id="errorTexto" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" required>
                            <span id="errorImagen" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label for="idUser" class="form-label">Usuario</label>
                            <select class="form-select" id="idUser" name="idUser" required>
                                <?php foreach ($usuarios as $usuario): ?>
                                    <option value="<?= htmlspecialchars($usuario['idUser']) ?>">
                                        <?= htmlspecialchars($usuario['nombre']) ?> <?= htmlspecialchars($usuario['apellidos']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <span id="errorUsuario" class="text-danger"></span>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required min="<?php echo date('Y-m-d'); ?>">
                            <span id="errorFecha" class="text-danger"></span>
                        </div>

                        <div class="col-12 text-center">
                            <input type="hidden" name="method" value="store">
                            <button type="submit" class="btn btn-primary">Crear Noticia</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
              
     <!---Se define un div que alberga el footer, es manipulado a través de un archivo de php-->
        
 <div id="footer">
        <?php include_once('../../footer.php')
        ?>
    </div>
        
        <!--Se agregan los enlaces de Bootstrap necesarios para llamar a las funcionalidades de la pagina-->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="../../public/javascript/navbarUtil.js"> </script>
    </body>
</html>
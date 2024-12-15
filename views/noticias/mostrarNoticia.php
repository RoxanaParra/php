<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Noticia</title>
    <!-- Cargar CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/estilos.css">
    <!-- Añadir estilos personalizados para mejorar la apariencia -->
</head>
<body>

    <!-- Barra de navegación -->
    <div id="navbar" class="nav">
        <?php include_once('../../navbar.php') ?>
    </div>

    <div class="EspacioDebajoDelNavbar"></div>

    <div class="container mt-5">
        <?php
        // Obtener el ID de la noticia desde la URL
        $idNoticia = isset($_GET['id']) ? $_GET['id'] : null;

        if ($idNoticia) {
            include_once('../../core/controladores/NoticiasControlador.php');
            $noticia = mostrarNoticia($idNoticia); // Función para obtener los datos de la noticia por su ID

            if ($noticia) {
                ?>
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4"><?php echo htmlspecialchars($noticia['titulo']); ?></h1>

                        <hr />

                        <p>
                            <small>Publicado el <?php echo htmlspecialchars($noticia['fecha']); ?> | 
                            por: <?php echo htmlspecialchars($noticia['nombre'].' '.$noticia['apellidos']); ?></small>
                        </p>
                        <!-- Imagen de la Noticia -->
                        <?php if (!empty($noticia['imagen'])): ?>
                            <img src="<?php echo htmlspecialchars($noticia['imagen']); ?>" 
                                 alt="Imagen de <?php echo htmlspecialchars($noticia['titulo']); ?>" 
                                 class="img-fluid rounded mb-4" style="width: 100%; height: 500px;">
                        <?php endif; ?>

                        <!-- Contenido -->
                        <p class="card-text mt-4"><?php echo nl2br(htmlspecialchars($noticia['texto'])); ?></p>
                    </div>
                </div>
                <?php
            } else {
                echo "<div class='alert alert-danger text-center'>No se encontró la noticia seleccionada.</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'>No se proporcionó un ID válido para la noticia.</div>";
        }
        ?>
    </div>

    <!-- Footer -->
    <div id="footer">
        <?php include_once('../../footer.php') ?>
    </div>

    <!-- Enlaces de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>

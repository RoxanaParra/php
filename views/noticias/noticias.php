<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias sobre Regalos Personalizados</title>
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

    <div class="EspacioDebajoDelNavbar"></div>
    
<!-- Contenedor de noticias -->
<div class="container">
    <h2 class="text-center mt-5 mb-5">Últimas Noticias sobre Regalos Personalizados</h2>
    <div class="row">

    <?php
    // Datos de prueba
    $noticias = [
        [
            'titulo' => 'Nuevas Tazas Personalizadas',
            'texto' => 'Descubre nuestra nueva colección de tazas personalizadas perfectas para cualquier ocasión.',
            'fecha' => '2023-10-01',
            'idUser' => '1',
            'idNoticia' => '101'
        ],
        [
            'titulo' => 'Lanzamiento de Camisetas Únicas',
            'texto' => 'Presentamos nuestras camisetas únicas personalizadas, diseñadas para destacar en cualquier evento.',
            'fecha' => '2023-09-25',
            'idUser' => '2',
            'idNoticia' => '102'
        ],
        [
            'titulo' => 'Promociones de Fin de Año',
            'texto' => 'Aprovecha nuestras promociones de fin de año en todos nuestros productos personalizados.',
            'fecha' => '2023-09-20',
            'idUser' => '3',
            'idNoticia' => '103'
        ],
    ];

    // Renderizado de las noticias
    foreach ($noticias as $noticia) {
        echo "
        <div class='col-md-6 col-lg-4 mb-4'>
            <div class='card shadow-sm'>
                <img src='../../public/imagenes/taza1.jpg' class='card-img-top rounded-top' alt='Imagen de " . htmlspecialchars($noticia['titulo']) . "' style='height: 200px; object-fit: cover;'>
                <div class='card-body'>
                    <h5 class='card-title text-dark mb-3'>" . htmlspecialchars($noticia['titulo']) . "</h5>
                    <p class='card-text text-muted'>" . htmlspecialchars(substr($noticia['texto'], 0, 80)) . "...</p>
                    <p class='text-muted mb-4'><small>Publicado el " . htmlspecialchars($noticia['fecha']) . " | Usuario " . htmlspecialchars($noticia['idUser']) . "</small></p>
                    <div class='d-flex justify-content-between align-items-center'>
                        <a href='verNoticia.php?id=" . htmlspecialchars($noticia['idNoticia']) . "' class='btn btn-outline-primary btn-sm'>Mostrar</a>
                        <form action='../../core/controladores/NoticiasControlador.php' method='POST' style='display:inline;'>
                            <input type='hidden' name='method' value='delete'>
                            <input type='hidden' name='idNoticia' value='" . htmlspecialchars($noticia['idNoticia']) . "'>
                        </form>
                    </div>
                </div>
            </div>
        </div>";
    }
    ?>

    </div>
</div>

 <!---Se define un div que alberga el footer, es manipulado a través de un archivo de php-->
        
 <div id="footer">
        <?php include_once('../../footer.php') ?>
    </div>

    <!-- Cargar JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>

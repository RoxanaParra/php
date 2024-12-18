<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crea tus momentos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../public/css/estilos.css">
    </head>
    <body>
        
        <!--El siguiente div define un contenedor preparado para albergar una barra de navegación, 
        esté div puede ser manipulado a través de Javascript-->
        
        <div id="navbar" class="nav">
            <?php
                include_once('../navbar.php')
            ?>
        </div>
        
        <!-- Se crea una sección con el id "galeria" y la clase "sectionPadding", con un margen superior de 100px -->
         
        <section id="galeria" class="sectionPadding">
            <!-- Se declara el título principal centrado con el texto "Galeria de productos" -->
            <h1 class="text-center" id="EspacioTitulo"> Galeria de productos </h1>
            <div>
                <!-- Contenedor con clase Bootstrap "container" y texto centrado -->
                <div class="container text-center">
                    <!-- Se cre una fila (row) con el id "galeriaContainer", donde se organizarán las columnas de la galería -->
                    <div class="row" id="galeriaContainer">
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/taza1.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <!-- Enlace que utiliza "fslightbox" para mostrar la imagen en un lightbox al hacer clic,
                                     con el botón de Bootstrap "btn btn-primary" y el texto "Ver" -->
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/taza1.jpg" class="btn btn-primary">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/taza2.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/taza2.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/calendario1.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/calendario1.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/calendario2.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/calendario2.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/esfera1.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/esfera1.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/esfera2.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/esfera2.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/cojin1.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/cojin1.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/cojin2.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/cojin2.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/tarta1.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/tarta1.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/tarta2.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/tarta2.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/llaveros1.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/llaveros1.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/llaveros2.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/llaveros2.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/lapices1.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/lapices1.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/lapices2.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/lapices2.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/almohada1.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/almohada1.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/almohada2.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/almohada2.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/desayuno1.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/desayuno1.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/desayuno2.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/desayuno2.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/desayuno3.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/desayuno3.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="galeriacard">
                                <img src="../public/imagenes/desayuno4.jpg" class="galeria-img" alt="..." width="286" height="300">
                                <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="../public/imagenes/desayuno4.jpg" class="btn btn-primary custom-btn">Ver Imagen</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!---Se define un div que alberga el footer, es manipulado a través de un archivo de php-->
        <div id="footer">
            <?php 
            include_once('../footer.php')
            ?>
        </div>

        <!--Se agregan los enlaces de Bootstrap y Javascript necesarios para llamar a las funcionalidades de la pagina entre 
        ellos los archivos de la librería utilizada para la Galeria-->
        <script src="../public/javascript/fslightbox.js"></script>
        <script src="fslightbox.min.js"></script>
        <script>
        fsLightboxInstances["first-lightbox"].props.onOpen = function () {
            console.log("The first lightbox has opened.");
        }
        fsLightboxInstances["second-lightbox"].props.onOpen = function () {
            console.log("The second lightbox has opened.");
        }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous"></script>
        <script src="../public/javascript/navbarUtil.js"> </script>
    </body>

</html>
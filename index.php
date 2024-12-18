<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crea tus momentos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/estilos.css">
    </head>
    <body>
        
        <!--El siguiente div define un contenedor preparado para albergar una barra de navegación, 
        esté div puede ser manipulado a través de Javascript-->

        <div id="navbar" class="nav">
            <?php
                include_once('navbar.php')
            ?>
        </div>
        
        <!--Primera seccion-->
        
        <div class="banner">
            <div class="overlay"></div>
            <div class="content">
                <h1>¡Bienvenido a Crea Tus Momentos!</h1>
                <p>Descubre regalos personalizados únicos para cada ocasión. ¡Haz que cada detalle cuente!</p>
                <a href="#productosContainer" class="btn btn-primary">Ver Productos</a>
            </div>
        </div>
        
        <div class="productos-overbanner">
            <div class="card">
                <h1 class="text-center">Servicios y productos</h1>
                <div class="card-body">
                    <p>En "Crea tus momentos" podrás inmortalizar momentos con un toque totalmente personalizado y especial ¡Solo para que lo disfrutes tú y tus seres  más queridos! </p>
                    <div class="row" id="productosContainer"></div>
                </div>
            </div>
        </div>
        
        <!--Seccion de Testimonios-->
        
        <section>
            <h3 class="text-center" id="espacio">Testimonios</h3>
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="testimonial">
                                <p>"Los productos son de excelente calidad y el servicio es muy atento. ¡Definitivamente
                                volveré a comprar!"</p>
                                <div class="author">- Maria Pérez</div>
                                <img src="public/imagenes/maria.jpg" class="testimonio"  alt="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="testimonial">
                                <p>"¡Me encantó el regalo personalizado que pedí! Llegó a tiempo y quedó tal como lo
                                quería."</p>
                                <div class="author">- Carlos Gómez</div>
                                <img src="public/imagenes/carlos.jpg" class="testimonio" alt="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="testimonial">
                                <p>"Los llaveros personalizados que pedí fueron el detalle perfecto para mi boda. 
                                La grabación quedó preciosa"</p>
                                <div class="author">- Isabel Ramírez</div>
                                <img src="public/imagenes/isabel.jpg" class="testimonio"  alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Sección de preguntas frecuentes -->
        <section class="faq-section">
            <div class="container">
                <h3 class="text-center">Preguntas Frecuentes</h3>
                <div class="accordion" id="accordionFaq">
                    
                    <!-- Primera Pregunta -->
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                ¿Cómo personalizo un producto?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionFaq">
                            <div class="accordion-body">
                                Puedes personalizar un producto eligiendo la opción de personalización en la página del producto y siguiendo los pasos indicados.
                            </div>
                        </div>
                    </div>
                    <!-- Segunda Pregunta -->
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ¿Cuánto tiempo tarda en llegar mi pedido?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionFaq">
                            <div class="accordion-body">
                                El tiempo de entrega varía entre 5 a 7 días hábiles, dependiendo de tu ubicación.
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tercera Pregunta -->
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                ¿Qué métodos de pago aceptan?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionFaq">
                            <div class="accordion-body">
                                Aceptamos pagos con tarjetas de crédito, débito y PayPal.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!---Se define un div que alberga el footer, es manipulado a través de un archivo de php-->
        
        <div id="footer">
            <?php 
            include_once('footer.php')
            ?>
        </div>
        
        <!--Se agregan los enlaces de Bootstrap y Javascript necesarios para llamar a las funcionalidades de la pagina-->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="public/javascript/productos.js"> </script>
        <script src="public/javascript/navbarUtil.js"> </script>
        <script src="public/javascript/banner.js"></script>
    </body>
</html>


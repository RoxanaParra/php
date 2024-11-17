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

    <div class="EspacioDebajoDelNavbar"></div>

    <div class="container mt-5">
        <div class="card shadow-lg">
                <h3 class="crearNoticia">Crear Nueva Noticia</h3>
            <div class="card-body">
                <form method="POST" action="../../core/controladores/NoticiasControlador.php" enctype="multipart/form-data">
                    <!-- Campo Título -->
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título de la noticia" required>
                    </div>

                    <!-- Campo Fecha -->
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" class="form-control" required>
                    </div>

                    <!-- Campo Texto -->
                    <div class="mb-3">
                        <label for="texto" class="form-label">Texto:</label>
                        <textarea id="texto" name="texto" class="form-control" rows="5" placeholder="Contenido de la noticia" required></textarea>
                    </div>

                    <!-- Campo Imagen -->
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen:</label>
                        <input type="file" id="imagen" name="imagen" class="form-control" accept="image/*" required>
                    </div>

                    <input type="hidden" name="method" value="store">

                    <br>

                    <!-- Botón Submit -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Crear Noticia</button>
                    </div>
                </form>
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
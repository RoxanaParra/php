<!DOCTYPE html>
  <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crea tus momentos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../public/css/estilos.css">
        <link rel="stylesheet" href="../public/css/mapa.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    </head>
    <body>
    <div id="navbar" class="nav">
            <?php
                include_once('../navbar.php')
            ?>
        </div>

    <section id="contacto">
      <div class="container">
        <h1 class="text-center" id="EspacioTitulo"> Contacto </h1>
        <div class="row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
              <!--Definimos el cuerpo de la tarjeta que llamamos "Card body" para insertar en ella la direccion del negocio-->
              <div class="tarjeta">
                <h5 class="card-title"><strong>Visitanos en</strong></h5>
                <p id="direccion" class="card-text">Calle Gran Vía 46, 28055 Madrid</p>
                <a href="#" class="btn btn-primary" onclick="copiarDireccion()">Copiar Dirección</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="tarjeta">
                <h5 class="card-title" id="centro"> <strong>¡Animate y crea Momentos con nosotros!</strong></h5>
                <p class="card-text">En "Crea tus Momentos" estamos encantados de ayudarte a crear regalos personalizados y únicos para cualquier ocasión especial.</p>
                <p class="card-text">
                  Puedes encontrarnos en nuestra página web: <strong>"www.creatusmomentos.com"</strong> donde encontratás una amplia variedad de productos y diseños para elegir.<br>
                  A través de nuestro número de contacto: <strong> +34 624 685 421 </strong> <br>
                  Y si lo prefieres, a tráves de nuestro correo electrónico:  <strong>info@creatusmomentos.com</strong>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <div id="mapa">
      
      <!--Se define un div que alberga el contenido del mapa, la funcionalidad del mapa
      está en un script denominado "mapaUtil.js", permitiendo la visualización geográfica en la página web -->
      <div id="map"></div>

      <br><br>

    </div>
    
    <!---Se define un div que alberga el footer, es manipulado a través de un archivo de php-->
    <div id="footer">
            <?php 
            include_once('../footer.php')
            ?>
    </div>
    
    <!--Se agregan los enlaces de Bootstrap y Javascript necesarios para llamar a las funcionalidades de la pagina-->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder"></script>
    <script src="../public/javascript/mapaUtil.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
    <script src="../public/javascript/navbarUtil.js"> </script>
    <script src="../public/javascript/direccion.js"></script>  
  </body>
</html>

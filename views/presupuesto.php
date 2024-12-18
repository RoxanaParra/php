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

            <div class="container mt-5">
                <h1 class="text-center mb-4" id="EspacioTitulo"> Presupuesto de Productos </h1>
                <form id="presupuestoForm">
                    <!--Primera Parte: Datos de Contacto-->
                    <div class="card espacioEntreElementosDelPresupuesto">
                        <div class="card-header">
                            <h2>Datos de Cliente</h2>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" maxlength="15" placeholder="Máximo 15 caracteres">
                                <span id="errorNombre" class="error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" maxlength="40" placeholder="Máximo 40 caracteres">
                                <span id="errorApellidos" class="error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono de contacto:</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" maxlength="9" placeholder="Máximo 9 dígitos">
                                <span id="errorTelefono" class="error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="usuario@dominio.com">
                                <span id="errorEmail" class="error"></span>
                            </div>
                        </div>
                    </div>
                    
                    <!--Segunda parte del Presupuesto-->
                    
                    <div class="card espacioEntreElementosDelPresupuesto">
                        <!--Se crea un encabezado dentro de la tarjeta (card-header)-->
                        <div class="card-header">
                            <h2> Precio de Productos </h2>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="producto" class="form-label"> Selecciona tus detalles favoritos: </label>
                                <select class="form-select" id="producto" name="producto">
                                    <option value="0" selected="selected"> Elige tus detalles </option>
                                    <option value="6.50"> Tazas - 6,50€ </option>
                                    <option value="10"> Calendarios - 10€ </option>
                                    <option value="7.99"> Esferas - 7,99€ </option>
                                    <option value="10.99"> Cojines - 10,99€ </option>
                                    <option value="65"> Tartas - 65€ </option>
                                    <option value="14.95"> llaveros - 14,95€ </option>
                                    <option value="22.50"> Lapices y agendas - 22,50€ </option>
                                    <option value="20.50"> Almohadas - 20,50€ </option>
                                    <option value="35.50"> Desayunos - 35,50€ </option>
                                </select>
                                <span id="errorProducto" class="error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="plazo" class="form-label"> Plazo (en meses): </label>
                                <input type="number" step="1" class="form-control" id="plazo" name="plazo" min="0" placeholder="Introduce un plazo">
                                <span id="errorPlazo" class="error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Extras que puedes agregar: </label>
                                <div class="form-check"> 
                                    <input class="form-check-input" type="checkbox" id="extra1" value="4.99">
                                    <label class="form-label" for="extra1"> Taza con fotos - 4,99€ </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="extra2" value="3.20">
                                    <label class="form-label" for="extra2"> Esfera con pegatinas de nombres - 3,20€ </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="extra3" value="10">
                                    <label class="form-label" for="extra3"> Tarta con fotos comestibles - 10€ </label>
                                </div>
                                <div class="form-check"> 
                                    <input class="form-check-input" type="checkbox" id="extra4" value="8.80">
                                    <label class="form-label" for="extra4"> Personalización de agendas con fotos y pegatinas - 8,80€ </label>
                                </div>
                                <div class="form-check"> 
                                    <input class="form-check-input" type="checkbox" id="extra5" value="4.50">
                                    <label class="form-label" for="extra5"> Llaveros con fotos - 4,50€ </label>
                                </div>
                                <div class="form-check"> 
                                    <input class="form-check-input" type="checkbox" id="extra6" value="15">
                                    <label class="form-label" for="extra6"> Domicilio - 15€ </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Precio Final-->
                    <div class="mb-3">
                        <label for="presupuestoFinal" class="form-label"> ¡Precio Final! </label>
                        <input type="text" id="presupuestoFinal" class="presupuestoFinal" value="0€" readonly>
                    </div>
                    
                    <!--Condiciones y estilo de botones-->
                    <div class="mb-3 form-check">
                        <!--Este input aplica los estilos visuales de la casilla de verificación 
                        y el id permite asociarlo a la etiqueta correspondiente-->
                        <input type="checkbox" class="form-check-input" id="condiciones">
                        <!-- Etiqueta que presenta el texto junto al checkbox. El atributo 'for' 
                        vincula el label con el input mediante su 'id', lo que permite marcar el checkbox al hacer clic en el texto. -->
                        <label class="form-check-label" for="condiciones">Acepto las condiciones de privacidad</label>
                    </div>
                    <button type="submit" class="btn btn-primary" id="enviarFormulario"> Enviar </button>
                    <button type="reset" class="btn btn-secundary" id="limpiarFormulario"> Limpiar </button> <br><br>
                </form>
            </div>

            <!---Se define un div que alberga el footer, es manipulado a través de un archivo de php-->
            <div id="footer">
            <?php 
            include_once('../footer.php')
            ?>
            </div>
    
            <!--Se agregan los enlaces de Bootstrap y Javascript necesarios para llamar a las funcionalidades de la pagina-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
            <script src="../public/javascript/navbarUtil.js"> </script>
            <script src="../public/javascript/presupuesto.js"></script>
    </body>
</html>
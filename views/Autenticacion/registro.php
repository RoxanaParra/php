<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea tus Momentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/estilos.css">
</head>
<body>
    
<!--El siguiente div define un contenedor preparado para albergar una barra de navegación, 
        esté div puede ser manipulado a través de php-->
        
        <div id="navbar" class="nav">
            <?php
                include_once('../../navbar.php')
            ?>
        </div>

        <div class="EspacioDebajoDelNavbar"></div>

 
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Registro de Usuario</h3>
                </div>
                  <div class="card-body">
                    <div class="container">
                    <form method="post" action="../../core/auth/registro.php"> 
                        <!-- Nombre -->
                         <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <!-- Apellidos -->
                         <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                             <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                            </div>
                            <!-- Nombre de Usuario -->
                         <div class="mb-3">
                            <label for="nombreUsuario" class="form-label">Nombre de Usuario</label>
                             <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required>
                            </div>
                            <!-- Email -->
                             <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <!-- Teléfono -->
                             <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <!-- Fecha de Nacimiento -->
                             <div class="mb-3">
                                <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                            </div>
                            <!-- Dirección -->
                             <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                            <!-- Sexo -->
                             <div class="mb-3">
                                <label class="form-label">Sexo</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexo" id="sexoMasculino" value="M" required>
                                     <label class="form-check-label" for="sexoMasculino">Masculino</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexoFemenino" value="F" required>
                                        <label class="form-check-label" for="sexoFemenino">Femenino</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <!-- Botón de Registro -->
                                 <button type="submit" class="btn btn-primary w-100">Registrar</button>
                                 <div class="card-body" id="Centrar">
                                    <a href="#" class="card-link custom-link">Registrarse como Admin</a>
                                </div>
                            </form>
                    </div>
                  </div>
            </div>
        </div>

 <!---Se define un div que alberga el footer, es manipulado a través de un archivo de php-->
        
 <div id="footer">
        <?php include_once('../../footer.php') ?>
    </div>
        
        <!--Se agregan los enlaces de Bootstrap necesarios para llamar a las funcionalidades de la pagina-->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="public/javascript/navbarUtil.js"> </script>
    </body>
</html>

 
    
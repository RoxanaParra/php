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

            <?php
                if(isset($_SESSION['error'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                    unset($_SESSION['error']);
                }
            ?>

                <div class="card-body">
                    <div class="container">
                        <form method="POST" action="../../core/controladores/UsuariosControlador.php" enctype="multipart/form-data" class="row g-3">
                        <!-- Nombre de Usuario -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                                <span id="errorNombre" class="error text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                                <span id="errorApellidos" class="error text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <span id="errorEmail" class="error text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                                <span id="errorTelefono" class="error text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_de_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_de_nacimiento" name="fecha_de_nacimiento" required>
                                <span id="errorFecha" class="error text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="sexo" class="form-label">Sexo</label>
                                <select class="form-select" id="sexo" name="sexo" required>
                                    <option value="" selected>Seleccione un sexo</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                                <span id="errorSexo" class="error text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span id="errorPassword" class="error text-danger"></span>
                            </div>
                            <div class="col-12 text-center">
                                <input type="hidden" name="method" value="register">
                                <button type="submit" class="btn btn-primary w-100">Registrar Usuario</button>
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
        <script src="../../public/javascript/registroUtil.js"></script>
    </body>
</html>

 
    
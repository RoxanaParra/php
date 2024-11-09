<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea tus momentos</title>
    <!-- Cargar CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/estilos.css">
</head>
<body>

    <!-- Navbar -->
    <div id="navbar" class="nav">
        <?php include_once('../../navbar.php') ?>
    </div>

    <div class="EspacioDebajoDelNavbar"></div>

    <div class="banner">
        <div class="overlay"></div>
        <div class="container mt-5" id="espacio">
            <div class="card mx-auto shadow-lg">
                <div class="card-header">
                    <h2 class="TituloAcceso">Iniciar Sesión</h2>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center mb-3">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" href="#">Iniciar Sesión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="registro.php">Registrarse</a>            
                            </li>
                        </ul>
                    </div>
                    <p class="card-text text-center">Ingrese sus credenciales para acceder a su cuenta.</p>
                    <form>
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="emailInput" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Contraseña</label>
                            <input type="password" id="passwordInput" class="form-control" required>
                            <div id="passwordHelpBlock" class="form-text">
                                Su contraseña debe tener entre 8 y 20 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales ni emojis.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                    </form>
                </div>
                <div class="card-body" id="Centrar">
                    <a href='#' class="card-link">Olvide mi Contraseña</a>
                </div>
            </div>
        </div>
    </div>

   
    <div id="footer">
        <?php include_once('../../footer.php') ?>
    </div>

    <!-- Cargar JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>


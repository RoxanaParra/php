<?php 

function ObtenerRutas() {
    $url = $_SERVER['REQUEST_URI'];
    $route = explode('/', trim($url, '/')); // Elimina posibles '/' al inicio o al final.

    // Determinamos si estamos en views o más profundo
    if (in_array('views', $route)) {
        $depth = count($route) - array_search('views', $route) - 1;
    } else {
        $depth = 0;
    }

    // Calculamos el prefijo para rutas relativas según la profundidad
    $prefix = str_repeat('../', $depth);

    // Definimos las rutas
    $definedRoutes = [
        $prefix . 'index.php',
        $prefix . 'views/galeria.php',
        $prefix . 'views/presupuesto.php',
        $prefix . 'views/contacto.php',
        $prefix . 'views/noticias/noticias.php',           // Página principal de Noticias
        $prefix . 'views/citas/citas.php',                 // Página principal de Citas
        $prefix . 'views/usuarios/usuarios.php',           // Página principal de Usuarios
        $prefix . 'views/autenticacion/acceso.php',        // Página principal de Acceso
        $prefix . 'views/usuarios/perfil.php',            // Página de perfil de usuario
        $prefix . 'core/controladores/UsuariosControlador.php'
    ];

    return $definedRoutes;
}

function ObtenerLogo() {
    $url = $_SERVER['REQUEST_URI'];
    $route = explode('/', trim($url, '/'));
    
    // Determinamos si estamos en views o más profundo
    if (in_array('views', $route)) {
        $depth = count($route) - array_search('views', $route) - 1;
    } else {
        $depth = 0;
    }

    // Calculamos la ruta relativa para el logo
    $prefix = str_repeat('../', $depth);
    return $prefix . 'public/imagenes/logo.png';
}

?>

<?php

session_start();

$routes = ObtenerRutas();
$logo = ObtenerLogo();

?>
    <nav class="navbar navbar-expand-lg bg-light navbar-fixed">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?php echo $logo; ?>" alt="Logo" width="100" height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> <!-- Alineación derecha -->
                    <li class="nav-item">
                        <a class="nav-link" id="nav-inicio" href="<?php echo $routes[0]; ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-galeria" href="<?php echo $routes[1]; ?>">Galería</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-presupuesto" href="<?php echo $routes[2]; ?>">Presupuesto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-contacto" href="<?php echo $routes[3]; ?>">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-noticias" href="<?php echo $routes[4]; ?>">Noticias</a>
                    </li>
                    <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-citas" href="<?php echo $routes[5]; ?>">Citas</a>
                    </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['rol'] === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-usuarios" href="<?php echo $routes[6]; ?>">Usuarios</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <span class="navbar-text">

                    <?php if (!isset($_SESSION['user'])): ?>
                        <a class="btn btn-primary" id="login-button" href="<?php echo $routes[7]; ?>">Acceso</a>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Opciones
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><?php echo ucfirst($_SESSION['user']['usuario']); ?></a></li>
                                <li><a class="dropdown-item" href="<?php echo $routes[8]; ?>">Perfil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <form action="<?php echo $routes[9]; ?>" method="POST">
                                    <li>
                                        <input type="hidden" name="method" value="logout">
                                        <button class="dropdown-item" type="submit">Cerrar Sesión</button>
                                    </li>
                                </form>
                            </ul>
                        </li>
                    <?php endif; ?>
                </span>
            </div>
        </div>
    </nav>

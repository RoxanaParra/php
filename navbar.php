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
        $prefix . 'views/autenticacion/acceso.php',         // Página principal de Acceso

        // Rutas adicionales para los archivos dentro de cada sección
        // Noticias (3 archivos adicionales)
        $prefix . 'views/noticias/crearNoticia.php',
        $prefix . 'views/noticias/mostrarNoticia.php',
        $prefix . 'views/noticias/editarNoticia.php',

        // Citas (3 archivos adicionales)
        $prefix . 'views/citas/crearCita.php',
        $prefix . 'views/citas/mostrarCita.php',
        $prefix . 'views/citas/editarCita.php',

        // Usuarios (3 archivos adicionales)
        $prefix . 'views/usuarios/crearUsuario.php',
        $prefix . 'views/usuarios/mostrarUsuario.php',
        $prefix . 'views/usuarios/editarUsuario.php'
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

function renderNavbar() { 
    session_start();

    $routes = ObtenerRutas();
    $logo = ObtenerLogo();

    return "
    <nav class='navbar navbar-expand-lg bg-light navbar-fixed'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='#'>
                <img src='$logo' alt='Logo' width='100' height='100'>
            </a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav ms-auto mb-2 mb-lg-0'> <!-- Alineación derecha -->
                    <li class='nav-item'>
                        <a class='nav-link' id='nav-inicio' href='$routes[0]'>Inicio</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' id='nav-galeria' href='$routes[1]'>Galería</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' id='nav-presupuesto' href='$routes[2]'>Presupuesto</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' id='nav-contacto' href='$routes[3]'>Contacto</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' id='nav-noticias' href='$routes[4]'>Noticias</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' id='nav-citas' href='$routes[5]'>Citas</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' id='nav-usuarios' href='$routes[6]'>Usuarios</a>
                    </li>
                </ul>
                <span class='navbar-text'>
                    " . (!isset($_SESSION['user']) ? "<a class='btn btn-primary' id='login-button' href='" . $routes[7] . 
                    "'>Acceso</a>" : '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">'.$_SESSION['user']['usuario'].'</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <form action="core/controladores/UsuariosControlador.php" method="POST">
                                    <li>
                                        <input type="hidden" name="action" value="logout">
                                        <button class="dropdown-item" type="submit">Logout</button>
                                    </li>
                                </form>
                            </ul>
                        </li>') . "
                    </span>
                </span>
            </div>
        </div>
    </nav>";
}

echo renderNavbar();
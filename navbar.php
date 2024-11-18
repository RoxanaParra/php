<?php 

function ObtenerRutas() {
    $url = $_SERVER['REQUEST_URI'];
    $route = explode('/', trim($url, '/')); // Elimina posibles '/' al inicio o al final.

    // Determinamos si estamos en `views` o más profundo
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
        $prefix . 'views/noticias/noticias.php',
        $prefix . 'views/citas/citas.php',
        $prefix . 'views/usuarios/usuarios.php',
        $prefix . 'views/autenticacion/acceso.php'
    ];

    return $definedRoutes;
}

function ObtenerLogo() {
    $url = $_SERVER['REQUEST_URI'];
    $route = explode('/', trim($url, '/'));
    
    // Determinamos si estamos en `views` o más profundo
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
    $routes = ObtenerRutas();
    $logo = ObtenerLogo();
    
    return "<nav class='navbar navbar-expand-lg bg-light navbar-fixed'>
            <div class='container-fluid'>
                <a class='navbar-brand' href='#'>
                    <img src='$logo' alt='Logo' width='100' height='100'>
                </a>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                        <li class='nav-item'>
                            <a class='nav-link' id='nav-inicio' href='{$routes[0]}'>Inicio</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' id='nav-galeria' href='{$routes[1]}'>Galería</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' id='nav-presupuesto' href='{$routes[2]}'>Presupuesto</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' id='nav-contacto' href='{$routes[3]}'>Contacto</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' id='nav-noticias' href='{$routes[4]}'>Noticias</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' id='nav-citas' href='{$routes[5]}'>Citas</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' id='nav-usuarios' href='{$routes[6]}'>Usuarios</a>
                        </li>
                    </ul>
                    <span class='navbar-text'>
                        <a class='btn btn-primary' id='Acceder-button' href='{$routes[7]}'>Acceder</a>
                    </span>
                </div>
            </div>
        </nav>";
}

echo renderNavbar(); 

?>

<?php 

function ObtenerRutas() {
    $url = $_SERVER['REQUEST_URI'];
    $route = explode('/', trim($url, '/'));

    // Determina la profundidad actual
    if (in_array('views', $route)) {
        $depth = count($route) - array_search('views', $route) - 1;
    } else {
        $depth = 0;
    }

    $prefix = str_repeat('../', $depth);

    return [
        'index' => $prefix . 'index.php',
        'galeria' => $prefix . 'views/galeria.php',
        'presupuesto' => $prefix . 'views/presupuesto.php',
        'contacto' => $prefix . 'views/contacto.php',
        'noticias' => $prefix . 'views/noticias/noticias.php',
        'crearNoticia' => $prefix . 'views/noticias/crearNoticia.php',
        'editarNoticia' => $prefix . 'views/noticias/editarNoticia.php',
        'citas' => $prefix . 'views/citas/citas.php',
        'crearCita' => $prefix . 'views/citas/crearCita.php',
        'editarCita' => $prefix . 'views/citas/editarCita.php',
        'usuarios' => $prefix . 'views/usuarios/usuarios.php',
        'crearUsuario' => $prefix . 'views/usuarios/crearUsuario.php',
        'editarUsuario' => $prefix . 'views/usuarios/editarUsuario.php',
        'acceso' => $prefix . 'views/autenticacion/acceso.php',
    ];
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
                            <a class='nav-link' href='{$routes['index']}'>Inicio</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='{$routes['galeria']}'>Galería</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='{$routes['presupuesto']}'>Presupuesto</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='{$routes['contacto']}'>Contacto</a>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                Noticias
                            </a>
                            <ul class='dropdown-menu'>
                                <li><a class='dropdown-item' href='{$routes['noticias']}'>Ver Noticias</a></li>
                                <li><a class='dropdown-item' href='{$routes['crearNoticia']}'>Crear Noticia</a></li>
                                <li><a class='dropdown-item' href='{$routes['editarNoticia']}'>Editar Noticia</a></li>
                            </ul>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                Citas
                            </a>
                            <ul class='dropdown-menu'>
                                <li><a class='dropdown-item' href='{$routes['citas']}'>Ver Citas</a></li>
                                <li><a class='dropdown-item' href='{$routes['crearCita']}'>Crear Cita</a></li>
                                <li><a class='dropdown-item' href='{$routes['editarCita']}'>Editar Cita</a></li>
                            </ul>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                Usuarios
                            </a>
                            <ul class='dropdown-menu'>
                                <li><a class='dropdown-item' href='{$routes['usuarios']}'>Ver Usuarios</a></li>
                                <li><a class='dropdown-item' href='{$routes['crearUsuario']}'>Crear Usuario</a></li>
                                <li><a class='dropdown-item' href='{$routes['editarUsuario']}'>Editar Usuario</a></li>
                            </ul>
                        </li>
                    </ul>
                    <span class='navbar-text'>
                        <a class='btn btn-primary' href='{$routes['acceso']}'>Acceder</a>
                    </span>
                </div>
            </div>
        </nav>";

}

echo renderNavbar(); 

?>
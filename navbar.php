<?php 

function ObtenerRutas() {
    $url = $_SERVER['REQUEST_URI'];
    $route = explode('/', $url);

    // Determinamos el contexto actual en función de la ruta
    if (in_array('noticias', $route)) {
        $context = 'noticias';
    } elseif (in_array('citas', $route)) {
        $context = 'citas';
    } elseif (in_array('usuarios', $route)) {
        $context = 'usuarios';
    } elseif (in_array('autenticacion', $route)) {
        $context = 'autenticacion';
    } elseif (in_array('views', $route)) {
        $context = 'views';
    } else {
        $context = 'default';
    }

    // Asignamos las rutas correspondientes en función del contexto
    switch ($context) {
        case 'noticias':
            $definedRoutes = [
                '../../index.php',
                '../galeria.php',
                '../presupuesto.php',
                '../contacto.php',
                'crearNoticia.php',
                'editarNoticia.php',
                'mostrarNoticia.php',
                'noticias.php'
            ];
            break;
        case 'citas':
            $definedRoutes = [
                '../../index.php',
                '../galeria.php',
                '../presupuesto.php',
                '../contacto.php',
                'crearCita.php',
                'editarCita.php',
                'mostrarCita.php',
                'citas.php'
            ];
            break;
        case 'usuarios':
            $definedRoutes = [
                '../../index.php',
                '../galeria.php',
                '../presupuesto.php',
                '../contacto.php',
                'crearUsuario.php',
                'editarUsuario.php',
                'mostrarUsuario.php',
                'usuarios.php'
            ];
            break;
        case 'autenticacion':
            $definedRoutes = [
                '../../index.php',
                '../galeria.php',
                '../presupuesto.php',
                '../contacto.php',
                '../noticias/noticias.php',
                '../citas/citas.php',
                '../usuarios/usuarios.php',
                'acceso.php'
            ];
            break;
        case 'views':
            $definedRoutes = [
                '../index.php',
                'galeria.php',
                'presupuesto.php',
                'contacto.php',
                'noticias/noticias.php',
                'citas/citas.php',
                'usuarios/usuarios.php',
                'autenticacion/acceso.php'
            ];
            break;
        default:
            $definedRoutes = [
                'index.php',
                'views/galeria.php',
                'views/presupuesto.php',
                'views/contacto.php',
                'views/noticias/noticias.php',
                'views/citas/citas.php',
                'views/usuarios/usuarios.php',
                'views/autenticacion/acceso.php'
            ];
            break;
    }

    return $definedRoutes;
}

function ObtenerLogo() {
    $url = $_SERVER['REQUEST_URI'];
    $route = explode('/', $url);

    $arrayContainsViews = in_array('views', $route);
    $arrayContainsLevel2 = in_array('autenticacion', $route) || 
                           in_array('noticias', $route) || 
                           in_array('citas', $route) || 
                           in_array('usuarios', $route);

    $logo = 'public/imagenes/logo.png'; // Valor por defecto

    if ($arrayContainsViews) {
        $logo = '../public/imagenes/logo.png';
    } elseif ($arrayContainsLevel2) {
        $logo = '../../public/imagenes/logo.png';
    }

    return $logo;
}


function renderNavbar() { 
    $routes = ObtenerRutas();
    $logo = ObtenerLogo();
    
    return "<nav class='navbar navbar-expand-lg bg-light navbar-fixed'>
            <div class='container-fluid'>
                <a class='navbar-brand' href='#'>
                    <img src='$logo' alt='Logo' width='100' height='100'>
                </a>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
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
                    <a class='btn btn-primary' id='Acceder-button' href='$routes[7]'>Acceder</a>
                    </span>
                </div>
            </div>
        </nav>";
}

echo renderNavbar(); 

?>

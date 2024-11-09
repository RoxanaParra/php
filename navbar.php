<?php 

function ObtenerRutas() {
    $url = $_SERVER['REQUEST_URI'];

    $route = explode('/', $url);

    $arrayContainsViews = in_array('views', $route);
    $arrayContainsAutenticacion = in_array('Autenticacion', $route);

    if ($arrayContainsViews) {
        $definedRoutes = [
            '../index.php',
            'galeria.php',
            'presupuesto.php',
            'contacto.php',
            'Autenticacion/acceso.php'
        ];
    } else {
        $definedRoutes = [
            'index.php',
            'views/galeria.php',
            'views/presupuesto.php',
            'views/contacto.php',
            'views/Autenticacion/acceso.php'
        ];
    }

    if ($arrayContainsAutenticacion) {
        $definedRoutes = [
            '../../index.php',
            '../galeria.php',
            '../presupuesto.php',
            '../contacto.php',
            'acceso.php'
        ];
    }

    return $definedRoutes;
}

function ObtenerLogo() {
    $url = $_SERVER['REQUEST_URI'];

    $route = explode('/', $url);

    $arrayContainsViews = in_array('views', $route);
    $arrayContainsAutenticacion = in_array('Autenticacion', $route);

    $logo = 'public/imagenes/logo.png';

    if ($arrayContainsViews) {
        $logo = '../public/imagenes/logo.png';
    }

    if ($arrayContainsAutenticacion) {
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
                    </ul>

                    <span class='navbar-text'>
                    <a class='btn btn-primary' id='Acceder-button' href='$routes[4]'>Acceder</a>
                    </span>
                </div>
            </div>
        </nav>";
}

echo renderNavbar(); 
?>

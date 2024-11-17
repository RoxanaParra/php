<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <!-- Cargar CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/estilos.css">
</head>
<body>

<!-- Barra de navegación -->
<div id="navbar" class="nav">
    <?php include_once('../../navbar.php') ?>
</div>

<div class="EspacioDebajoDelNavbar"></div>

<!-- Contenedor de usuarios -->
<div class="container">
    <h2 class="text-center mt-5 mb-5">Gestión de Usuarios</h2>
    <div class="row">

    <?php
    include_once('../../core/controladores/UsuariosControlador.php');

    // Obtener lista de usuarios
    $usuarios = obtenerUsuarios();  // Función para obtener todos los usuarios
    foreach ($usuarios as $usuario) {
        echo "
        <div class='col-md-6 col-lg-4 mb-4'>
            <div class='card shadow-sm'>
                <div class='card-body'>
                    <h5 class='card-title text-dark mb-3'>" . htmlspecialchars($usuario['nombre']) . "</h5>
                    <p class='card-text text-muted'>Rol: " . htmlspecialchars($usuario['rol']) . "</p>
                    <p class='text-muted mb-4'><small>Usuario ID: " . htmlspecialchars($usuario['id']) . "</small></p>
                    <div class='d-flex justify-content-between align-items-center'>
                        <a href='verUsuario.php?id=" . htmlspecialchars($usuario['id']) . "' class='btn btn-outline-primary btn-sm'>Ver Detalles</a>";

                        // Si el usuario es Administrador, mostrar opción para eliminar
                        if ($usuario['rol'] == 'Administrador') {
                            echo "<button class='btn btn-danger btn-sm' disabled>Acción no disponible</button>";
                        } else {
                            // Solo los administradores pueden eliminar usuarios
                            echo "
                            <form action='../../core/controladores/UsuariosControlador.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='method' value='delete'>
                                <input type='hidden' name='idUsuario' value='" . htmlspecialchars($usuario['id']) . "'>
                                <button type='submit' class='btn btn-danger btn-sm'>Eliminar Usuario</button>
                            </form>";
                        }
                    echo "</div>
                </div>
            </div>
        </div>";
    }
    ?>

    </div>
</div>

<!-- Footer -->
<div id="footer">
    <?php include_once('../../footer.php') ?>
</div>

<!-- Cargar JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>

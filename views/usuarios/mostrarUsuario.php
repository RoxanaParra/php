<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Usuario</title>
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

    <div class="container mt-5">
        <?php
        // Obtener el ID del usuario desde la URL
        $idUsuario = isset($_GET['id']) ? $_GET['id'] : null;

        if ($idUsuario) {
            include_once('../../core/controladores/UsuariosControlador.php');
            $usuario = obtenerUsuarioPorId($idUsuario); // Función para obtener los datos del usuario por su ID

            if ($usuario) {
                ?>
                <div class="card shadow-lg">
                    <div class="card-body">
                        <!-- Nombre del Usuario -->
                        <h1 class="card-title text-center mb-4"><?php echo htmlspecialchars($usuario['username']); ?></h1>

                        <!-- Correo Electrónico -->
                        <p class="text-muted text-center">
                            <small>
                                Correo: <?php echo htmlspecialchars($usuario['email']); ?>
                            </small>
                        </p>

                        <!-- Rol del Usuario -->
                        <p class="text-center mt-4">
                            <span class="badge <?php echo $usuario['role'] === 'admin' ? 'bg-success' : 'bg-primary'; ?>">
                                <?php echo htmlspecialchars(ucfirst($usuario['role'])); ?>
                            </span>
                        </p>

                        <!-- Fecha de Creación -->
                        <?php if (!empty($usuario['fecha_creacion'])): ?>
                            <p class="text-muted text-center mt-2">
                                <small>Creado el: <?php echo htmlspecialchars($usuario['fecha_creacion']); ?></small>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            } else {
                echo "<div class='alert alert-danger text-center'>No se encontró el usuario seleccionado.</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'>No se proporcionó un ID válido para el usuario.</div>";
        }
        ?>
    </div>

    <!-- Footer -->
    <div id="footer">
        <?php include_once('../../footer.php') ?>
    </div>

    <!-- Enlaces de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>

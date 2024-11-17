<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <!-- Cargar CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/estilos.css">
</head>
<body>

<!-- Barra de Navegación -->
<div id="navbar" class="nav">
    <?php include_once('../../navbar.php') ?>
</div>

<div class="EspacioDebajoDelNavbar"></div>

<!-- Contenedor Principal -->
<div class="container mt-5">
    <div class="card shadow-lg">
        <h3 class="text-center p-3">Crear nuevo Usuario</h3>
        <div class="card-body">
            <form method="POST" action="../../core/controladores/UsuariosControlador.php" enctype="multipart/form-data">
                <!-- Nombre de Usuario -->
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de Usuario:</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Nombre de usuario" required>
                </div>

                <!-- Correo Electrónico -->
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="correo@ejemplo.com" required>
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>

                <!-- Selección de Rol -->
                <div class="mb-3">
                    <label for="role" class="form-label">Rol:</label>
                    <select id="role" name="role" class="form-select" required>
                        <option value="" selected>Seleccionar rol</option>
                        <option value="admin">Administrador</option>
                        <option value="user">Usuario</option>
                    </select>
                </div>

                <input type="hidden" name="method" value="store">

                <!-- Botón de Enviar -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Crear Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Pie de Página -->
<div id="footer">
    <?php include_once('../../footer.php') ?>
</div>

<!-- Cargar JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>

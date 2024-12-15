<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <!-- Cargar CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/estilos.css">
</head>
<body>

<!-- Barra de Navegación -->
<div id="navbar" class="nav">
    <?php include_once ('../../navbar.php') ?>
</div>

<?php
include_once __DIR__ . '/../../core/controladores/UsuariosControlador.php';

// Validar y obtener el ID de usuario desde la URL
$parsedUrl = parse_url($_SERVER['REQUEST_URI']);
$queryParams = isset($parsedUrl['query']) ? explode('&', $parsedUrl['query']) : [];
$userId = null;

if (!empty($queryParams)) {
    $parts = explode('=', $queryParams[0]);
    $userId = $parts[1] ?? null;
}

if (!$userId) {
    echo "<p class='text-danger'>ID de usuario no válido.</p>";
    exit;
}

// Obtener el usuario
$user = mostrarUsuario($userId);

if (!$user) {
    echo "<p class='text-danger'>Usuario no encontrado.</p>";
    exit;
}
?>


<script>
    const idUser = <?= $userId ?>;

    console.log(idUser);
</script>

<div class="EspacioDebajoDelNavbar"></div>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-body">
            <form method="POST" action="../../core/controladores/UsuariosControlador.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required value="<?= $user['nombre'] ?>">
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" required value="<?= $user['apellidos'] ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required value="<?= $user['email'] ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required value="<?= empty($user['password']) ? '' : $user['password'] ?>">
                </div>
                <div class="mb-3">
                    <label for="nickname" class="form-label">Alias</label>
                    <input type="text" class="form-control" id="nickname" name="usuario" required value="<?= $user['usuario'] ?>">
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required value="<?= $user['direccion'] ?>">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required value="<?= $user['telefono'] ?>">
                </div>
                <div class="mb-3">
                    <label for="fecha_de_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_de_nacimiento" name="fecha_de_nacimiento" required value="<?= $user['fecha_de_nacimiento'] ?>">
                </div>
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-select" id="rol" name="rol">
                        <option value="admin" <?= $user['rol'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
                        <option value="user" <?= $user['rol'] == 'user' ? 'selected' : '' ?>>Usuario</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select class="form-select" id="sexo" name="sexo">
                        <option value="M" <?= $user['sexo'] == 'M' ? 'selected' : '' ?>>Masculino</option>
                        <option value="F" <?= $user['sexo'] == 'F' ? 'selected' : '' ?>>Femenino</option>
                    </select>
                </div>
                <input type="hidden" name="method" value="update">
                <input type="hidden" name="idUser" value="<?= $userId ?>">

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                    <a href="../../views/usuarios/usuarios.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Pie de Página -->
<div id="footer">
    <?php include_once('../../footer.php') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>

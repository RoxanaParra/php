<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Asegúrate de incluir tu CSS -->
</head>
<body>
    <div class="container">
        <h1>Registro de Usuario</h1>
        <form method="post" action="../../core/controladores/CitasControlador.php">
            <!-- Nombre -->
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <select class="form-select" id="usuario" name="usuario" required>
                    <option value="">Seleccionar usuario</option>
                    <option value=4>Pedro Perez</option>
                    <option value=5>Ana Gomez</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Fecha de la Cita</label>
                <input type="date" class="form-control" id="fecha_cita" name="fecha" required>
            </div>

            <div class="mb-3">
                <label for="motivoCita" class="form-label">Motivo de la Cita</label>
                <textarea class="form-control" id="motivo_cita" name="motivo" required></textarea>
            </div>

            <!-- ... resto del formulario ... -->
            <button type="submit" class="btn btn-primary w-100">Registrar</button>
            <div class="card-body" id="Centrar">
                <a href="#" class="card-link custom-link">Registrarse como Admin</a>
            </div>
        </form>
    </div>
</body>
</html>
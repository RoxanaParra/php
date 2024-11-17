<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cita</title>
    <!-- Cargar CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/estilos.css">
</head>
<body>

<!--El siguiente div define un contenedor preparado para albergar una barra de navegación, 
        esté div puede ser manipulado a través de php-->

        <div id="navbar" class="nav">
        <?php include_once('../../navbar.php') ?>
    </div>

    <div class="EspacioDebajoDelNavbar"></div>
    <div class="container">
        <h1 class="text-center">Crear Cita</h1>
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

            <button type="submit" class="btn btn-primary w-100">Registrar</button>
        
        </form>
    </div>

 <!---Se define un div que alberga el footer, es manipulado a través de un archivo de php-->
        
 <div id="footer">
        <?php include_once('../../footer.php') ?>
    </div>

    <!-- Cargar JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>
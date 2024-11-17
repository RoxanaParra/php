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
    <!-- Contenedor Principal -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                        <h4 class="text-center">Editar Cita</h4>
                    <div class="card-body">
                        <form method="post" action="../../core/controladores/CitasControlador.php">
                            <!-- Selección de Usuario -->
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuario</label>
                                <select class="form-select" id="usuario" name="usuario" required>
                                    <option value="" selected>Seleccionar usuario</option>
                                    <option value="4">Pedro Pérez</option>
                                    <option value="5">Ana Gómez</option>
                                </select>
                            </div>

                            <!-- Fecha de la Cita -->
                            <div class="mb-3">
                                <label for="fecha_cita" class="form-label">Fecha de la Cita</label>
                                <input type="date" class="form-control" id="fecha_cita" name="fecha" required>
                            </div>

                            <!-- Motivo de la Cita -->
                            <div class="mb-3">
                                <label for="motivo_cita" class="form-label">Motivo de la Cita</label>
                                <textarea class="form-control" id="motivo_cita" name="motivo" rows="4" placeholder="Escriba el motivo de la cita..." required></textarea>
                            </div>

                            <!-- Botón Registrar -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

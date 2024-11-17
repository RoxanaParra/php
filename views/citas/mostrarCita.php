<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Cita</title>
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
        // Obtener el ID de la cita desde la URL
        $idCita = isset($_GET['id']) ? $_GET['id'] : null;

        if ($idCita) {
            include_once('../../core/controladores/CitasControlador.php');
            $cita = obtenerCitaPorId($idCita); // Función para obtener los datos de la cita por su ID

            if ($cita) {
                ?>
                <div class="card shadow-lg">
                    <div class="card-body">
                        <!-- Cita -->
                        <h1 class="card-title text-center mb-4"><?php echo htmlspecialchars($cita['cita']); ?></h1>

                        <!-- Autor -->
                        <p class="text-muted text-center">
                            <small>
                                - <?php echo htmlspecialchars($cita['autor']); ?> -
                            </small>
                        </p>

                        <!-- Contexto de la cita -->
                        <p class="card-text mt-4"><?php echo nl2br(htmlspecialchars($cita['contexto'])); ?></p>

                        <!-- Fuente -->
                        <?php if (!empty($cita['fuente'])): ?>
                            <p class="text-muted mt-2">
                                <small>Fuente: <?php echo htmlspecialchars($cita['fuente']); ?></small>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            } else {
                echo "<div class='alert alert-danger text-center'>No se encontró la cita seleccionada.</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'>No se proporcionó un ID válido para la cita.</div>";
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

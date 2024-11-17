<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Citas Registradas</title>
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
    
    <!-- Contenedor de citas -->
    <div class="container">
        <h2 class="text-center mt-5 mb-5">Lista de Citas Registradas</h2>
        <div class="row">

        <?php
        include_once('../../core/controladores/CitasControlador.php');

        $citas = index(); // Asegúrate de que la función 'index()' en el controlador de citas retorne todas las citas.
        foreach ($citas as $cita) {
            echo "
            <div class='col-md-6 col-lg-4 mb-4'>
                <div class='card shadow-sm'>
                    <div class='card-body'>
                        <h5 class='card-title text-dark mb-3'>Cliente: " . htmlspecialchars($cita['nombre']) . "</h5>
                        <p class='card-text'><strong>Fecha:</strong> " . htmlspecialchars($cita['fecha']) . "</p>
                        <p class='card-text'><strong>Hora:</strong> " . htmlspecialchars($cita['hora']) . "</p>
                        <p class='card-text'><strong>Motivo:</strong> " . htmlspecialchars(substr($cita['motivo'], 0, 80)) . "...</p>
                        <div class='d-flex justify-content-between align-items-center'>
                            <a href='verCita.php?id=" . htmlspecialchars($cita['idCita']) . "' class='btn btn-outline-primary btn-sm'>Mostrar</a>
                            <form action='../../core/controladores/CitasControlador.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='method' value='delete'>
                                <input type='hidden' name='idCita' value='" . htmlspecialchars($cita['idCita']) . "'>
                                <button type='submit' class='btn btn-danger btn-sm'>Eliminar</button>
                            </form>
                        </div>
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

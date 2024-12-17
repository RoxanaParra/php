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
    
    <?php
        include_once __DIR__ . '/../../core/controladores/CitasControlador.php';

            // Obtener la lista de citas
            $citasList = index();

            // Asegurarse de que es un array
            if (!is_array($citasList)) {
                $citasList = [];
            }
        ?>
  

        <div class="EspacioDebajoDelNavbar"></div>

        <?php if(isset($_SESSION['error'])): ?>
          <div class="alert alert-danger">
            <?= $_SESSION['error'] ?>
          </div>
          <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div class="container">
        <h2 class="text-center mt-5 mb-5">Citas</h2>
        <div class="grid-container">
            <?php foreach ($citasList as $cita): ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">#<?= htmlspecialchars($cita['idCita']) ?> - Usuario: <?= htmlspecialchars($cita['nombre']) ?> <?= htmlspecialchars($cita['apellidos']) ?></h5>
                        <p class="card-text"><strong>Motivo:</strong> <?= htmlspecialchars($cita['motivo_cita']) ?></p>
                        
                        <div class="d-flex justify-content-between">
                            <a href="../../views/citas/editarCita.php?id=<?= htmlspecialchars($cita['idCita']) ?>" class="btn btn-primary">Editar</a>
                                <form action="../../core/controladores/CitasControlador.php" method="POST">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($cita['idCita']) ?>">
                                    <input type="hidden" name="method" value="delete">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                        </div>
                       
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Fecha: <?= htmlspecialchars($cita['fecha_cita']) ?></small>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

       
        <div class="text-center mt-4">
            <a href="../../views/citas/crearCita.php" class="btn btn-primary">Crear Cita</a>
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

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
        <?php 
            
            include_once('../../navbar.php');

            session_start();

            $activeUser = $_SESSION['user'];
        ?>
    </div>

    <div class="EspacioDebajoDelNavbar"></div>

    <!-- Contenedor Principal -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
      <div class="card" style="width: 30rem;">
        <div class="card-body">    
          <form action="../../core/controladores/CitasControlador.php" method="POST">
            <!-- Campo para el título de la cita -->
            <div class="mb-3">
              <label for="titulo" class="form-label">Título de la Cita</label>
              <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>

            <!-- Campo para la fecha de la cita -->
            <div class="mb-3">
              <label for="fecha_cita" class="form-label">Fecha</label>
              <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" required min="<?php echo date('Y-m-d'); ?>">
            </div>

             <!-- Campo para el id del usuario -->
             <div class="mb-3">
              <label for="idUser" class="form-label">Usuario</label>
              <select class="form-select" id="idUser" name="idUser">
                  <option value="<?= $activeUser['idUser'] ?>"><?= $activeUser['nombre'] ?> <?= $activeUser['apellidos'] ?></option>
              </select>
            </div>

            <!-- Campo para la descripción de la cita -->
            <div class="mb-3">
              <label for="motivo_cita" class="form-label">Motivo</label>
              <textarea class="form-control" id="motivo_cita" name="motivo_cita" required rows="5"></textarea>
            </div>

            <!-- Campo oculto para indicar la acción (crear/almacenar) -->
            <input type="hidden" name="method" value="store">

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Crear Cita</button>
          </form>
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
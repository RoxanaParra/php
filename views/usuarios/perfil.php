<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias sobre Regalos Personalizados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/estilos.css">
</head>
    
    <div id="navbar" class="nav">
            <?php 
                include_once('../../navbar.php');

                $usuarioActual = $_SESSION['user'];
            ?>
        </div>
    <body>

    
    <div class="container d-flex justify-content-center align-items-center" >
        <div class="card" style="width: 18rem;">
    
            <img src="../../public/img/fondo.png" class="card-img-top" alt="...">
            
            <div class="card-body">
                <p>
                    <strong>Nombre de usuario:</strong> <?php echo $usuarioActual["usuario"] ?? 'No definido'; ?>
                </p>
            
                <form action="../../core/auth/profile.php" method="POST">
                    <h5 class="card-title">Editar Perfil</h5>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $usuarioActual["nombre"]; ?>" required><br><br>

                    <label for="apellidos">Apellidos:</label>
                    <input type="text" name="apellidos" id="apellidos" value="<?php echo $usuarioActual["apellidos"]; ?>" required><br><br>

                    <label for="email">Correo electrónico:</label>
                    <input type="email" name="email" id="email" value="<?php echo $usuarioActual["email"]; ?>" required><br><br>

                    <label for="nueva_contrasena">Nueva contraseña:</label>
                    <input type="password" name="nueva_contrasena" id="nueva_contrasena" required><br><br>

                    <button type="submit" name="actualizar">Actualizar perfil</button>
                </form>
            </div>
        </div>
        
        </div>
    </div>
    
    <div id="footer">
        <?php include_once('../../footer.php') ?>
    </div>

        <!--Enlaces de boostraap y de todos los documentos creados en javascript-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    </body>
</html>
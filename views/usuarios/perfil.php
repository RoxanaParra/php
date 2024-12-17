<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
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

    <div class="EspacioDebajoDelNavbarNoticia"></div>

    
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Perfil</h5>
                <p><strong>Nombre de usuario:</strong> <?php echo $usuarioActual["usuario"] ?? 'No definido'; ?></p>

                <form method="POST" action="../../core/controladores/UsuariosControlador.php" class="row g-3">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" 
                               value="<?php echo $usuarioActual["nombre"] ?? ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" 
                               value="<?php echo $usuarioActual["apellidos"] ?? ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="<?php echo $usuarioActual["email"] ?? ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select class="form-select" id="rol" name="rol">
                            <option value="admin" <?php echo $usuarioActual["rol"] === 'admin' ? 'selected' : ''; ?>>Administrador</option>
                            <option value="user" <?php echo $usuarioActual["rol"] === 'user' ? 'selected' : ''; ?> >Usuario</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <input type="hidden" name="idUser" value="<?php echo $usuarioActual['idUser']; ?>">
                    <input type="hidden" name="method" value="updateProfile">

                    <div class="col-12 text-center">
                        <button type="submit" name="actualizar" class="btn btn-primary">Actualizar Perfil</button>
                        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'actualizado'): ?>
                            <div class="alert alert-success" role="alert">
                                Perfil actualizado correctamente.
                            </div>
                        <?php endif; ?>
                    </div>
                </form>
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
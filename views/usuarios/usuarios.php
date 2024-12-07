<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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

<!-- Contenedor de usuarios -->
<div class="container">
    <h2 class="text-center mt-5 mb-5">Gestión de Usuarios</h2>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once __DIR__. '/../../core/controladores/UsuariosControlador.php';
                    $usuarios = indexUsers(); // Función para obtener usuarios desde el controlador
                    foreach ($usuarios as $usuario) {
                        echo '    
                            <tr>
                                <th scope="row">'.$usuario['idUser'].'</th>
                                <td>'.$usuario['nombre'].'</td>
                                <td>'.$usuario['apellidos'].'</td>
                                <td>'.$usuario['fecha_de_nacimiento'].'</td>
                                <td>'.$usuario['direccion'].'</td>
                                <td>'.($usuario['sexo'] == 'M' ? 'Masculino' : 'Femenino').'</td>
                                <td>'.$usuario['telefono'].'</td>
                                <td>'.$usuario['email'].'</td>
                                <td>
                                    <a href="../../views/usuarios/editarUsuario.php?id='.$usuario['idUser'].'" class="btn btn-primary"><i class="fa fa-pencil icon-small"></i></a>
                                    <form action="../../core/controladores/UsuariosControlador.php" method="POST">
                                        <input type="hidden" name="idUser" value="'.$usuario['idUser'].'">
                                        <input type="hidden" name="method" value="delete">
                                        <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash icon-small"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>';
                        }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-12 mb-3">
            <a href="../../views/usuarios/crearUsuario.php" class="btn btn-primary">Crear Usuario</a>
        </div>  
</div>

    ?>

    </div>
</div>

<!-- Footer -->
<div id="footer">
    <?php include_once __DIR__.'/../../footer.php' ?>
</div>

<!-- Cargar JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>

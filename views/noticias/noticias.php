<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias sobre Regalos Personalizados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/estilos.css">
</head>
<body>

        <div id="navbar" class="nav">
            <?php include_once('../../navbar.php') ?>
        </div>

        <?php
        include_once __DIR__ . '/../../core/controladores/NoticiasControlador.php';

        // Obtener la lista de noticias
        $noticiasList = index();

        // Asegurarse de que es un array
        if (!is_array($noticiasList)) {
            $noticiasList = [];
        }
        ?>

<div class="EspacioDebajoDelNavbar"></div>

<div class="container">
    <h2 class="text-center mt-5 mb-5">Noticias</h2>
    <div class="row">
        <div class="container my-5">
            <?php foreach ($noticiasList as $noticias): ?>
                <div class="col">
                    <div class="card h-100">
                        <?php if (!empty($noticias['imagen'])): ?>
                            <img src="<?= htmlspecialchars($noticias['imagen']) ?>" class="card-img-top" alt="Imagen de la noticia">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">#<?= htmlspecialchars($noticias['idNoticia']) ?> - <?= htmlspecialchars($noticias['titulo']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($noticias['texto']) ?></p>
                        </div>
                        <div class="d-flex justify-content-end">
                                    <a href="../../views/noticias/editarNoticia.php?id=<?= htmlspecialchars($noticias['idNoticia']) ?>" class="btn btn-primary me-2">Editar</a>
                                    <form action="../../core/controladores/NoticiasControlador.php" method="POST">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($noticias['idNoticia']) ?>">
                                        <input type="hidden" name="method" value="delete">
                                        
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                            </div>

                            <div class="card-footer">
                                <small class="text-muted">Fecha: <?= htmlspecialchars($noticias['fecha']) ?></small>
                            </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <a href="../../views/noticias/crearNoticia.php" class="btn btn-primary">Crear Noticia</a>
    </div>
</div>

<div id="footer">
    <?php include_once('../../footer.php') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>

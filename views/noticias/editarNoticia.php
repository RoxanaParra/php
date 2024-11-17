<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Noticia</title>
    <!-- Cargar CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/estilos.css">
</head>
<body>

<!-- Barra de Navegación -->
<div id="navbar" class="nav">
    <?php include_once('../../navbar.php') ?>
</div>

<div class="EspacioDebajoDelNavbar"></div>

<!-- Contenedor Principal -->
<div class="container mt-5">
    <div class="card shadow-lg">
        <h3 class="text-center p-3">Editar Noticia</h3>
        <div class="card-body">
            <!-- Formulario de Edición -->
            <form method="POST" action="../../core/controladores/NoticiasControlador.php">
                <!-- Campo Oculto para ID de la Noticia -->
                <input type="hidden" id="idNoticia" name="idNoticia" value="<?= htmlspecialchars($noticia['idNoticia'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

                <!-- Título de la Noticia -->
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título de la Noticia:</label>
                    <input type="text" id="titulo" name="titulo" class="form-control" 
                           value="<?= htmlspecialchars($noticia['titulo'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                </div>

                <!-- Fecha de la Noticia -->
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" class="form-control" 
                           value="<?= htmlspecialchars($noticia['fecha'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                </div>

                <!-- Contenido de la Noticia -->
                <div class="mb-3">
                    <label for="texto" class="form-label">Contenido:</label>
                    <textarea id="texto" name="texto" class="form-control" rows="5" required><?= htmlspecialchars($noticia['contenido'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                </div>

                <!-- Imagen de la Noticia -->
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen:</label>
                    <input type="file" id="imagen" name="imagen" class="form-control" accept="image/*" required>
                    
                    <?php if (!empty($noticia['imagen'])): ?>
                        <small class="form-text">Imagen actual: <?= htmlspecialchars($noticia['imagen'], ENT_QUOTES, 'UTF-8') ?></small>
                    <?php endif; ?>
                </div>

                <input type="hidden" name="method" value="update">
                <input type="hidden" name="id" value="<?php isset($noticia['idNoticia']) ? $noticia['idNoticia'] : '' ?>">

                <!-- Botón de Guardar Cambios -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Pie de Página -->
<div id="footer">
    <?php include_once('../../footer.php') ?>
</div>

<!-- Cargar JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>

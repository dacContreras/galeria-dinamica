<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Css/style.css">
    <title>Galeria</title>
</head>

<body>
    <header>
        <div class="contenedor">
            <h1 class="titulo">Algunas de mis fotos favoritas</h1>
        </div>
    </header>
    <!-- estructura de las fotos -->
    <section class="fotos">
        <div class="contenedor">
             <!-- creamos un ciclo foreach -->
             <!-- dentro del arreglo fotos trae las fotos por separado -->
            <?php foreach ($fotos as $foto) : ?>
                <div class="thumb">
                    <!-- cuando da click envia al archivo foto php de cada uno -->
                    <a href="foto.php?id=<?php echo $foto['id']; ?>">
                        <img src="fotos/<?php echo $foto['imagen']; ?>" alt="<?php echo $foto['titulo']; ?>">
                    </a>
                </div>
            <?php endforeach; ?>
            
            <!-- paginacion -->
            <div class="paginacion">
                <!-- si la pagina actual es ayor a uno muestra el boton -->
                <?php if ($paginaActual > 1) : ?>
                    <a href="index.php?p=<?php echo $paginaActual - 1 ?>" class="izquierda"><i class="bi bi-arrow-left"></i> Pagina Anterior</a>
                <?php endif; ?>
                <!-- si el total de paginas es difernte a la pagina actual muestra el boton -->
                <?php if ($totalPaginas != $paginaActual) : ?>
                    <a href="index.php?p=<?php echo $paginaActual + 1 ?>" class="derecha">Pagina Siguiente <i class="bi bi-arrow-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- footer -->
    <footer>
        <p class="copyright">Galeria Creada por Daniel Contreras </p>
    </footer>
</body>

</html>
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
            <!-- TITULO DE LA FOTO -->
            <h1 class="titulo">Foto:
                <!-- si la imagen tiene titulo lo muetra de lo contrario muestra el nombre de la imagen -->
                <?php if (!empty($foto['titulo'])) {
                    echo $foto['titulo'];
                } else {
                    echo $foto['imagen'];
                } ?></h1>
        </div>
    </header>
    <!-- contenedor que muestra la foto -->
    <div class="contenedor">
        <div class="foto">
            <!-- este php muestra las fotos -->
            <img src="fotos/<?php echo $foto['imagen']; ?>" alt="">
            <!-- muestra el texto de la imagen -->
            <p class="texto"><?php echo $foto['texto']; ?></p>
            <!-- boton de regresar -->
            <a href="index.php" class="regresar"><i class="bi bi-arrow-left"></i>Regresar</a>
        </div>
    </div>
    <footer>
        <p class="copyright">Galeria Creada por Daniel Contreras </p>
    </footer>
</body>

</html>
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
    <!-- titulo de la pagina -->
    <header>
        <div class="contenedor">
            <h1 class="titulo">Subir Foto</h1>
        </div>
    </header>

    <!-- FORMULARIO -->
    <div class="contenedor">
        <!-- enviamos los datos por el metodo pst y hacemos que no puedan inyectar codigo -->
        <form class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data"> 
            <label for="foto">Selecciona tu foto</label>
            <input type="file" name="foto" id="foto">

            <label for="titulo">Titulo de la foto</label>
            <input type="text" name="titulo" id="titulo">

            <label for="texto">Descripcion:</label>
            <textarea name="texto" id="texto" placeholder="Ingresa una descripcion"></textarea>

            <!-- Si ocurre un error lo mostramos -->
            <?php if (isset($error)) : ?>
                <p class="error"><?php echo $error ?></p>
            <?php endif; ?>

            <input type="submit" class="submit" value="subirFoto">
        </form>
    </div>

    <footer>
        <p class="copyright">Galeria Creada por Daniel Contreras</p>
    </footer>
</body>

</html>
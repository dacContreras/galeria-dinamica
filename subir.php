<?php
// accedemos a funciones
require 'funciones.php';

// guardamos la funcion de conectar la funcion
$conexion = conexion('galeria_practica', 'root', '');

// si no hay coneccion matamos la ejecucion
if(!$conexion){
    die();
}

// comprobamos si se enviaron los datos Y que files no este vacio
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)){
    // getimagesize nos retorna un arreglo con las propiedades de la imagen
    $check = @getimagesize($_FILES['foto']['tmp_name']);
    // si es diferetne todo esta correcto
    if($check !== false){
        // aca guardamos las fotos
        $carpetaDestino = 'fotos/';
        // este es el nombre del archivo que vamos a guardar la carpeta fotos
        $archivoSubido = $carpetaDestino . $_FILES['foto']['name'];
        // subimos la fotos con la funcion move_uploaded_file en la carpeta
        move_uploaded_file($_FILES['foto']['tmp_name'], $archivoSubido);

        // creamos el stamente con la consulta
        $statements = $conexion->prepare('INSERT INTO fotos (titulo, imagen, texto) VALUES (:titulo, :imagen, :texto)');

        // ejecutamos la consulta
        $statements->execute(array(
            ':titulo' => $_POST['titulo'],
            ':imagen' => $_FILES['foto']['name'],
            ':texto' => $_POST['texto']
        ));

        // redirigmos al usaurios al index para que vea las fotso
        header('Location: index.php');
    } else {
        // si hay errores mostramos al usuario que esta haciendo mal
        $error = 'el archivo no es una imagen o el archivo es muy pesado';
    }
}

// cargar vista
require 'views/subir.view.php';
<?php
// cargar las funciones
require 'funciones.php';

// iniciamos la conexion
$conexion = conexion('galeria_practica', 'root', '');

// si no hay conexion matamos la ejecucion
if(!$conexion){
    die();
}

// guardamos el id
$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

// si id es false, mandamos a header, osea el usuario no ve la foto y lo redirige a index
if(!$id){
    header('Location: index.php');
}

// creamos la consulta
$statement = $conexion->prepare('SELECT * FROM fotos WHERE id = :id');
// ejecutamos la consulta
$statement->execute(array(':id' => $id));
// guardamos la consulta
$foto = $statement->fetch();

// si no hay foto redirigimos al index
if(!$foto){
    header('Location: index.php');
}

// cargar vista
require 'views/foto.view.php';
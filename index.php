<!-- INFORMACION DE LA BASE DE DATOS -->
<!-- 
    nombre de la base de datos: galeria_practica
    nombre de la tabla: fotos
    nombre de la columna 1: id INT long:11 AUTO INCREMENTE PRIMARY
    nombre de la columna 2: titulo varchar long: 200 no-NULL
    nombre de la columna 3: imagen varchar long: 200 no-NULL
    nombre de la columna 4: texto text no-NULL
 -->

<?php
// pedimos las funciones
require 'funciones.php';

// cantidad de fotos que quiero ver por pagina
$fotosPorPagina = 8;

// revisamos la pagina actual
$paginaActual = (isset($_GET['p']) ? (int)$_GET['p'] : 1);
// nos dice dsde que post traemos los demas post
$inicio = ($paginaActual > 1) ? $paginaActual * $fotosPorPagina - $fotosPorPagina : 0;

// creamos la conexion
$conexion = conexion('galeria_practica', 'root', '');

// si no se conecta matamos la ejecucion
if (!$conexion) {
    die();
}

// iniciamos la consulta sql para traer las fotos
$statament = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM fotos LIMIT $inicio, $fotosPorPagina");

// ejecutamos nuestro stament
$statament->execute();
// guardamos el arreglo
$fotos = $statament->fetchAll();

// si no hay fotos redirigimos al index
if (!$fotos) {
    header('Location: index.php');
}

// iniciamos la consulta
$statament = $conexion->prepare("SELECT FOUND_ROWS() as total_filas");
// ejecutamos la consulta
$statament->execute();
// guardamos la consulta 
$totalPost = $statament->fetch()['total_filas'];

// obtenemos el total de paginas
$totalPaginas = ceil($totalPost / $fotosPorPagina);

// accedemso a la vista
require 'views/index.view.php';

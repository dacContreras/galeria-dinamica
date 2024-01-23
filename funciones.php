<!-- FUNCIONES QUE UTILIZAMOS -->
<?php  
// conecxion base de dtasos
function conexion($tabla, $usuario, $pass){
    try {
        // creamos la conexion
        $conexion = new PDO("mysql:host=localhost;dbname=$tabla", $usuario, $pass);
        // si funciona correctamente retornamos la conexion
        return $conexion;
    } catch (PDOException $e) {
        // si hay un error retornamos fasle
        return false;
    }
}
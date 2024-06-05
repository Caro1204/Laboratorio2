<?php
function getDB(){
    $db = new PDO('mysql:host=localhost;'.'dbname=sistema_universitario;charset=utf8', 'root', '');
    $sentencia = $db->prepare( "select * from materias");
    $sentencia->execute();
    $materias = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $materias;
}



function buscarMaterias($nombre){
    $db = new PDO('mysql:host=localhost;'.'dbname=sistema_universitario;charset=utf8', 'root', '');
    $query = "SELECT * FROM materias WHERE nombre LIKE ?";
    $sentencia = $db->prepare($query);
    $sentencia->execute(["%$nombre%"]);
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
}

function agregarMateria($nombre, $profesor){
    $db = new PDO('mysql:host=localhost;'.'dbname=sistema_universitario;charset=utf8', 'root', '');
    $query = "INSERT INTO materias (nombre, profesor) VALUES (?, ?)";
    $sentencia = $db->prepare($query);
    $sentencia->execute([$nombre, $profesor]);
}
?>
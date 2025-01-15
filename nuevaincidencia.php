<?php

if(isset($_POST["fecha"])){

    session_start();
    include"conexiondb.php";

    $fecha = $_POST["fecha"];
    $descripcion = $_POST["descripcion"];
    $idusuario = $_SESSION["idusuario"];
    $sql = "INSERT INTO incidencias (fecha, descripcion, idusuario) VALUES (:fecha, :descripcion, :idusuario)";
    $stm = $conexion->prepare($sql);
    $stm->bindParam(":idusuario", $idusuario);
    $stm->bindParam(":descripcion", $descripcion);
    $stm->bindParam(":fecha", $fecha);
    $stm->execute();
    $conexion = null;
    header("Location: main.php");

}else{
 
    header("Location: main.php");

}

?>
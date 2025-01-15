<?php

if(isset($_GET["idincidencia"])){

    include"conexiondb.php";

    $idincidencia = $_GET["idincidencia"];
    $sql = "DELETE FROM incidencias WHERE id = :idincidencia";
    $stm = $conexion->prepare($sql);
    $stm->bindParam(":idincidencia", $idincidencia);
    $stm->execute();
    $conexion = null;
    header("Location: main.php");
}else{
    header("Location: main.php");
}

?>
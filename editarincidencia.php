<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
} elseif (!isset($_GET["idincidencia"])) {
    header("Location: main.php");
} else {
    include "conexiondb.php";
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $fecha = $_POST["fecha"];
        $descripcion = $_POST["descripcion"];
        $sql = "UPDATE incidencias SET fecha = :fecha, descripcion = :descripcion WHERE id = :id";
        $stm = $conexion->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->bindParam(":fecha", $fecha);
        $stm->bindParam(":descripcion", $descripcion);
        $stm->execute();
        $conexion = null;
        header("Location: main.php");
    }
    $idincidencia = $_GET["idincidencia"];
    $sql = "select * from incidencias where id = :idincidencia";
    $stm = $conexion->prepare($sql);
    $stm->bindParam(":idincidencia", $idincidencia);
    $stm->execute();
    $incidencia = $stm->fetch(PDO::FETCH_ASSOC);
    if (!$incidencia) {
        header("Location: main.php");
    }
    $conexion = null;
}

include "./partials/cabezera.php";

?>


<section class="contenedorPrincipal">
    <h3>Editar incidencia</h3>
    <div class="incidencias">
        <form action="" method="post" id="formIncidencias">
            <label for="id">ID Incidencia</label>
            <input type="text" name="id" id="id" value="<?php echo $incidencia['id'] ?>" readonly>
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" value="<?php echo $incidencia['fecha'] ?>">
            <label for="descripcion">Descripcion</label>
            <input required type="text" name="descripcion" id="descripcion" value="<?php echo $incidencia['descripcion'] ?>">
            <button action="submit">Editar</button>
        </form>
    </div>
</section>
<?php
include './partials/footer.php';
?>
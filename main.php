<?php

session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

include"conexiondb.php";

$sql = "select * from incidencias";
$result = $conexion->query($sql);

include"./partials/cabezera.php";

?>


        <section class="contenedorPrincipal">
            <h3>Listado incidencias</h3>
            <div class="incidencias">
                <form action="nuevaincidencia.php" method="post" id="formIncidencias">
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" id="fecha" value="">
                    <label for="descripcion">Descripcion</label>
                    <input required type="text" name="descripcion" id="descripcion">
                    <button action="submit">Enviar</button>
                </form>
            </div>
            <div class="lista">
                <table id="tablaIncidencias">
                    <thead>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th>Operaciones</th>
                    </thead>
                    <tbody id="tbodyIncidencias">
                        <?php
                            while ($row = $result->fetch()) {

                                echo"<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['fecha'] . "</td>
                                <td>" . $row['descripcion'] . "</td>
                                <td>
                                    <a href='borrarincidencia.php?idincidencia=".$row['id']."'><i class='fa-solid fa-trash'></i></a>
                                    <a href='editarincidencia.php?idincidencia=".$row['id']."'><i class='fa-solid fa-pen-to-square'></i></a>
                                </td>
                                </tr>";

                            } 
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
<?php
include './partials/footer.php';
?>

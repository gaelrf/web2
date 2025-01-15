<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
} else {
    include "conexiondb.php";
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];
        $fecha = $_POST["fecha"];
        $imagen = $_FILES["imagen"];
        $nombreimagen = $imagen["name"];
        $tipoimagen = $imagen["type"];
        $tamanoimagen = $imagen["size"];
        $tmpimagen = $imagen["tmp_name"];
        $ruta = "./fotos/" . $nombreimagen;
        if ($tipoimagen == "image/jpeg" || $tipoimagen == "image/png" || $tipoimagen == "image/jpg") {
            if ($tamanoimagen <= 1000000) {
                if(move_uploaded_file($tmpimagen, $ruta)){
                $sql = "UPDATE usuarios SET Nombre = :nombre, Apellidos = :apellidos, Usuario = :usuario, Email = :email, Fecha_nacimiento = :fecha, foto_perfil = :imagen WHERE id = :id";
                $stm = $conexion->prepare($sql);
                $stm->bindParam(":id", $id);
                $stm->bindParam(":nombre", $nombre);
                $stm->bindParam(":apellidos", $apellidos);
                $stm->bindParam(":usuario", $usuario);
                $stm->bindParam(":email", $email);
                $stm->bindParam(":fecha", $fecha);
                $stm->bindParam(":imagen", $ruta);
                $stm->execute();
                } else {
                    echo "Error al subir la imagen";
                }
                $conexion = null;
                header("Location: main.php");
            } else {
                echo "El tamaño de la imagen es demasiado grande";
            }
        } else {
            echo "El formato de la imagen no es válido";
        }
    }
    $idusuario = $_SESSION["idusuario"];
    $sql = "select * from usuarios where id = :idusuario";
    $stm = $conexion->prepare($sql);
    $stm->bindParam(":idusuario", $idusuario);
    $stm->execute();
    $usuario = $stm->fetch(PDO::FETCH_ASSOC);
    if (!$usuario) {
        header("Location: main.php");
    }

}

include "./partials/cabezera.php";

?>


<section class="contenedorPrincipal">
    <h3>Datos de Usuario</h3>
    <div class="incidencias">
        <form action="" method="post" id="formUsuario" enctype="multipart/form-data">
            <label for="id">ID Usuario</label>
            <input type="text" name="id" id="id" value="<?php echo $idusuario ?>" readonly>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $usuario['Nombre'] ?>">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo $usuario['Apellidos'] ?>">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" value="<?php echo $usuario['Usuario'] ?>">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $usuario['Email'] ?>">
            <label for="fecha">Fecha de Nacimiento</label>
            <input type="date" name="fecha" id="fecha" value="<?php echo $usuario['Fecha_nacimiento'] ?>">
            <label for="imagen">Imagen de Usuario</label>
            <input type="file" name="imagen" id="imagen" accept="image/*">
            <button action="submit">Editar</button>
        </form>
    </div>
</section>
<?php
include './partials/footer.php';
?>
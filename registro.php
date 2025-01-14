<?php
    session_start();
    if(isset($_POST['usuario'])){

        include('conexiondb.php');

        try {

            $sql = "insert into usuarios (Nombre, Apellidos, Usuario, Email, Fecha_nacimiento, Contraseña)
            values (:nombre, :apellido, :usuario, :email, :fecha_nacimiento, :contrasena)";

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $usuario = $_POST['usuario'];
            $email = $_POST['email'];
            $fecha_nacimiento = $_POST['fecnac'];
            $contrasena = $_POST['password'];

            $prepstm = $conexion->prepare($sql);

            $prepstm->bindParam(':nombre', $nombre);
            $prepstm->bindParam(':apellido', $apellido);
            $prepstm->bindParam(':usuario', $usuario);
            $prepstm->bindParam(':email', $email);
            $prepstm->bindParam(':fecha_nacimiento', $fecha_nacimiento);
            $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
            $prepstm->bindParam(':contrasena', $hashed_password);
            $prepstm->execute();

            echo "Registro insertado";

            $nombre = $_POST['nombre'];


        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

    }
    ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registro.css">
    <title>Web2-Registro</title>
</head>

<body>
    <div>
        <a href="index.php">
            <img src="img/logo.svg" alt="logo">
        </a>
        <form action="" method="post">
            <label for="nombre">
                Nombre
            </label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="apellido">
                Apellidos
            </label>
            <input type="text" id="apellido" name="apellido" required>
            <label for="usuario">
                Usuario
            </label>
            <input type="text" id="usuario" name="usuario" required>
            <label for="email">
                Email
            </label>
            <input type="email" id="email" name="email" required>
            <label for="fecnac">
                Fecha de Nacimiento
            </label>
            <input type="date" id="fecnac" name="fecnac">
            <label for="password">
                Contraseña
            </label>
            <input type="password" id="password" name="password" required>
            <label for="password">
                Repite Contraseña
            </label>
            <input type="password" id="passwordrepeat" required>
            <span id="aviso">*Las contraseñas deben de ser iguales</span>
            <button type="submit" id="registrar" disabled>Registrarse</button>
            <a href="login.php">Logearse</a>
        </form>
    </div>
    <script src="js/registro.js"></script>
</body>

</html>
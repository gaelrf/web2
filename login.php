<?php
if(isset($_POST['usuario'])){
include("conexiondb.php");

$sql = "select Contraseña from usuarios where Usuario = :usuario";
$stm = $conexion->prepare($sql);
$stm->bindParam(":usuario", $_POST['usuario']);
$stm->execute();
$usuario = $stm->fetch(PDO::FETCH_ASSOC);
if($usuario && password_verify($_POST['password'], $usuario['Contraseña'])){
session_start();
$_SESSION['usuario'] = $_POST['usuario'];
header('Location: main.php');
}else{
$error = "Usuario o Contraseña incorrectos";
}
}
// session_start();
// if (isset($_SESSION['usuario'])) {
//     header('Location: index.php');
// }

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Web2-Login</title>
</head>

<body>
    <div>
        <a href="index.php">
            <img src="img/logo.svg" alt="logo">
        </a>
        <form action="" method="post" id="formulario">
            <label for="usuario">
                Usuario
            </label>
            <input type="text" name="usuario" id="usuario">
            <label for="password">
                Contraseña
            </label>
            <input type="password" name="password" id="password">
            <button type="submit" id="login">Login</button>
            <?php if(isset($error)) echo "<p>$error</p>";
            ?>
            <a href="registro.php">Crear cuenta</a>
        </form>
    </div>
    <script src="js/login.js"></script>
</body>

</html>


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
        <form action="procesarformulario.php" method="post">
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
            <a href="login.html">Logearse</a>
        </form>
    </div>
    <script src="js/registro.js"></script>
</body>

</html>
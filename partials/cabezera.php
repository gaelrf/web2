<?php
$foto = $_SESSION['foto_usuario']

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <img src="img/logo.svg" alt="Logo">
        <div class="clearfix">
            <img id="imguser" src="<?php echo $foto?>" alt="Usuario">
            <div id="menu">
                <ul>
                    <li><a href="datosusuario.php">Datos de usuario</a></li>
                    <li><a href="cerrarsesion.php">Cerrar sesion</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <aside>
            <ul>
                <li><i class="fa-solid fa-cart-shopping"></i> Pedidos</li>
                <li><i class="fa-solid fa-file-invoice"></i> Facturas</li>
                <li><i class="fa-solid fa-triangle-exclamation"></i> Incidencias</li>
                <li><i class="fa-solid fa-calendar-days"></i> Calendario</li>
                <li><i class="fa-solid fa-file-invoice-dollar"></i> Presupuestos</li>
            </ul>
        </aside>
        <div class="asidemobil">
            <i class="fa-solid fa-bars" id="menumovil"></i>
            <ul id="menuoculto">
                <li><i class="fa-solid fa-cart-shopping"></i> Pedidos</li>
                <li><i class="fa-solid fa-file-invoice"></i> Facturas</li>
                <li><i class="fa-solid fa-triangle-exclamation"></i> Incidencias</li>
                <li><i class="fa-solid fa-calendar-days"></i> Calendario</li>
                <li><i class="fa-solid fa-file-invoice-dollar"></i> Presupuestos</li>
            </ul>
        </div>

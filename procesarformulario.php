<?php

include"conexiondb.php";

try{

$sql = "insert into usuarios (Nombre, Apellidos, Usuario, Email, Contraseña)
values (:nombre, :apellido, :usuario, :email, :contrasena)";

$nombre = "Juan";
$apellido = "Perez";
$usuario = "juanperez";
$email = "juanperez@gmail.com";
$contrasena = "123456";

$prepstm = $conexion->prepare($sql);

$prepstm->bindParam(':nombre', $nombre);
$prepstm->bindParam(':apellido', $apellido);
$prepstm->bindParam(':usuario', $usuario);
$prepstm->bindParam(':email', $email);
$prepstm->bindParam(':contrasena', $contrasena);
$prepstm->execute();

echo "Registro insertado";

} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();

}

$conexion = null;

?>
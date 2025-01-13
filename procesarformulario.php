<?php
$mysqli = new mysqli("localhost", "root", "", "web2");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info ;
echo "jhkj \n";

$sql = "INSERT INTO usuarios (Nombre, Apellidos, Usuario, Email, Fecha_nacimiento, Contraseña) 
VALUES ('".$_POST['nombre']."', '".$_POST['apellido']."', '".$_POST['usuario']."', '".$_POST['email']."', '".$_POST['fecnac']."', '".$_POST['password']."')";

if ($mysqli->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?>
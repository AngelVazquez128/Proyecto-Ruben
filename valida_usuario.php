<?php
require "conexionBD.php";
$con = conectarBD();

$correo = $_POST['correo'];
$pass = $_POST['password'];
$pass=md5($pass);
$sql = "SELECT * FROM empleados 
WHERE correo='$correo' AND pass='$pass' 
AND status=1 AND eliminado=0";

$resultado=$con->query($sql);
$num=$resultado->num_rows;

echo $num;
?>
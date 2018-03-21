<?php

//Código para editar la información de un empleado.
include('dbconnect.php');

$id = $_GET['id'];

$nombre = $_GET['nombre'];

$apellido = $_GET['apellido'];

$direccion = $_GET['direccion'];

$telefono = $_GET['telefono'];

$query = "UPDATE clientes SET nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono' WHERE id='$id'";

if(mysqli_query($conn, $query)){
	echo "Updated";
	header('Location: generar-orden.php');
}else{
	echo "Error";
}

mysqli_close($conn);

?>
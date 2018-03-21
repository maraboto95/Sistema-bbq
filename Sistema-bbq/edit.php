<?php

//Código para editar la información de un empleado.
include('dbconnect.php');

$id = $_GET['id'];

$nombre = $_GET['nombre'];

$precio = $_GET['precio'];

$query = "UPDATE productos SET nombre='$nombre', precio='$precio' WHERE id='$id'";

if(mysqli_query($conn, $query)){
	echo "Updated";
	header('Location: ver-productos.php');
}else{
	echo "Error";
}

mysqli_close($conn);

?>
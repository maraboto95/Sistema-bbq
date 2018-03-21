<?php

//Código que Agrega a un empleado a la BD.

//Conexión

include('dbconnect.php');

date_default_timezone_set("America/Chicago");

$date = date("Y/m/d");

$query = "SELECT clientesnuevos FROM ganancias WHERE fecha='$date'";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$nuevos = $row['clientesnuevos'] + 1;

$query = "UPDATE ganancias SET clientesnuevos='$nuevos' WHERE fecha='$date'";

if(mysqli_query($conn, $query)){
	echo "update exitoso";
}else{
	echo "Error";
}

$nombre = $_POST['nombre'];

$apellido = $_POST['apellido'];

$direccion = $_POST['direccion'];

$telefono = $_POST['telefono'];

//Query

$query = "INSERT INTO clientes(nombre, apellido, direccion, telefono) VALUES('$nombre', '$apellido', '$direccion', '$telefono')";

if(mysqli_query($conn, $query)){
	echo "Insert exitoso";
}else{
	echo "Error";
}

mysqli_close($conn);

header('Location: generar-orden.php');

?>
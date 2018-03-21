<?php

//Conexión

include('dbconnect.php');

$id = $_GET['id'];

$query = "SELECT * FROM clientes WHERE id='$id'";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$nombre = $row['nombre']." ".$row['apellido'];

$direccion = $row['direccion'];

//Query

$query = "INSERT INTO ordenes(id, cliente, direccion, estatus) VALUES('$id', '$nombre', '$direccion', 'Pendiente')";

if(mysqli_query($conn, $query)){
	echo "Insert exitoso";
}else{
	echo "Error";
}

header('Location: orden.php');

?>
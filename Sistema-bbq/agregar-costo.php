<?php

//Código que Agrega a un empleado a la BD.

//Conexión

include('dbconnect.php');

date_default_timezone_set("America/Chicago");

$date = date("Y/m/d");

$nombre = $_POST['nombre'];

$precio = $_POST['precio'];

//Query

$query = "INSERT INTO costos(producto, precio, fecha) VALUES('$nombre', '$precio', '$date')";

if(mysqli_query($conn, $query)){
	echo "Insert exitoso";
}else{
	echo "Error";
}

$query = "SELECT * FROM ganancias WHERE fecha='$date'";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$total = $row['total'] - $precio;

$query = "UPDATE ganancias SET total='$total' WHERE fecha='$date'";

if(mysqli_query($conn, $query)){
	echo "Updated";
}else{
	echo "Error";
}

mysqli_close($conn);

header('Location: costos.php');

?>
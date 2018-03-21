<?php

//Código para borrar a un empleado

$id = $_GET['id'];

include('dbconnect.php');

date_default_timezone_set("America/Chicago");

$date = date("Y/m/d");

$query = "SELECT * FROM costos WHERE id='$id'";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$total = $row['precio'];

$query = "UPDATE ganancias SET total=total + '$total' WHERE fecha='$date'";

if(mysqli_query($conn, $query)){
	echo "Update";
	header('Location: costos.php');
}else{
	echo "Error";
}

$query = "DELETE FROM costos WHERE id='$id'";

if(mysqli_query($conn, $query)){
	echo "Borrado";
	header('Location: costos.php');
}else{
	echo "Error";
}

mysqli_close($conn);

?>
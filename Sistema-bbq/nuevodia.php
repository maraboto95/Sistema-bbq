<?php

//Conexión

include('dbconnect.php');

date_default_timezone_set("America/Chicago");

$date = date("Y/m/d");

//Query

$query = "INSERT INTO ganancias(fecha) VALUES('$date')";

if(mysqli_query($conn, $query)){
	echo "Insert exitoso";
}else{
	echo "Error";
}

header('Location: ganancias.php');

?>
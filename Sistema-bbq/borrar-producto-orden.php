<?php

//Código para borrar a un empleado

$nombre = $_GET['id'];

include('dbconnect.php');

$query = "DELETE FROM detalledeorden WHERE producto='$nombre' ORDER BY id DESC LIMIT 1";

if(mysqli_query($conn, $query)){
	echo "Borrado";
	header('Location: orden.php');
}else{
	echo "Error";
}

mysqli_close($conn);

?>
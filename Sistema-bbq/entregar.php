<?php

include('dbconnect.php');

$id = $_GET['id'];

$query = "UPDATE ordenes SET estatus='Entregado' WHERE nodeorden='$id'";

if(mysqli_query($conn, $query)){
	echo "Update exitoso";
}else{
	echo "Error";
}

header('Location: ver-ordenes.php');


?>
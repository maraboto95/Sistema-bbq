<?php

include('dbconnect.php');

$id = $_GET['id'];

$query = "SELECT * FROM ordenes ORDER BY nodeorden DESC LIMIT 1";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$total = $row['total'];

$query = "SELECT * FROM productos WHERE id='$id'";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$total = $total + $row['precio'];

$nombre = $row['nombre'];

$precio = $row['precio'];

$query = "SELECT * FROM ordenes ORDER BY nodeorden DESC LIMIT 1";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$orden = $row['nodeorden'];

$query = "INSERT INTO detalledeorden(id, producto, precio) VALUES('$orden', '$nombre', '$precio')";

if(mysqli_query($conn, $query)){
	echo "Updated";
}else{
	echo "Error";
}

$query = "UPDATE ordenes SET total='$total' WHERE nodeorden='$orden'";

if(mysqli_query($conn, $query)){
	echo "Updated";
	header('Location: orden.php');
}else{
	echo "Error";
}

mysqli_close($conn);

?>
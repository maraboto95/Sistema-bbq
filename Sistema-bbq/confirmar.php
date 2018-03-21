<?php

include('dbconnect.php');

date_default_timezone_set("America/Chicago");

$notas = $_POST['notas'];

$date = date("Y/m/d");

$time = date("h:i:sa");

$query = "SELECT * FROM ganancias WHERE fecha='$date'";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$total = $row['total'];

$cantidad = $row['cantidad'];

$query = "SELECT * FROM ordenes ORDER BY nodeorden DESC LIMIT 1";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$orden = $row['nodeorden'];

$total = $total + $row['total'];

$cantidad = $cantidad + 1;

$query = "SELECT producto FROM detalledeorden WHERE id='$orden'";

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){

	$nombre = $row['producto'];

	if($nombre == "Combo Pulled Pork (Papas F)" || $nombre == "Combo Pulled Pork (Papas Gajo)" || $nombre == "Combo Pulled Pork (Aros)"){

		switch ($nombre) {
			case 'Combo Pulled Pork (Papas F)':
				$query = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Combo Pulled Pork (Papas F)'";
				$query2 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='BBQ Pulled Pork'";
				$query3 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Papas a la Francesa'";
				$query4 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Refresco'";
				break;

			case 'Combo Pulled Pork (Papas Gajo)':
				$query = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Combo Pulled Pork (Papas Gajo)'";
				$query2 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='BBQ Pulled Pork'";
				$query3 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Papas de gajo'";
				$query4 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Refresco'";
				break;

			case 'Combo Pulled Pork (Aros)':
				$query = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Combo Pulled Pork (Aros)'";
				$query2 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='BBQ Pulled Pork'";
				$query3 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Aros de Cebolla'";
				$query4 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Refresco'";
				break;
		}

		if(mysqli_query($conn, $query)){
	echo "Updated";
}else{
	echo "Error";
}

if(mysqli_query($conn, $query2)){
	echo "Updated";
}else{
	echo "Error";
}

if(mysqli_query($conn, $query3)){
	echo "Updated";
}else{
	echo "Error";
}

if(mysqli_query($conn, $query4)){
	echo "Updated";
}else{
	echo "Error";
}
	}else{
		if($nombre == "Combo Brisket (Papas F)" || $nombre == "Combo Brisket (Papas Gajo)" || $nombre == "Combo Brisket (Aros)"){

		switch ($nombre) {
			case 'Combo Brisket (Papas F)':
				$query = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Combo Brisket (Papas F)'";
				$query2 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Brisket Tradicional'";
				$query3 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Papas a la Francesa'";
				$query4 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Refresco'";
				break;

			case 'Combo Brisket (Papas Gajo)':
				$query = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Combo Brisket (Papas Gajo)'";
				$query2 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Brisket Tradicional'";
				$query3 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Papas de gajo'";
				$query4 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Refresco'";
				break;

			case 'Combo Brisket (Aros)':
				$query = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Combo Brisket (Aros)'";
				$query2 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Brisket Tradicional'";
				$query3 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Aros de Cebolla'";
				$query4 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Refresco'";
				break;
		}

		if(mysqli_query($conn, $query)){
	echo "Updated";
}else{
	echo "Error";
}

if(mysqli_query($conn, $query2)){
	echo "Updated";
}else{
	echo "Error";
}

if(mysqli_query($conn, $query3)){
	echo "Updated";
}else{
	echo "Error";
}

if(mysqli_query($conn, $query4)){
	echo "Updated";
}else{
	echo "Error";
}
	}else{
		if($nombre == "Promo Jueves"){
			$query = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Promo Jueves'";
			$query2 = "UPDATE productos SET cantidad=cantidad+2 WHERE nombre='BBQ Pulled Pork'";

			if(mysqli_query($conn, $query)){
	echo "Updated";
}else{
	echo "Error";
}

if(mysqli_query($conn, $query2)){
	echo "Updated";
}else{
	echo "Error";
}
		}else{
			if($nombre == "Promo Viernes"){
				$query = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Promo Viernes'";
			$query2 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='BBQ Pulled Pork'";
			$query3 = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='Brisket Tradicional'";

					if(mysqli_query($conn, $query)){
	echo "Updated";
}else{
	echo "Error";
}

if(mysqli_query($conn, $query2)){
	echo "Updated";
}else{
	echo "Error";
}

if(mysqli_query($conn, $query3)){
	echo "Updated";
}else{
	echo "Error";
}
			}else{
				$query = "UPDATE productos SET cantidad=cantidad+1 WHERE nombre='$nombre'";

	if(mysqli_query($conn, $query)){
	echo "Updated";
}else{
	echo "Error";
}
			}
		}
	}
	}
}

$query = "UPDATE ganancias SET total='$total', cantidad='$cantidad' WHERE fecha='$date'";

if(mysqli_query($conn, $query)){
	echo "Updated";
}else{
	echo "Error";
}

$query = "UPDATE ordenes SET fecha='$date', hora='$time', notas='$notas' WHERE nodeorden='$orden'";

if(mysqli_query($conn, $query)){
	echo "Updated";
	header('Location: ver-ordenes.php');
}else{
	echo "Error";
}

mysqli_close($conn);

?>
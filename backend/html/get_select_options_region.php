<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "motherwine";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);
  $conn->set_charset("utf8");

	// Check connection
	if ($conn->connect_error) {
		die("Erro: " . $conn->connect_error);
    }


$sql = "SELECT region.id AS id, region.region_name AS region_name from region GROUP BY region_name order by region_name;"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo '<option value="'.$row['id'].'">'.$row['region_name'].'</option>';

  }
}
else{ 
    echo '<option value="">Região não disponível.</option>'; 
} 
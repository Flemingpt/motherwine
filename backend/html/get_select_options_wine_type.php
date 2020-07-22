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


$sql = "SELECT winetype.id AS id, winetype.winetype_name AS winetype_name from winetype GROUP BY winetype_name order by id;"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo '<option value="'.$row['id'].'">'.$row['winetype_name'].'</option>';

  }
}
else{ 
    echo '<option value="">Tipo de vinho não disponível.</option>'; 
} 

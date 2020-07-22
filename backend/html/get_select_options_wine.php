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


$sql = "SELECT wine.id AS id, wine.wine_name AS wine_name, winetype.winetype_name as winetype_name from wine, winetype where wine.winetype_id = winetype.id GROUP BY id order by wine_name;"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo '<option value="'.$row['id'].'">'.$row['wine_name'].' '.$row['winetype_name'].'</option>';

  }
}
else{ 
    echo '<option value="">Vinho não disponível.</option>'; 
} 
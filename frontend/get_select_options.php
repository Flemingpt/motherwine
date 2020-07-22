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


$sql = "SELECT producer.id AS id, producer.producer_shortname AS producer_name FROM producer GROUP BY producer_name order by producer_name;"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo '<option value="'.$row['id'].'">'.$row['producer_name'].'</option>';

  }
}
else{ 
    echo '<option value="">Produtor não disponivel</option>'; 
} 


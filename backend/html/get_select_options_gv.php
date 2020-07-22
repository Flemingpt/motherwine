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


$sql = "SELECT gv.id AS id, gv.gv_name AS gv_name from gv GROUP BY gv_name order by gv_name;"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo '<li><input type="checkbox" name="gv[]" value="'.$row['id'].'"> '.$row['gv_name'].'</li>';

  }
}
else{ 
    echo '<option value="">Casta não disponível.</option>'; 
} 
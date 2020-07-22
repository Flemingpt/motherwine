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


$sql = "SELECT recipe.id AS id, recipe.recipe_name AS recipename from recipe GROUP BY recipename;"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo '<option value='.$row['id'].'>'.$row['recipename'].'</option>';

  }
}
else{ 
    echo '<option value="">Receita não disponivel</option>'; 

}
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
    
    $sql= "select wine.wine_name, wine.id as ID, wine.wine_img, region.region_name, winetype.winetype_name from wine, region, winetype where wine.region_id = region.id and wine.winetype_id = winetype.id and sponsored = 1;";
    $result = $conn->query($sql);    
    $count_results = 0;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<div class="carousel-item col-md-4 '.($count_results==0 ? "active":'').'">
            
            
            <div class="card align-items-center">
            <div class="ribbon"><span>Dica da Mãe</span></div>
            <img class="card-img-top img-fluid" src=../backend/html/'.$row["wine_img"].' alt='.$row["wine_name"].'>
            <div class="card-body">
              <a href="details.php?op_wine='.$row['ID'].'&recipeid='.'&recipename="><h4 class="card-title">'.$row["wine_name"].'</h4></a>
              <p class="card-text">'.$row["winetype_name"].' - '.$row["region_name"].'</p>                                  
            </div>
          </div>
          
          </div>'; 
          $count_results++;                 
        }
    } else {
    echo "ERRO!";
    }

$conn->close();

?>
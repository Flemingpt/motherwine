<?php

/*$recipeid = $_GET["recipeid"];
$recipename = $_GET["recipename"];*/
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

    $query = "SELECT wine_name, wine.id as wineid, region_name, winetype_name, wine_img, wine.sponsored as sponsored, producer.producer_name from wine, region, winetype, producer where wine.region_id = region.id and wine.winetype_id = winetype.id and wine.producer_id = producer.id";
    
    $conditions = array();

    if (!empty($_GET["wine_id"]))  {
      $wine_id= $_GET["wine_id"];
      $conditions[] = " and wine.id LIKE '$wine_id'";
    }
    
    if (!empty($_GET["region_id"]))  {
      $region_id= $_GET["region_id"];
      $conditions[] = " and wine.region_id LIKE '$region_id'";
    }

    if (!empty($_GET["wine_type_id"]))  {
      $wine_type_id= $_GET["wine_type_id"];
      $conditions[] = " and winetype.id LIKE '$wine_type_id'";
    }

    if (!empty($_GET["producer_id"]))  {
      $producer_id= $_GET["producer_id"];
      $conditions[] = " and producer.id LIKE '$producer_id'";
    }

    $sql = $query; 

  
    if (count($conditions) > 0) {
      $sql .= implode(" ", $conditions);
    }

    $sql .= " order by wine_name asc;";
    
    $result = $conn->query($sql);

    echo '<div class="row" data-aos="fade">';

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

          if ($row["sponsored"] == 1){
            echo '<div class="col-md-12">            
              <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">  
                <img id="wineID'.$row["wineid"].'" onclick="clicked('.$row["wineid"].')" class="img-fluid pr-2 resize_results" src=../backend/html/'.$row["wine_img"].' alt="'.$row["wine_name"].'"> 
                 <div class="mb-4 mb-md-0 mr-5">                  
                  <div class="job-post-item-header d-flex align-items-center">                  
                   <h2 class="mr-3 text-black h4">'.$row["wine_name"].'</h2>
                   <div class="badge-wrap">                     
                           <span class="bg-danger text-white badge py-2 px-4">Dica da mãe</span>                         
                    </div>
                  </div>
                  <div class="job-post-item-body d-block d-md-flex">
                    <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span><a href="#">'.$row["winetype_name"].'</a></div>
                    <div><span class="fl-bigmug-line-big104"></span><span>'.$row["region_name"].'</span>
                    </div>
                  </div>
                 </div>  
                 <div class="ml-auto">
                  <form action="details.php" method="get">
                   <a href="#" class="btn-favorite text-gray-500"></a>
                   <input type="hidden" name="op_wine" value='.$row["wineid"].'>
                   <input type="hidden" name="recipeid" value="">
                   <input type="hidden" name="recipename" value="">
                   <button class="btn btn-primary-results py-2">+ INFO</button>
                   </form>
                 </div>
              </div>
   
            </div>'; }
            else {
              echo '<div class="col-md-12">            
              <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">  
                <img id="wineID'.$row["wineid"].'" onclick="clicked('.$row["wineid"].')" class="img-fluid pr-2 resize_results" src=../backend/html/'.$row["wine_img"].' alt="'.$row["wine_name"].'"> 
                 <div class="mb-4 mb-md-0 mr-5">                  
                  <div class="job-post-item-header d-flex align-items-center">                  
                   <h2 class="mr-3 text-black h4">'.$row["wine_name"].'</h2>
                
                  </div>
                  <div class="job-post-item-body d-block d-md-flex">
                    <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span><a href="#">'.$row["winetype_name"].'</a></div>
                    <div><span class="fl-bigmug-line-big104"></span><span>'.$row["region_name"].'</span>
                     </div>
                   </div>
                 </div>  
                 <div class="ml-auto">
                  <form action="details.php" method="get">
                   <a href="#" class="btn-favorite text-gray-500"></a>
                   <input type="hidden" name="op_wine" value='.$row["wineid"].'>
                   <input type="hidden" name="recipeid" value="">
                   <input type="hidden" name="recipename" value="">
                   <button class="btn btn-primary-results py-2">+ INFO</button>
                   </form>
                 </div>
              </div>

                
            </div>';
            }
                         
        }
    } else {
    echo "Desculpa filho, mas não tenho resultados para te mostrar!";
    }

$conn->close();

    
    ?>

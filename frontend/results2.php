<?php
$recipeid = $_GET["recipeid"];
$recipename = $_GET["recipename"];
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
  
  //Display results with region filter ON
    $query ="SELECT
    wineid, 
    wine_name, 
    winetype_name, 
    wine_img, 
    producer_name, 
    region_name, 
    sponsored, 
    recipe_name, 
    recipeid, 
    grade_name, 
    nota 
from 
    (
        select 
            wine.id as wineid, 
            wine_name, 
            winetype_name, 
            wine_img, 
            producer.producer_name AS producer_name, 
            region_name, 
            sponsored, 
            recipe_name, 
            recipe.id as recipeid, 
            round(avg(grade_id), 2) as nota
            from 
            wine
            inner join producer on wine.producer_id = producer.id  
            inner join winetype on wine.winetype_id = winetype.id
            inner join region on wine.region_id = region.id 
            left join pairing on wine.id = pairing.wine_id 
            left join recipe on recipe.id = pairing.recipe_id 
            left join rating on rating.pairing_id = pairing.id where recipe.id LIKE '$recipeid' ";
    
    ///group by wineid, wine_name, recipe_name) as temp, grade where grade.id = temp.nota order by sponsored desc, nota desc;

    $conditions = array();

  

    /*if (!empty($_GET["recipeid"]))  {
      $recipeid= $_GET["recipeid"];
      $conditions[] = " and recipe.id LIKE '%$recipeid'";
    }*/
    
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

    $sql.= " group by 
    wine.id,
    wine_name, 
    winetype_name, 
    wine_img, 
    producer.producer_name, 
    region_name, 
    sponsored, 
    recipe_name, 
    recipe.id
) as temp 
left join grade on grade.id = temp.nota order by sponsored desc, nota desc";
    
    $result = $conn->query($sql);

    echo '
      <div class="row justify-content-start text-left mb-2">
        <div class="col-md-9" data-aos="fade">
          <h2 class="font-weight-bold text-black">Para acompanhar "'.$recipename.'", a mãe sugere...</h2>
        </div>      
      </div>      
    ';

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

          if ($row["sponsored"] == 1){
            echo '<div class="col-md-12">            
              <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">  
                <img id="wineID'.$row["wineid"].'" onclick="clicked('.$row["wineid"].')" class="img-fluid pr-2 resize_results" src="../backend/html/'.$row["wine_img"].'" alt="'.$row["wine_name"].'"> 
                 <div class="mb-4 mb-md-0 mr-5">                  
                  <div class="job-post-item-header d-flex align-items-center">                  
                   <h2 class="mr-3 text-black h4">'.$row["wine_name"].'</h2>
                   <div class="badge-wrap">                     
                           <span class="bg-danger text-white badge py-2 px-4">Dica da mãe</span>                         
                    </div>
                  </div>
                  <div class="job-post-item-body d-block d-md-flex">
                    <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span><a href="#">'.$row["winetype_name"].'</a></div>
                    <div><span class="fl-bigmug-line-big104"></span><span>'.$row["region_name"].'</span>';
                    if ($row["nota"] == null){
                      echo ' <span title="Sem classificação" class="pl-4 fa fa-star"></span>
                      <span title="Sem classificação" class="fa fa-star"></span>
                      <span title="Sem classificação" class="fa fa-star"></span>
                      <span title="Sem classificação" class="fa fa-star"></span>
                      <span title="Sem classificação" class="fa fa-star"></span>';}
                      else if ($row["nota"] <= "0.50"){
                        echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star-half checked"></span>
                       ';}
                      else if ($row["nota"] <= "1.25"){
                        echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>                      
                        ';}
                      else if ($row["nota"] <= "1.75"){
                        echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star-half checked"></span>
                        ';}
                      else if ($row["nota"] <= "2.25"){
                          echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>
                          <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                          ';}
                      else if ($row["nota"] <= "2.75" ){
                        echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star-half checked"></span>
                        ';}
                      else if ($row["nota"] <= "3.25" ){
                        echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                        ';}
                      else if ($row["nota"] <= "3.75" ){
                        echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star-half checked"></span>
                        ';}
                      else if ($row["nota"] <= "4.25" ){
                        echo '<span title="'.$row["nota"].'" title="teste" class="pl-4 fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" title="teste" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" title="teste" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" title="teste" class="fa fa-star checked"></span>
                        ';}
                      else if ($row["nota"] <= "4.75" ){
                        echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>                      
                        <span title="'.$row["nota"].'" class="fa fa-star-half checked"></span>
                        ';}
                    else if ($row["nota"] <= "5.00" ){
                      echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>
                      <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                      <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                      <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                      <span title="'.$row["nota"].'" class="fa fa-star checked"></span>                      
                      ';}                 
                    else {
                        echo '<span title="Sem classificação" class="fa fa-star"></span>
                        <span title="Sem classificação" class="fa fa-star"></span>
                        <span title="Sem classificação" class="fa fa-star"></span>
                        <span title="Sem classificação" class="fa fa-star"></span>
                        <span title="Sem classificação" class="fa fa-star"></span>';}
                    echo' </div>
                  </div>
                 </div>  
                 <div class="ml-auto">
                  <form action="details.php" method="get">
                   <a href="#" class="btn-favorite text-gray-500"></a>
                   <input type="hidden" name="op_wine" value="'.$row["wineid"].'">
                   <input type="hidden" name="recipeid" value="'.$row["recipeid"].'">
                   <input type="hidden" name="recipename" value="'.$row["recipe_name"].'">
                   <button class="btn btn-primary-results py-2">+ INFO</button>
                   </form>
                 </div>
              </div>
   
            </div>';}
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
                    <div><span class="fl-bigmug-line-big104"></span><span>'.$row["region_name"].'</span>';
                    if ($row["nota"] == null){
                      echo ' <span title="Sem classificação" class="pl-4 fa fa-star"></span>
                      <span title="Sem classificação" class="fa fa-star"></span>
                      <span title="Sem classificação" class="fa fa-star"></span>
                      <span title="Sem classificação" class="fa fa-star"></span>
                      <span title="Sem classificação" class="fa fa-star"></span>';}
                      else if ($row["nota"] <= "0.50"){
                        echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star-half checked"></span>
                       ';}
                      else if ($row["nota"] <= "1.25"){
                        echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>                      
                        ';}
                      else if ($row["nota"] <= "1.75"){
                        echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star-half checked"></span>
                        ';}
                      else if ($row["nota"] <= "2.25"){
                          echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>
                          <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                          ';}
                      else if ($row["nota"] <= "2.75" ){
                        echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star-half checked"></span>
                        ';}
                      else if ($row["nota"] <= "3.25" ){
                        echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                        ';}
                      else if ($row["nota"] <= "3.75" ){
                        echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star-half checked"></span>
                        ';}
                      else if ($row["nota"] <= "4.25" ){
                        echo '<span title="'.$row["nota"].'" title="teste" class="pl-4 fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" title="teste" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" title="teste" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" title="teste" class="fa fa-star checked"></span>
                        ';}
                      else if ($row["nota"] <= "4.75" ){
                        echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                        <span title="'.$row["nota"].'" class="fa fa-star checked"></span>                      
                        <span title="'.$row["nota"].'" class="fa fa-star-half checked"></span>
                        ';}
                    else if ($row["nota"] <= "5.00" ){
                      echo '<span title="'.$row["nota"].'" class="pl-4 fa fa-star checked"></span>
                      <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                      <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                      <span title="'.$row["nota"].'" class="fa fa-star checked"></span>
                      <span title="'.$row["nota"].'" class="fa fa-star checked"></span>                      
                      ';}                 
                    else {
                        echo '<span title="Sem classificação" class="fa fa-star"></span>
                        <span title="Sem classificação" class="fa fa-star"></span>
                        <span title="Sem classificação" class="fa fa-star"></span>
                        <span title="Sem classificação" class="fa fa-star"></span>
                        <span title="Sem classificação" class="fa fa-star"></span>';}
                    echo' </div>
                  </div>
                 </div>  
                 <div class="ml-auto">
                  <form action="details.php" method="get">
                   <a href="#" class="btn-favorite text-gray-500"></a>
                   <input type="hidden" name="op_wine" value='.$row["wineid"].'>
                   <input type="hidden" name="recipeid" value='.$row["recipeid"].'>
                   <input type="hidden" name="recipename" value="'.$_GET["recipename"].'">
                   <button class="btn btn-primary-results py-2">+ INFO</button>
                   </form>
                 </div>
              </div>
   
            </div>';
            }                
        }
    } else {
    echo "Desculpa filho, mas não tenho nenhuma sugestão de harmonização!";
    }
    

$conn->close();

?>
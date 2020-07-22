<?php

if (isset($_SESSION["id"])) {
  $userid = $_SESSION["id"];
}
else {
  $userid = "";
}

$op_wine = $_GET["op_wine"];

$recipeid= $_GET["recipeid"];
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

    
    $query = "Select gv.gv_name AS nome from wine, gv, winegv where wine.id = winegv.wine_id and gv.id = winegv.gv_id and wine.id LIKE '$op_wine'";
    $result = mysqli_query($conn, $query);
    
    while($row = $result->fetch_assoc()){
      $array[] = $row['nome']; // Inside while loop
  }

        
    $sql= "select wine_name, wine.id, region_name, wine_img_big, wine.wine_year, alcohol, winetype_name, producer_shortname from wine, region, winetype, producer where wine.region_id = region.id and wine.winetype_id = winetype.id and wine.producer_id = producer.id and wine.id LIKE '$op_wine'";
    /*$sql="select wineid, wine_name, winetype_name, wine_img_big, wine_year, alcohol, region_name, sponsored, producer_name, recipe_name, recipeid, grade_name, nota
    from (select wine.id as wineid, wine_name, winetype_name, wine_img_big, wine_year, alcohol, region_name, sponsored, producer_name, recipe_name, recipe.id as recipeid, round(avg(grade_id),0) as nota
    from wine, producer, winetype, region, recipe, rating, pairing
    where wine.id = pairing.wine_id and wine.producer_id = producer.id and wine.winetype_id = winetype.id and wine.region_id = region.id and
    recipe.id = pairing.recipe_id and 
    rating.pairing_id = pairing.id and wine.id LIKE '%$op_wine%'
    group by wineid, wine_name, recipe_name) as temp, grade
    where grade.id = temp.nota;";*/
    
    $result = $conn->query($sql);    
  
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<div class="site-section py-5 page-title-wrap mt-5 bgcolor_details_header">
            <div class="container" style="margin-top: 0.5%; margin-bottom: -2%;">
            <div class="row">
              <h1 id="teste" class="h1_details_color">'.$row["wine_name"].'</h1>
            </div>
            </div>
        </div>      
          <div class="site-section">
            <div class="container">
              <div class="row">                
                <div class="col-lg-6">
                  <div class="owl-carousel hero-slide owl-style" style="width:75%;">
                    <img src=../backend/html/'.$row["wine_img_big"].' alt="Image" class="img-fluid">
                  </div>
                </div>  
                  <div class="col-lg-5 ml-auto text_details">
                    <h2>A mãe ensina...</h2>
                    <h3>TIPO:<span p> '.$row["winetype_name"].'</span></h3>
                    <h3>REGIÃO:<span p> '.$row["region_name"].'</span></h3>
                    <h3>PRODUTOR:<span p> '.$row["producer_shortname"].'</span></h3>
                    <h3>ANO:<span p> '.$row["wine_year"].'</span></h3>
                    <h3>CASTAS:<span p> ';
                    foreach($array as $value)
                          {
                           print $value.' || ';
                          };
                    
                    echo '</span></h3>';
                    
                  echo '<h3>TEOR ALCOÓLICO: <span p> '.$row["alcohol"].'</span></h3>                
                  </div>              
                     <table class="table table-hover mt-5">
                      <thead>
                         <tr>
                            <th style="width: 60%;">Harmonização com...</th>
                            <th style="width: 20%;">Classificação</th>
                            <th style="width: 20%;">Avalia tu...</th>                        
                         </tr>
                      </thead>
                      <tbody>';            
                                              
      $sql2="SELECT
      wineid, 
      wine_name, 
      winetype_name, 
      wine_img_big, 
      wine_year,
      alcohol,
      region_name,
      sponsored,
      producer_name,  
      recipeid,
      image, 
      name, 
      grade_name, 
      nota,
      pairing
  from 
      (
          select 
              wine.id as wineid, 
              wine_name, 
              winetype_name, 
              wine_img_big, 
              wine_year,
              alcohol,
              region_name,
              sponsored,
              producer.producer_name AS producer_name,  
              recipe_name AS name, 
              recipe.id as recipeid, 
              recipe.recipe_img AS image,
              round(avg(grade_id), 2) as nota, pairing.id AS pairing
              from 
              wine
              inner join producer on wine.producer_id = producer.id  
              inner join winetype on wine.winetype_id = winetype.id
              inner join region on wine.region_id = region.id 
              left join pairing on wine.id = pairing.wine_id 
              left join recipe on recipe.id = pairing.recipe_id 
              left join rating on rating.pairing_id = pairing.id 
              where 
              wine.id like '$op_wine' and pairing.wine_id LIKE '$op_wine'
           
          group by 
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
      left join grade on grade.id = temp.nota order by nota desc; ";
      $result2 = $conn->query($sql2);    
      
      
      if ($result2->num_rows > 0) {
        // output data of each row
        while($row = $result2->fetch_assoc()) {

                      echo '<tr>
                            <td><span><img id="recipeID'.$row["recipeid"].'" onclick="clicked('.$row["recipeid"].')" class="img-fluid pr-2 resize_recipe" src="../backend/html/'.$row["image"].'" alt="'.$row["name"].'">'.$row["name"].'</span></td>
                            <td>';
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
                            echo'</td>
                            <td>
                            <div class="rating-stars" data-stars="'.$row["pairing"].'">
                            <div id="stars">
                            <span class="star" title="1* - Ó mãe! Isto não se faz a um filho!" data-value="1">
                              <span class="fa fa-star"></span>
                            </span>
                            <span class="star" title="2* - Mais valia não ter aberto a garrafa!" data-value="2">
                              <span class="fa fa-star"></span>
                            </span>
                            <span class="star" title="3* - Assim, assim…" data-value="3">
                              <span class="fa fa-star"></span>
                            </span>
                            <span class="star" title="4* - Eu sabia! A mãe nunca se engana!" data-value="4">
                              <span class="fa fa-star"></span>
                            </span>
                            <span class="star" title="5* - És a melhor mãe do mundo!" data-value="5">
                              <span class="fa fa-star"></span>
                            </span>
                            </div>
                          </div>
                        </div>
                            </td>                                                                                       
                         </tr>';
                        }
                   if (($recipeid=="") && ($recipename=="")){   

                    echo '</tbody>
                        </table>
                    <div class="return_btn_details">
                            <a href="wines.php" class="icon-keyboard_return fa-2x" style="color:#00d363;"></a>
                     </div>
                    </div>
                </div>                  
              </div>';
                 }
                 else { 

                    echo'</tbody>
                    </table>
                    <div class="return_btn_details">
                              <a href="results.php?recipeid='.$recipeid.'&recipename='.$recipename.'"" class="icon-keyboard_return fa-2x" style="color:#00d363;"></a>
                      </div>
                   </div>
                  </div>
                  
                </div>';                  
        }
      
    }
        else {
          echo '<tr><td>Sem harmonizações associadas!</td></tr>
                  </tbody>
                   </table>';
                   if (($recipeid=="") && ($recipename=="")){   

                      echo '<div class="return_btn_details">
                              <a href="wines.php" class="icon-keyboard_return fa-2x" style="color:#00d363;"></a>
                      </div>
                      </div>
                  </div>                  
                </div>';
                   }
                   else {
                    echo '<div class="return_btn_details">
                    <a href="results.php?recipeid='.$recipeid.'&recipename='.$recipename.'" class="icon-keyboard_return fa-2x" style="color:#00d363;"></a>
            </div>
            </div>
        </div>                  
      </div>';
                   }
                   
        }
      }
    } else {
    echo "ERRO!";
    }



$conn->close();

?>

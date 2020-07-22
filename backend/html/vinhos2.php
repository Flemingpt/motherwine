<?php
        if (isset($_GET["op"])) {
          $op = $_GET["op"];
        }
        else {
          $op = 0; 
        }
        
        //$userid = $_SESSION["id"];
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
        
            if ($op == 0){
            $sql = "SELECT wine.id as id, wine.wine_name as wine_name, wine.wine_year as wine_year, wine.alcohol as wine_alcohol, wine.wine_img as wine_img, wine.wine_img_big as wine_img_big, wine.winetype_id as winetype_id, wine.producer_id as producer_id, wine.region_id as region_id, wine.sponsored as sponsored, winetype.winetype_name as winetype_name, region.region_name as region_name, producer.producer_shortname as producer_name from wine, winetype, region, producer where wine.winetype_id = winetype.id and wine.region_id = region.id and wine.producer_id = producer.id";
            
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td class="wineid">'.$row["id"].'</td><td>'.$row["wine_name"].'</td><td>'.$row["winetype_name"].'</td><td>'.$row["wine_year"].'</td><td>'.$row["region_name"].'</td><td>'.$row["producer_name"].'</td><td><img src="'.$row["wine_img"].'" style="width:10px;"></td><td><button style="margin-bottom:1%;" class="btn btn-danger" id="delete">Apagar</button>                                                                            
                    </tr>';
                 }
            }
          }

            else if($op == 2){
                $msg = "";
                if(!empty($_FILES)){
                    $today = date("Y-m-d H:i:s");
                    $link = "";
                    $n = 1;
                    $recipe_name = $_GET['nome'];
                    for($i = 0;$i<$n;$i++){
                      $nome = "file".$i;
                      $temp = $_FILES[$nome]['tmp_name'];
            
                      $path_parts = pathinfo($_FILES[$nome]["name"]);
                      $extension = $path_parts['extension'];
                      //$link = "uploads/".$_FILES[$nome]["name"];
                      $link = 'upload/'.$recipe_name.".".$extension;
                      
                      if(move_uploaded_file($_FILES[$nome]['tmp_name'], $link)){
                        $sql = "INSERT INTO recipe (recipe_name, recipe_img) VALUES ('".$recipe_name."','".$link."')";
                        if (mysqli_query($conn,$sql) === TRUE) {
                          $msg = "Receita registada com Sucesso.";
                          $val = 1;
                        } else {
                          $msg .= "Error: " . $sql . "<br>" . mysqli_error($conn);
                          $val = 2;
                        }      
                      } else {
                        $msg .= "".$link." não foi enviado ...<br>";
                        $val = 3;
                      } 
                    } 
                }
                $ir = array("val"=>$val,"msg"=>$msg);
                echo json_encode($ir);

              }else if($op == 3){
                $id = $_GET['id'];                
                $msg = "";
                $val = 0;
                $sql="SELECT * FROM recipe WHERE id = '$id'"; 
                $result=mysqli_query($conn,$sql);
                  if($result->num_rows > 0){
                      while ($row = mysqli_fetch_array($result)){
                        $link= $row['recipe_img'];
                        $sql = "DELETE FROM recipe WHERE id = '$id'";
                      if (mysqli_query($conn,$sql) === TRUE) {
                        $msg = "Receita removida com Sucesso.";
                        unlink($link);
                        $val = 1;
                      } else {
                        $msg .= "Error: " . $sql . "<br>" . mysqli_error($conn);
                        $val = 2;
                      }  
                      }
                  }
                  $ir = array("val"=>$val,"msg"=>$msg, "sql"=>$sql);
                echo json_encode($ir);
              }   
                        
?>           
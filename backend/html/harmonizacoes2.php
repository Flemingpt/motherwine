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
            $sql = "SELECT pairing.id AS pairing_id, pairing.recipe_id as recipe_id, pairing.wine_id as wine_id, recipe.recipe_name as recipe_name, wine.wine_name as wine_name, winetype.winetype_name as winetype_name FROM pairing, recipe, wine, winetype where pairing.wine_id = wine.id and recipe.id = pairing.recipe_id and wine.winetype_id = winetype.id;";
            
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td class="pairingid">'.$row["pairing_id"].'</td><td>'.$row["recipe_name"].'</td><td>'.$row["wine_name"].' '.$row["winetype_name"].'</td><td><button style="margin-bottom:1%; margin-top:1%;" class="btn btn-danger" id="delete">Apagar</button>                                                                            
                    </tr>';
                 }
            }
          }

            else if($op == 2){
                        
                        $msg2= "";
                        $recipe_id = $_GET['recipe'];
                        $wine_id = $_GET['wine'];
                        $sql = "SELECT recipe_id, wine_id, COUNT(*)
                        FROM pairing where recipe_id LIKE '$recipe_id' and wine_id LIKE '$wine_id'
                        GROUP BY recipe_id, wine_id
                        HAVING COUNT(*) > 0;"; 
                        
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        $msg2 = "ERRO! Já existe uma harmonização com esses elementos.";
                        }

                        else {   
                            $recipe_id = $_GET['recipe'];
                            $wine_id = $_GET['wine'];                     
                            $msg = "";               
                            $sql2 = "INSERT INTO pairing (recipe_id, wine_id) VALUES ('$recipe_id','$wine_id');";
                            
                            if (mysqli_query($conn,$sql2) === TRUE) {
                                $msg = "Harmonização registada com Sucesso.";                               
                                $val = 1;
                            } else {
                                $msg .= "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                                $val = 2;
                            }                                        
                        }
                       
                    
                
                $ir = array("val"=>$val,"msg"=>$msg);
                echo json_encode($ir);
            
                
                }else if($op == 3){

                $id = $_GET['id'];                
                $msg = "";
                $val = 0;
                $sql="SELECT * FROM pairing WHERE id = '$id'"; 
                $result=mysqli_query($conn,$sql);
                  if($result->num_rows > 0){
                      while ($row = mysqli_fetch_array($result)){                        
                        $sql = "DELETE FROM pairing WHERE id = '$id'";
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
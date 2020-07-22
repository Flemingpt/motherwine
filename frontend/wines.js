   
$(document).ready(function(){
    $(".js-example-placeholder-single5").select2({
        placeholder: "Escolhe um vinho",
        allowClear: true
      });
    })

    $(".js-example-placeholder-single").select2({
        placeholder: "Escolhe um tipo de vinho",
        allowClear: true  
    });
    
    $(".js-example-placeholder-single2").select2({
      placeholder: "Escolhe uma região",
      allowClear: true     
    });
    
    $(".js-example-placeholder-single3").select2({
      placeholder: "Escolhe um produtor",
      allowClear: true
    });

       // MODAL
       var modal = document.getElementById("myModal");

       function clicked(id){
       
         var wineID= document.getElementById("wineID"+id).getAttribute('src');
         var wineIDtxt= document.getElementById("wineID"+id).getAttribute('alt');
         var modalImg = document.getElementById("img01");
         var captionText = document.getElementById("caption");
         
        setTimeout(function(){ 
        modal.style.display = "block";
         modalImg.src = wineID;
         captionText.innerHTML = wineIDtxt;
          }, 100);
       
       }
   
       // Get the <span> element that closes the modal
   var span = document.getElementsByClassName("close")[0];
   
   // When the user clicks on <span> (x), close the modal
   span.onclick = function() { 
     modal.style.display = "none";
   }

   $("#search_wine, #producer, #wine_type, #region").change(function(){
    var wine_id = $("#search_wine").val();
    var region_id = $("#region").val();
    var producer_id = $("#producer").val();
    var wine_type_id = $("#wine_type").val();
    $.ajax({      
        url:"wines2.php",
        method:"GET",
        data: {wine_id:wine_id, region_id:region_id, producer_id:producer_id, wine_type_id:wine_type_id},
        success: function(data){       
          $("#filter_results").html(data);
        }
    });
   });
 
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function(){
$(".js-example-placeholder-single").select2({
    placeholder: "Escolhe um tipo de vinho",
    allowClear: true
   
});
})

$(".js-example-placeholder-single2").select2({
  placeholder: "Escolhe uma região",
  allowClear: true

});

$(".js-example-placeholder-single3").select2({
  placeholder: "Escolhe um produtor",
  allowClear: true

});

$(".js-example-placeholder-single4").select2({
  placeholder: "Escolhe uma receita",
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

$("#region, #producer, #wine_type").change(function(){
  var region_id = $("#region").val();
  var producer_id = $("#producer").val();
  var wine_type_id = $("#wine_type").val();
  var recipename = $("#recipename").val();
  var recipeid = $("#recipeid").val();
  $.ajax({      
      url:"results2.php",
      method:"GET",
      data: {region_id:region_id, producer_id:producer_id, wine_type_id:wine_type_id, recipename:recipename, recipeid:recipeid},
      success: function(data){       
        $("#filter_results").html(data);
      }
  });
})

/*$("#region, #producer, #wine_type, #search").change("select2:select", function(e) { 
  var region_id = $("#region").val();
  var producer_id = $("#producer").val();
  var wine_type_id = $("#wine_type").val();
  var selected_element = $("#search").val();
  var selected_element2 = $("#search").select2("data")[0].text; 
  window.location = "results.php?recipeid="+selected_element+"&recipename="+selected_element2+"&region_id="+region_id+"&producer_id="+producer_id+"&wine_type_id="+wine_type_id+"";
 });*/


/*$("#region").change(function(){
  var region_id = $(this).val();
  var recipename = $("#recipename").val();
  var recipeid = $("#recipeid").val();
  $.ajax({      
      url:"results2.php",
      method:"GET",
      data: {region_id:region_id, recipename:recipename, recipeid:recipeid},
      success: function(data){       
        $("#filter_results").html(data);
      }
  });
})

$("#wine_type").change(function(){
  var wine_type_id = $(this).val();
  var recipename = $("#recipename").val();
  var recipeid = $("#recipeid").val();
  $.ajax({      
      url:"results2.php",
      method:"GET",
      data: {wine_type_id:wine_type_id, recipename:recipename, recipeid:recipeid},
      success: function(data){       
        $("#filter_results").html(data);
      }
  });
})

$("#producer").change(function(){
  var producer_id = $(this).val();
  var recipename = $("#recipename").val();
  var recipeid = $("#recipeid").val();
  $.ajax({      
      url:"results2.php",
      method:"GET",
      data: {producer_id:producer_id, recipename:recipename, recipeid:recipeid},
      success: function(data){       
        $("#filter_results").html(data);
      }
  });
})*/

/*$("#search").change("select2:select", function(){
  var recipeid = $("#search").val();
  var recipename = $("#search").select2("data")[0].text;
  $.ajax({      
      url:"results2.php",
      method:"GET",
      data: {recipeid:recipeid, recipename:recipename},
      success: function(data){       
        $("#filter_results").html(data);
      }
  });
})*/


$("#search").on("select2:select", function(e) { 
  var selected_element = $("#search").val();
  var selected_element2 = $("#search").select2("data")[0].text; 
  window.location = "results.php?recipeid="+selected_element+"&recipename="+selected_element2+"";
 });
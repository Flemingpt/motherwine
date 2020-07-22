$(document).ready(function() {
    $("#myCarousel").on("slide.bs.carousel", function(e) {
      var $e = $(e.relatedTarget);
      var idx = $e.index();
      var itemsPerSlide = 3;
      var totalItems = $(".carousel-item").length;
  
      if (idx >= totalItems - (itemsPerSlide - 1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i = 0; i < it; i++) {
          // append slides to end
          if (e.direction == "left") {
            $(".carousel-item")
              .eq(i)
              .appendTo(".carousel-inner");
          } else {
            $(".carousel-item")
              .eq(0)
              .appendTo($(this).find(".carousel-inner"));
          }
        }
      }
    });
  });

  
 

  $(".js-example-placeholder-single").select2({
    placeholder: "Escolhe uma receita...",
    allowClear: true,
    language: {
            noResults: function() {
                return "<a data-target='#myModal5' data-toggle='modal'  href='#myModal5'>Sem resultados. Clica aqui para sugerir a criação desta receita!</a>";
           }
    },
   escapeMarkup: function (markup) {
       return markup;
   }
});

  $("#search").on("select2:select", function(e) { 
    var selected_element = $("#search").val();
    var selected_element2 = $("#search").select2("data")[0].text; 
    window.location = "results.php?recipeid="+selected_element+"&recipename="+selected_element2+"";
   });

   /*$("#search").on("select2:select", function(){
    var recipeid = $("#search").val();
    var recipename = $("#search").select2("data")[0].text; 
    $.ajax({      
        url:"results2.php",
        method:"GET",
        data: {recipename:recipename, recipeid:recipeid},
        success: function(data){       
          $("#filter_results").html(data);
        }
    });
  })*/

  

  $('#myModal5').on('hidden.bs.modal', function () {
    // Load up a new modal...
    $('#myModal4').modal('show')
  })
   

  
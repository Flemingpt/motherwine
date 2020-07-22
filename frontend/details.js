// MODAL//
var modal = document.getElementById("myModal2");
var sessionid_ = document.getElementById("sessionid_").value;

function clicked(id){

  var recipeID= document.getElementById("recipeID"+id).getAttribute('src');
  var recipeIDtxt= document.getElementById("recipeID"+id).getAttribute('alt');
  var modalImg = document.getElementById("img02");
  var captionText = document.getElementById("caption");

 setTimeout(function(){ 
 modal.style.display = "block";
  modalImg.src = recipeID;
  captionText.innerHTML = recipeIDtxt;
   }, 100);

}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

//VOTING//

/* 1. Visualizing things on Hover - See next part for action on click */
$('#stars span').on('mouseover', function(){
  var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
  $('#stars span').css('cursor', 'pointer');

  // Now highlight all the stars that's not after the current hovered star
  $(this).parent().children('span.star').each(function(e){
    if (e < onStar) {
      $(this).addClass('hover');
    }
    else {
      $(this).removeClass('hover');
    }
  });
  
}).on('mouseout', function(){
  $(this).parent().children('span.star').each(function(e){
    $(this).removeClass('hover');
  });
});


/* 2. Action to perform on click */

$('#stars span').on('click', function(e){

  
  //e.preventDefault();
 //e.stopImmediatePropagation();
  
  /*onStar = $("#stars span").data('value');
  console.log(onStar);*/

  var onStar = parseInt($(this).data('value'), 10); // The star currently selected  
  var pairing = $(this).closest('td').find('.rating-stars').data('stars');
  var stars = $(this).parent().children('span.star');

  for (i = 0; i < stars.length; i++) {
    $(stars[i]).removeClass('selected');
  }
  
  for (i = 0; i < onStar; i++) {
    $(stars[i]).addClass('selected');
  }

  if (sessionid_ !="" && onStar>0){
    $.ajax({      
    url:"submit.php",
    method:"POST",
    data: {sessionid_:sessionid_, onStar:onStar, pairing:pairing},
    success: function(){       
      $("#myModal3").modal("toggle");
    }
});
  }  
});

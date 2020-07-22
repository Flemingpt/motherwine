var sessionid_ = document.getElementById("sessionid_").value;

$(document).ready(function() {
    $('#recipes').DataTable();
} );

$('#recipes').DataTable( {
    select: false,
    responsive: true,
    fixedHeader: true,
    language: {
        "sEmptyTable":   "Não foi encontrado nenhum registo",
        "sLoadingRecords": "A carregar...",
        "sProcessing":   "A processar...",
        "sLengthMenu":   "Mostrar _MENU_ registos",
        "sZeroRecords":  "Não foram encontrados resultados",
        "sInfo":         "A mostrar de _START_ até _END_ de _TOTAL_ registos",
        "sInfoEmpty":    "A mostrar de 0 até 0 de 0 registos",
        "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
        "sInfoPostFix":  "",
        "sSearch":       "Procurar:",
        "sUrl":          "",
        "oPaginate": {
            "sFirst":    "Primeiro",
            "sPrevious": "Anterior",
            "sNext":     "Seguinte",
            "sLast":     "Último"
        },
        "oAria": {
            "sSortAscending":  ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        }        
    }
},

//$('#recipes tr').css('cursor', 'pointer'),

$("#recipes").on("click", "#delete", function () {
    var table = $("#recipes").DataTable();
    var id =  $(this).closest('tr').find('td:nth-child(1)').text(); 
    var op = 3;
    console.log(id);
    console.log(op);
    table.row($(this).parents("tr")).remove().draw(false); //command for delete all that row

    //window.location = "receitas.php?op=3&id="+id+"";

    $.ajax({      
        url:"receitas2.php",
        method:"GET",
        data: {op:op, id:id, sessionid_:sessionid_},
        success: function(){       
          $("#myModal3").modal("toggle");
        }
    });
}
));


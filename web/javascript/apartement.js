/*

$('.show_hide').click(function () {

// here we toggle show/hide the correct div at the right speed and using which easing effect

    $('.toggleDiv').slideToggle(1000, 'swing');


});

$('.entypo-down-open').toggle(function() {
    $(this).rotate({ endDeg:90, persist:true });
}, function() {
    $(this).rotate({ endDeg:0, persist:true  });
}); */


$('#dialog').hide();
var Count = $("#containerAccommodations > div").length;

$('input').each(function(index) {
    $(this).prop('disabled', true );
});

$('.annulerForm').hide();



$(document).on("click", ".appartment, .angle-wrap", function(){
    var appartmentClass = $(this).attr('class').split(' ')[1];
    $("form."+appartmentClass).slideToggle(500, 'swing');

    if (  $("i."+appartmentClass).css( "transform" ) == 'none' ){
        $("i."+appartmentClass).css("transform","rotate(-90deg)");
    } else {
        $("i."+appartmentClass).css("transform","" );
    }
});

$('.add').click(function (){
    if (Count <= 5) {
        Count = Count +1;
        var classAppartment = document.createElement('h3');
        var newSpan = document.createElement('span');
        classAppartment.className = "appartment form_"+Count;
        classAppartment.appendChild(newSpan);
        newSpan.innerHTML = "Appartement " + Count;
        $('.appartment').last().after(classAppartment);
        var form_content = ' <div class="larg-w form_'+Count+'"> <div class="angle-wrap form_'+Count+'"> <h3>Appartement ' + Count + ' </h3><span onClick="deleteAccommodation(-1,'+Count+')"><i style="color:red" class="fa fa-trash-o fa-lg"></i></span> <i class="fa fa-angle-left form_'+Count+'"></i> </div> <div> <form class="toggleDiv form_'+Count+'" action="../../templates/appartements/insertOrUpdateAppartement.php" method="POST"><input type="hidden" name="id" value="'+Count+'"> <div class="input"><label>N° </label><input required class="text-field" type="number" name="numero"/></div><div class="input"> <label>Adresse </label> <input required class="text-field" type="text" name="adresse"></div><div class="input"><label>Code Postal </label> <input required class="text-field" type="number" name="codePostal"/></div><div class="input"><label>Ville </label><input required class="text-field" type="text" name="ville"/></div> <div class="input"> <label>Superficie </label> <input required class="text-field" type="number" name="superficie"> </div> <div class="input"> <label>Nombre d\'habitants </label> <input required class="text-field" type="number" name="nbHabitants"> </div><div class="input" style="display:none"><input class="text-field" type="number" name="userId" value="'+$('#userId').val()+'" /></div> <input type="submit" class="submit" value="Valider"></form> </div> <div id="dinamic-fields"></div> </div>';
        $(".larg-w").last().after(form_content);
    }

});


function deleteAccommodation(id, value){
    // si l'appartement n'existe pas en BDD
    if(id===-1){
        $('.form_'+value).remove();
        Count = $("#containerAccommodations > div").length;
    } else {
        $("#dialog").dialog({
        autoOpen:  true,
        modal: true,
        buttons : {
             "Confirm" : function() {
                 $(this).dialog("close");
                    $.ajax({
                    url: "../../templates/appartements/supprimerAppartement.php?id="+id,
                    success: function(data){
                        $('.form_'+value).remove();
                        Count = $("#containerAccommodations > div").length;
                        alert("L'appartement a bien été supprimé");
                        }
                    });
             },
             "Cancel" : function() {
                $(this).dialog("close");
             }
           }
         });
        

    }
}

function modifierForm(idAccommodation){
    $('.form_'+idAccommodation+' input').each(function(index) {
        $(this).prop('disabled', false );
        $('#modifierForm_'+idAccommodation).hide();
        $('#annulerForm_'+idAccommodation).show();
        $('#btnCreerPiece_'+idAccommodation).prop('disabled', true );
    });
}

function annulerForm(idAccommodation){
    
    $('.form_'+idAccommodation).trigger('reset')
    $('.form_'+idAccommodation+' input').each(function(index) {
        $(this).prop('disabled', true );
        $('#modifierForm_'+idAccommodation).show();
        $('#annulerForm_'+idAccommodation).hide();
        $('#btnCreerPiece_'+idAccommodation).prop('disabled', false );
    });
}


function creerPiece(idAppartement){
    
$('#nomPiece').prop('disabled', false );
$('#superficie').prop('disabled', false );
$( "#dialog-form-add-room" ).dialog({
      autoOpen: true,
      height: 300,
      width: 300,
      modal: true,
      buttons: {
        "Créer": function() {
            if($('#nomPiece').val() && $('#superficie').val()){
                
                nomPiece = $('#nomPiece').val();
                superficie = $('#superficie').val();

                $.ajax({
                    url: '../../templates/appartements/creerPiece.php',
                    type: 'POST',
                    data: {nomPiece: nomPiece, superficie: superficie, idAppartement: idAppartement},
                    success: function(data){
                       alert('La pièce a bien été créée');
                       $("#dialog-form-add-room").dialog( "close" );
                       location.reload();
                    }
                });
 
            } else {
                alert('Vous devez renseigner un nom de pièce et une superficie valide.');
            }
        },
        Annuler: function() {
            $('#formCreationPiece')[0].reset();
             $(this).dialog( "close" );
        }
      }
      
    });
    
}



    function supprimerPiece(id){
        $("#dialog-delete-room").dialog({
        autoOpen:  true,
        modal: true,
        buttons : {
             "Confirm" : function() {
                 $(this).dialog("close");
                    $.ajax({
                    url: "../../templates/appartements/supprimerPiece.php?id="+id,
                    success: function(data){
                            location.reload();
                        }
                    });
             },
             "Cancel" : function() {
                $(this).dialog("close");
             }
           }
         });
        
    }
$('.annulerGroupBtn').hide();
$('.validerGroupBtn').hide();

   $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 600,
      modal: true,
      buttons: {
        "Créer": function() {
            if(validateForm()){
                var apparts = [];
                var nomGroupe = $('#nomGroupe').val();
                $('input[type=checkbox]').each(function() {
                    if(this.checked){
                        apparts.push(this.value);
                    }
                });
                $.ajax({
                    url: 'creerGroupe.php',
                    type: 'POST',
                    data: {nomGroupe: nomGroupe, apparts: apparts},
                    success: function(data){
                       alert('Le groupe a bien été créé');
                       $("#dialog-form").dialog( "close" );
                       location.reload();
                    }
                });
 
            } else {
                alert('Vous devez renseigner un nom de groupe et ajouter au moins un appartement.');
            }
        },
        Annuler: function() {
            $('#formCreationGroupe')[0].reset();
             $(this).dialog( "close" );
        }
      }
      
    });
    
    
function validateForm(){
    
    var bool = false;
    var nbSelected = 0;
    
    $('input[type=checkbox]').each(function() {
        if(this.checked){
            nbSelected++;
        }
    });
    
    if($('#nomGroupe').val() && nbSelected != 0){
        bool = true;
    }
    return bool;
}

function modifierGroupe(){
    
}

function creerGroupe(){
    $('#listAppartPopup').html("");
    $.ajax({
        url: "creerGroupe.php",
        success: function(data){
            jsonObj = JSON.parse(data);
            for (var i=0;i<jsonObj.length;i++){     
                $('#listAppartPopup').append('<input type="checkbox" value="'+jsonObj[i].toString().split(" :")[0].split("Appartement ")[1]+'" name="accommodationsSelected"><span> '+jsonObj[i].toString()+'</span><br/>');
            }
        }
    });
    
    $("#dialog-form").dialog('open');
 
}


function supprimerGroupe(idGroup){
    
     $("#dialogSupp").dialog({
        autoOpen:  true,
        modal: true,
        buttons : {
             "Confirm" : function() {
                 $(this).dialog("close");
                    $.ajax({
                    url: "supprimerGroupe.php?id="+idGroup,
                    success: function(data){
                        console.log(data);
                        alert("Le groupe a bien été supprimé");
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



    


$('.annulerGroupBtn').hide();
$('.validerGroupBtn').hide();

   $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 600,
      modal: true,
      buttons: {
        "Save": function() {
            if($('#form2').valid()){  //call valid for form2 and show the errors
               alert('submit form');  //only if the form is valid submit the form
                $( this ).dialog( "close" );
            }
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
      
    });

function modifierGroupe(){
    
}

function creerGroupe(){
    $.ajax({
        url: "creerGroupe.php",
        success: function(data){
            jsonObj = JSON.parse(data);
            for (var i=0;i<jsonObj.length;i++){     
                $('#listAppartPopup').append('<span>'+jsonObj[i].toString()+'</span><input type="checkbox" name="'+jsonObj[i].toString()+'" name="accommodationsSelected"><br/>');
            }
        }
    });
    
    
    $("#dialog-form").dialog('open');
 
}

    


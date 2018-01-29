function searchUser() {
    $('#listResults').html('');
    $( "#dialog-search-user" ).dialog({
      autoOpen: true,
      height: 600,
      width: 600,
      modal: true,
      buttons: {
        "Rechercher": function() {
            $('#listResults').html('');
            var nameUser = $('#nameUser').val();
                $.ajax({
                    url: '../../templates/serviceClient/searchUser.php',
                    type: 'POST',
                    data: {nameUser: nameUser},
                    success: function(data){
                        var jsonParse = JSON.parse(data);
                        for(i=0;i<jsonParse.length;i++){
                            user = jsonParse[i].split(',');
                            $('#listResults').append('<div class="userDetails"><p>'+user[0]+'</p><p>'+user[1]+'</p><p>'+user[2]+'</p><p>'+user[3]+'</p></div>');
                        }
                        
                    }
                });
         },
        Retour: function() {
             $(this).dialog( "close" );
        }
      }
    });
    $('#formSearchUser')[0].reset();
}

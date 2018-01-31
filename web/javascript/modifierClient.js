$('input').each(function(index) {
    $(this).prop('disabled', true);
});
$('#modifierBtn').show();
$('#enregistrerBtn').hide();
$('#annulerBtn').hide();
$('#modifierMdpBtn').hide();



function modifierProfil(){
    $('input').each(function(index) {
        $(this).prop('disabled', false);
    });
    $('#modifierBtn').hide();
    $('#enregistrerBtn').show();
    $('#annulerBtn').show();
    $('#modifierMdpBtn').show();
}

function annulerForm(){
    
    $('.form').trigger('reset')
    $('input').each(function(index) {
        $(this).prop('disabled', true );
    });
    $('#modifierBtn').show();
    $('#enregistrerBtn').hide();
    $('#annulerBtn').hide();
    $('.modifMdp').hide();   
    $('#modifierMdpBtn').hide();
}

function modifierMdp(){
    $('.modifMdp').show();   
    $('#modifierMdpBtn').hide();
}

function validate(){
   
   if($('#password').val() !== ""){
       if($('#password').val() !== $('#confirmPassword').val()){
            alert("Les mots de passe ne correspondent pas.")
            return false;
       } else {
            return true;
       }
   } else {
       return true; 
   }
}




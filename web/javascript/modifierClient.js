$('input').each(function(index) {
    $(this).prop('disabled', true);
});
$('#modifierBtn').show();
$('#enregistrerBtn').hide();
$('#annulerBtn').hide();



function modifierProfil(){
    $('input').each(function(index) {
        $(this).prop('disabled', false);
    });
    $('#modifierBtn').hide();
    $('#enregistrerBtn').show();
    $('#annulerBtn').show();
}

function annulerForm(){
    
    $('.form').trigger('reset')
    $('input').each(function(index) {
        $(this).prop('disabled', true );
    });
    $('#modifierBtn').show();
    $('#enregistrerBtn').hide();
    $('#annulerBtn').hide();
}




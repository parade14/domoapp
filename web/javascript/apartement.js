
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



var Count = $("#containerAccommodations > div").length;


$(".appartment-list, div.larg-w.form_1").on("click", ".appartment, div.angle-wrap", function(){
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
        var form_content = ' <div class="larg-w form_'+Count+'"> <div class="angle-wrap"> <h3>Appartement ' + Count + ' </h3><span onClick="deleteAccommodation(-1,'+Count+')"><i style="color:red" class="fa fa-trash-o fa-lg"></i></span> <i class="fa fa-angle-left form_'+Count+'"></i> </div> <div> <form class="toggleDiv form_'+Count+'" action="insertOrUpdateAppartement.php" method="POST"><input type="hidden" name="id" value="'+Count+'"> <div class="input"><label>N° </label><input class="text-field" type="number" name="numero"/></div><div class="input"> <label>Adresse </label> <input class="text-field" type="text" name="adresse"></div><div class="input"><label>Code Postal </label> <input class="text-field" type="number" name="codePostal"/></div><div class="input"><label>Ville </label><input class="text-field" type="text" name="ville"/></div> <div class="input"> <label>Superficie </label> <input class="text-field" type="text" name="superficie"> </div> <div class="input"> <label>Nombre d\'habitants </label> <input class="text-field" type="text" name="nbHabitants"> </div> <input type="submit" class="submit" value="Valider"> </form> </div> <div id="dinamic-fields"></div> </div>';
        $(".larg-w").last().after(form_content);
    }

});


function deleteAccommodation(id, value){
    // si l'appartement n'existe pas en BDD
    if(id===-1){
        $('.form_'+value).remove();
        Count = $("#containerAccommodations > div").length;
    } else {
        // si il existe en BDD
        $.ajax({
            url: "supprimerAppartement.php?id="+id,
            success: function(data){
                $('.form_'+value).remove();
                Count = $("#containerAccommodations > div").length;
            }
        });
    }
    
    
    
}









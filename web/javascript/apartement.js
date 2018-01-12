
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



var Count = 1;


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
        var form_content = ' <div class="larg-w form_'+Count+'"> <div class="angle-wrap"> <h3>Appartement ' + Count + ' </h3> <i class="fa fa-angle-left form_'+Count+'"></i> </div> <div> <form class="toggleDiv form_'+Count+'" action="" method="post"> <div class="input"> <label>Adresse </label> <input class="text-field" type="text" name="adresse"> </div> <div class="input"> <label>Superficie </label> <input class="text-field" type="text" name="superficie"> </div> <div class="input"> <label>Nombre d\'habitants </label> <input class="text-field" type="text" name="nbHabitants"> </div> <input type="submit" class="submit" value="Valider"> </form> </div> <div id="dinamic-fields"></div> </div>';
        $(".larg-w").last().after(form_content);
    }

});






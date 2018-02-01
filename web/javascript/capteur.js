$(document).ready(function() {
    
    var idAcc = window.location.href.split('idAcc=');
    
    if(idAcc[1] == undefined){
        $('#mesApparts').toggleClass('active');
        $('#btnAjoutCapteur').hide();

    } else {
        $('#appart_'+idAcc[1]).toggleClass('active');
    }

    /*$('.box').click(function() {
        $(this).toggleClass('selected');

    });
    */


    $.fn.inlineEdit = function(replaceWith) {

        $(document).on("click", ".expand", function() {

            var elem = $(this);

            elem.hide();
            elem.after(replaceWith);
            replaceWith.focus();

            replaceWith.blur(function() {

                if ($(this).val() != "") {
                    elem.text($(this).val());
                }

                $(this).remove();
                elem.show();
            });
        });
    };

    var replaceWith = $('<input name="expand" class="expand" type="text" />');

    $('.expand').inlineEdit(replaceWith);

    $('.btn-connect').click(function(){
        if ($('div.add_captor').hasClass('hidden'))
            $('div.add_captor').removeClass('hidden');
        $('body > *:not(div.add_captor)').css({'-webkit-filter': 'blur(5px)'});
        $('div.add_captor').animate({top: '35%'}, 700);
        $.scrollLock( true );
    });


    $('.login-cross, input[type="submit"]').click(function(evt){
        $('div.add_captor').css({'top': '0'});
        $('body > *:not(div.add_captor)').css({'-webkit-filter': ''});
        $('div.add_captor').addClass("hidden");
        $.scrollLock( false );
    });

    $.scrollLock = ( function scrollLockSimple(){
        var locked   = false;
        var $body;
        var previous;

        function lock(){
            if( !$body ){
                $body = $( 'body' );
            }

            previous = $body.css( 'overflow' );

            $body.css( 'overflow', 'hidden' );

            locked = true;
        }

        function unlock(){
            $body.css( 'overflow', previous );

            locked = false;
        }

        return function scrollLock( on ) {
            // If an argument is passed, lock or unlock depending on truthiness
            if( arguments.length ) {
                if( on ) {
                    lock();
                }
                else {
                    unlock();
                }
            }
            // Otherwise, toggle
            else {
                if( locked ){
                    unlock();
                }
                else {
                    lock();
                }
            }
        };
    }() );

    var Count = 1;

    /*$(document).on('submit', '.captor-container', function() {
        var form_content = '<div class="box first">' +
            '                <span class="icon-cont"><i class="fa fa-bed"></i></span>' +
            '                <h3>'+$("#select-room option:selected" ).text()+'</h3>' +
            '                <ul class="hidden">\n' +
            '                    <li>Lorem ipsum dolor</li>' +
            '                    <li>Set amet consecuter</li>' +
            '                    <li>Lorem ipsum dolor</li>' +
            '                    <li>Set amet consecuter</li>' +
            '                </ul>' +
            '                <a class="expand"><span></span></a>' +
            '            </div>';
        $(".box.first").last().after(form_content);

        return false;

    });*/

    var room_input = $('<input name="room" class="room" type="text" placeholder="Nom de la nouvelle pièce" />');

    $('#select-room').change(function() {
        if ($(this).val() === 'new_room') {

            $(this).hide();
            $(this).after(room_input);
            room_input.focus();

            room_input.blur(function () {

                if ($(room_input).val() != "") {
                    var room = '<option value="3">'+$(room_input).val()+'</option>';
                    $('#select-room option').last().before(room);
                }

                $(room_input).remove();
                $('#select-room').show();
            });
        }
    });


    $('.switch-button').on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('open');
    });

});




    function supprimerCapteur(id){
        
        var r = confirm("Confirmez la suppression ? Ceci entraînera la suppression des relevés du capteur.");
        if (r == true) {
            $.ajax({
                    url: "../../templates/capteur/supprimerCapteur.php?id="+id,
                    success: function(data){
                            location.reload();
                        }
           });
        }      
    }
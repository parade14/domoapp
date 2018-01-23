$(document).ready(function() {

    /*$('.box').click(function() {
        $(this).toggleClass('selected');

    });
    */

    menu_translate();


    $(".main__menu2 ul li:first-child").click(function() {
        $(".main__menu2 ul li").toggleClass("small");

        if ($(".main__menu2 ul li").hasClass("small")) {

            menu_translate();

        } else {
            $(".main__menu2 ul li:not(:first-child)").css({"-webkit-transform": "", "-moz-transform": "", "-ms-transform": "", "-o-transform": "", "transform": "", "visibility": "visible"});
        }
    });


    function menu_translate()
    {
        $(".main__menu2 ul li:not(:first-child)").each(function (index) {
            var translation = (index + 1) * (-100);
            $(this).css({"-webkit-transform": "translate("+translation+"%)", "-moz-transform": "translate("+translation+"%)", "-ms-transform": "translate("+translation+"%)", "-o-transform": "translate("+translation+"%)", "transform": "translate("+translation+"%)"});
        });
    }

    $.fn.inlineEdit = function(replaceWith) {

        $("body").on("click", "a.expand", function() {

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

    var replaceWith = $('<input name="temp" class="temp" type="text" />');

    $('a.expand').inlineEdit(replaceWith);

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

    $(document).on('submit', '.captor-container', function() {
        var form_content = '<div class="box first">' +
            '                <span class="icon-cont"><i class="fa fa-bed"></i></span>' +
            '                <h3>Chambre 1</h3>' +
            '                <ul class="hidden">\n' +
            '                    <li>Lorem ipsum dolor</li>' +
            '                    <li>Set amet consecuter</li>' +
            '                    <li>Lorem ipsum dolor</li>' +
            '                    <li>Set amet consecuter</li>' +
            '                </ul>' +
            '                <a class="expand"><span>17</span></a>' +
            '            </div>';
        $(".box.first").last().after(form_content);

        return false;

    });

    var room_input = $('<input name="room" class="room" type="text" placeholder="Nom de la nouvelle pièce" />');

    $('#select-room').change(function() {
        if ($(this).val() === 'new_room') {

            var select_room = $(this);
            select_room.hide();
            select_room.after(room_input);
            room_input.focus();
        }
    });

});
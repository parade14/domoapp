$(function(){

    $('.btn-connect').click(function(){
        if ($('div.profile').hasClass('hidden'))
            $('div.profile').removeClass('hidden');
            $('body > *:not(div.profile)').css({'-webkit-filter': 'blur(5px)'});
            $('div.profile').animate({top: '35%'}, 700);
            $.scrollLock( true );
    });


    $('.login-cross').click(function(evt){
        $('div.profile').css({'top': '0'});
        $('body > *:not(div.profile)').css({'-webkit-filter': ''});
        $('div.profile').addClass("hidden");
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

});

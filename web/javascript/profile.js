$(function(){

    $('.btn-connect').click(function(){
        if ($('div.login').hasClass('hidden'))
            $('div.login').removeClass('hidden');
        $('body > *:not(div.login)').css({'-webkit-filter': 'blur(5px)'});
        $('div.login').animate({top: '35%'}, 700);
        $.scrollLock( true );
    });


    $('.login-cross').click(function(evt){
        $('div.login').css({'top': '0'});
        $('body > *:not(div.login)').css({'-webkit-filter': ''});
        $('div.login').addClass("hidden");
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
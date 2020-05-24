$(document).ready(function(){

    /** Disable Spinner */
    $(".loader").fadeOut();

    /** Scroll to top */
    $(".back-to-top").click(function(){
        $('html, body').animate({ scrollTop: 0 }, 'fast');
    });

});
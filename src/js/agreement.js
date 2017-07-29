$(function () {

    //---------- Initializing plugins ----------
    //------------------------------------------

    var
        $window         = $(window),
        preloader       = $('.preloader'),
        logo            = '';

    //------------------------------------------
    //------------------------------------------



    //---------------- Methods -----------------
    //------------------------------------------

    function headerActive() {
        if ($window.scrollTop() > 0)
            $('.header').addClass('active');
        else
            $('.header').removeClass('active');
    }headerActive();

    //------------------------------------------
    //------------------------------------------



    //---------------- Events ------------------
    //------------------------------------------

    $(".toggle-mnu").click(function () {
        $(this).toggleClass("on");
        $(".nav-menu-mobile").slideToggle();
        return false;
    });

    $window.on('scroll', function () {
        headerActive();
    });

    //------------------------------------------
    //------------------------------------------



    logo = preloader.find('.preloader__logo, .preloader__load');
    setTimeout(function () {
        logo.fadeOut();
        preloader.delay(350).fadeOut('slow');
    }, 1000);

});
 function stickyHeader() {
    var header  = $('.header'),
        scrollPosition = 0,
        headerTopHeight = $('.header .header__top').outerHeight(),
        checkpoint = 300;

    var menu    = $('.header-menu');

    $(window).scroll(function() {
        var currentPosition = $(this).scrollTop();
        if (currentPosition < scrollPosition) {
            // On top
            if (currentPosition == 0) {
                header.removeClass('navigation--sticky navigation--unpin navigation--pin');
                header.css("margin-top", 0);
                menu.addClass("ontopagain");
            }
            // on scrollUp
            else if (currentPosition > checkpoint) {
                header.removeClass('navigation--unpin').addClass('navigation--sticky navigation--pin');
                menu.removeClass('ontopagain');

            }
        }
        // On scollDown
        else {
            if (currentPosition > checkpoint) {
                header.addClass('navigation--unpin').removeClass('navigation--pin');
                header.css("margin-top", -headerTopHeight);
                $('header-services').css("margin-top", -headerTopHeight);
            }
        }
        scrollPosition = currentPosition;
    });
}


$(document).ready(function() {
    stickyHeader();
});
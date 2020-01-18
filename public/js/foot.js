$(window).on('scroll', function() {

    if ($(window).scrollTop() + $(window).height() > $('.wrapper').outerHeight()) {
        $('.arrow').hide();
    } else {
        $('.arrow').show();
    }
});


$('.arrow').click(function(){
    $("html").animate({ scrollTop: $('html').prop("scrollHeight")}, 1200);
});
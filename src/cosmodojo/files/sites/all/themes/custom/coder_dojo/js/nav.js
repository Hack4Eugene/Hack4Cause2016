/*! Main */
jQuery(document).ready(function($) {
  
    // Fixa navbar ao ultrapassa-lo
    var navbar = $('#navbar'),
    		distance = navbar.offset().top + 20,
        $window = $(window);

    $window.scroll(function() {
        if ($window.scrollTop() >= distance) {
            navbar.removeClass('navbar-fixed-top').addClass('navbar-fixed-top');
          	$("body").css("padding-top", "100px");
        } else {
            navbar.removeClass('navbar-fixed-top');
            if($('body').hasClass('navbar-administration')){
                $("body").css("padding-top", "39px");
            }
            else{
                $("body").css("padding-top", "0px");
            }
        }
    });
});
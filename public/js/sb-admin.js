(function($) {
  "use strict"; // Start of use strict
  // Configure tooltips for collapsed side navigation
  $('.navbar-sidenav [data-toggle="tooltip"]').tooltip({
    template: '<div class="tooltip navbar-sidenav-tooltip" role="tooltip" style="pointer-events: none;"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
  })
  // Toggle the side navigation
  $("#sidenavToggler").click(function(e) {
    e.preventDefault();
    $("body").toggleClass("sidenav-toggled");
    $(".navbar-sidenav .nav-link-collapse").addClass("collapsed");
    $(".navbar-sidenav .sidenav-second-level, .navbar-sidenav .sidenav-third-level").removeClass("show");
  });
  // Force the toggled class to be removed when a collapsible nav link is clicked
  $(".navbar-sidenav .nav-link-collapse").click(function(e) {
    e.preventDefault();
    $("body").removeClass("sidenav-toggled");
  });
  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse').on('mousewheel DOMMouseScroll', function(e) {
    var e0 = e.originalEvent,
      delta = e0.wheelDelta || -e0.detail;
    this.scrollTop += (delta < 0 ? 1 : -1) * 30;
    e.preventDefault();
  });
  // Scroll to top button appear
  $(document).scroll(function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });
  // Configure tooltips globally
  $('[data-toggle="tooltip"]').tooltip()
  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    event.preventDefault();
  });
  
  
  //get data-category from cat_id for delete modal
  //get and set cat id
  $('.cat_delete_class').on('click', function(e){
    let  id = $(this).attr('data-cat');
    var target = $('.delete_cat');
    var href = target.attr('href');
    
    
    $('.delete_cat').attr('href', href + id);
    $('#categoryDelete').modal('show');

    $('#categoryDelete').on('hidden.bs.modal', function (e) {
      $('.delete_cat').attr('href', href);
    });
    
  });



  //get data-category from cat_id for updtate modal
  //get and set cat id
  $('.cat_edit_class').on('click', function(e){
    let  id = $(this).attr('data-cat');
    var target = $('.update_cat');
    var href = target.attr('href');
    
    
    $('.update_cat').attr('href', href + id);
    $('#categoryUpdate').modal('show');

    $('#categoryUpdate').on('hidden.bs.modal', function (e) {
      $('.update_cat').attr('href', href);
    });
    
  });


})(jQuery); // End of use strict

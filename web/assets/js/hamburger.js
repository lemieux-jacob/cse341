// Toggle the Navigation Menu on Mobile
$('.navbar-burger').click(function () {
  $('#navigation, .navbar-burger').toggleClass('is-active');
});

// Reset the Menu when the Window is Resized
$(window).resize(function () {
  if (window.innerWidth >= 1024) {
    $('#navigation, .navbar-burger').removeClass('is-active');
  }
});
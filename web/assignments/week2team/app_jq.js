// JQuery Version
$('#info').text('The App is Running on JQuery');

$('#box-1').addClass('selected');

// Alert the User when a Button is Pressed
$('#btn1').click(() => {
  alert('Clicked!');
});

// Fade the Selected Box when a Button is Pressed
$('#btn2').click(() => {
  $('#box-3').fadeToggle();
});

// Change Value of Selector Input when Clicked (Box)
$('*.box').click(function () {
  let id = $(this).attr('id');
  $('#selector').val(`#${id}`);
  highlightActiveBox(this);
});

// Change Text to Bold on Hover
$('*.box').hover(
  // Over
  function () {
    $(this).addClass("font-weight-bold");
  },
  // Out
  function () {
    $(this).removeClass("font-weight-bold");
  }
);

// Highlight Active Box when Selection Changes
$('selector').change(function () {
  highlightActiveBox($($('selector').val()));
});

// Change Color of the Selected Box based on Selected Color
$('#changeColor').click(function () {
  let id = $('#selector').val();
  $(id).css('background-color', $('#picker').val());
});

function highlightActiveBox(target) {
  $('*.box').removeClass('selected');
  $(target).addClass('selected');
}
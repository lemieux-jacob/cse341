// JQuery Version

/*
// Alert the User when a Button is Pressed
$('#btn1').click(() => {
  alert('Clicked!');
});

// Fade the Selected Box when a Button is Pressed
$('#btn2').click(() => {
  let id = $('#selector').val();
  $(id).fadeToggle();
});

// Change Value of Selector Input when Clicked (Box)
$('*.box').click(function() => {
  $('#selector').val = `#{$(this).id}`;
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

// Change Color of the Selected Box based on Selected Color
$('#changeColor').click(function () {
  let id = $('#selector').val();
  $(id).css('background-color', $('#picker').val());
});

*/

// Pure JavaScript Version

window.onload = () => {
  // Select all elements with the "box" Class
  const boxes = document.querySelectorAll('.box');

  // Alert the User when a Button is Pressed
  document.getElementById('btn1').addEventListener('click', () => {
    alert('Clicked!');
  });

  // Fade the Selected Box when a Button is Pressed
  document.getElementById('btn2').addEventListener('click', e => {
    let id = document.getElementById('selector').value;
    let target = document.getElementById(id.slice(1));

    target.classList.toggle('transparent');
  });

  // Change Text to Bold on Hover (Box) &
  // Change Value of Selector Input on Click (Box)
  boxes.forEach(box => {
    box.addEventListener('click', function () {
      document.getElementById('selector').value = `#${this.id}`;
    });
    box.addEventListener('mouseover', function (e) {
      this.classList.add('font-weight-bold');
    });
    box.addEventListener('mouseout', function (e) {
      this.classList.remove('font-weight-bold');
    });
  });

  // Change Color of Selected Box based on Selected Color
  document.getElementById('changeColor').addEventListener('click', () => {
    let id = document.getElementById('selector').value;
    let color = document.getElementById('picker').value;

    let target = document.getElementById(id.slice(1));

    target.style.backgroundColor = color;
  });
};
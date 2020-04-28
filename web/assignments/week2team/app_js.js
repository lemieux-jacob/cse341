// Pure JavaScript Version
document.getElementById('info').innerText = "The App is running on plain old JavaScript";

// Select all elements with the "box" Class
const boxes = document.querySelectorAll('.box');
const selector = document.getElementById('selector');

document.getElementById('box-1').classList.add('selected');

// Alert the User when a Button is Pressed
document.getElementById('btn1').addEventListener('click', () => {
  alert('Clicked!');
});

// Highlight Active Box on Selector Change
selector.addEventListener('change', function () {
  let id = this.value.slice(1);

  highlightActiveBox(document.getElementById(id));
});

// Change Text to Bold on Hover (Box) &
// Change Value of Selector Input on Click (Box)
boxes.forEach(box => {
  box.classList.add('jsfix');

  box.addEventListener('click', function () {
    selector.value = `#${this.id}`;
    highlightActiveBox(this);
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
  let id = selector.value;
  let color = document.getElementById('picker').value;

  let target = document.getElementById(id.slice(1));

  target.style.backgroundColor = color;
});

// Highlight the Active Box
function highlightActiveBox(target) {
  boxes.forEach(box => box.classList.remove('selected'));
  target.classList.add('selected');
}
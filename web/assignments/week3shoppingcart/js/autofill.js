function autofill() {
  // Auto Fill Address Form
  let form = {
    name: 'Tony Stark',
    line1: '123 Fantasy Dr',
    line2: 'Suite 321',
    city: 'New York',
    state: 'New York',
    country: 'USA',
    zip: '10002'
  };

  // Fill Fields
  for (let [field, value] of Object.entries(form)) {
    document.getElementById(field).value = value;
  }
}
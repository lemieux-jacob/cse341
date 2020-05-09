<?php require 'views/shared/header.php';?>

<h3>Your Address:</h3>

<button class="btn btn-warning btn-block" onclick="autofill()">Autofill the Form</button>

<form method="POST" action="/">
  <div class="form-group">
    <label for="name">Name: </label>
    <input class="form-control" type="text" id="name" name="name" type="text" <?php if (isset($name)) echo 'value="' .$name. '"'; ?> required>
  </div>
  <div class="form-group">
    <label for="line1">Line 1: </label>
    <input class="form-control" type="text" id="line1" name="line1" type="text" <?php if (isset($line1)) echo 'value="' .$line1. '"'; ?> required>
  </div>
  <div class="form-group">
    <label for="line2">Line 2: </label>
    <input class="form-control" type="text" id="line2" name="line2" type="text" <?php if (isset($line2)) echo 'value="' .$line2. '"'; ?>>
  </div>
  <div class="form-group">
    <label for="city">City: </label>
    <input class="form-control" type="text" id="city" name="city" type="text" <?php if (isset($city)) echo 'value="' .$city. '"'; ?> required>
  </div>
  <div class="form-group">
    <label for="state">State: </label>
    <input class="form-control" type="text" id="state" name="state" type="text" <?php if (isset($state)) echo 'value="' .$state. '"'; ?> required>
  </div>
  <div class="form-group">
    <label for="country">Country: </label>
    <input class="form-control" type="text" id="country" name="country" type="text" <?php if (isset($country)) echo 'value="' .$country. '"'; ?> required>
  </div>
  <div class="form-group">
    <label for="zip">Zip: </label>
    <input class="form-control" type="text" id="zip" name="zip" type="text" <?php if (isset($zip)) echo 'value="' .$zip. '"'; ?> required>
  </div>
  <input type="hidden" name="action" value="checkout-action">
  <input class="btn btn-primary btn-block" type="submit" value="Confirm Purchase">
  <a class="btn btn-secondary btn-block" href="/?action=view-cart">Back to Cart</a>
</form>

<script src="js/autofill.js"></script>

<?php require 'views/shared/footer.php';?>
<?php require 'views/shared/header.php';?>

<h2>Thank You for Ordering!</h2>

<h3 class="text-center">Your Purchases: </h3>

<ul class="list-group">
  <?php foreach($purchases as $item): ?>
  <li class="list-group-item">
    <?= $item['name'];?> x <?= $item['quantity']; ?>, <?= formatCurrency($item['price']); ?>
  </li>
  <?php endforeach;?>
</ul>

<h3 class="text-center">Your Address: </h3>

<ul class="unlist text-center">
  <li><?= $address['name'] ?></li>
  <li><?= $address['line1'] ?></li>
  <li><?= $address['line2'] ?></li>
  <li><?= $address['city'] ?> <?= $address['state'] ?> <?= $address['zip'] ?></li>
  <li><?= $address['country'] ?></li>
</ul>

<?php require 'views/shared/footer.php';?>
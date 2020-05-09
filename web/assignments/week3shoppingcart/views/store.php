<?php require 'views/shared/header.php';?>
<div class="grid-auto">
  <?php foreach($products as $product): ?>
  <div class="card">
    <div class="card-body">
      <h3><?= $product['name']; ?></h3>
      <p><?= $product['description']; ?></p>
      <p><?= formatCurrency($product['cost_per_unit']); ?></p>
      <form class="form-inline" method="POST" action="/">
        <input type="hidden" name="action" value="add-item">
        <input type="hidden" name="id" value="<?= $product['id']; ?>">
        <input class="form-control" type="number" name="quantity" id="quantity" value="1">
        <input class="btn btn-primary" type="submit" value="Add to Cart">
      </form>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?php require 'views/shared/footer.php';?>
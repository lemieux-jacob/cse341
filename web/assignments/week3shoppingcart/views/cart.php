<?php require 'views/shared/header.php';?>
<ul class="list-group">
  <?php foreach($cart as $item): ?>
  <li class="list-group-item">
    <div class="d-flex">
      <span class="p-2"><?= $item['name']; ?></span>
      <div class="d-flex m-0 align-self-end ml-auto">
        <form class="form-inline" method="POST" action="/" id="removeAllItem<?= $item['id']; ?>">
          <input type="hidden" name="action" value="remove-item">
          <input type="hidden" name="id" value="<?= $item['id']; ?>">
          <input class="form-control mr-2" type="number" name="quantity" value="<?= $item['quantity']; ?>" readonly>
        </form>
        <form class="form-inline" method="POST" action="/">
          <input type="hidden" name="action" value="add-item">
          <input type="hidden" name="id" value="<?= $item['id']; ?>">
          <input type="hidden" name="quantity" value="1">
          <input type="hidden" name="uri" value="/?action=view-cart">
          <button class="btn btn-primary" type="submit"><span class="fas fa-plus"></span></button>
        </form>
        <form class="form-inline" method="POST" action="/">
          <input type="hidden" name="action" value="remove-item">
          <input type="hidden" name="id" value="<?= $item['id']; ?>">
          <input type="hidden" name="quantity" value="1">
          <button class="btn btn-primary mx-2" type="submit"><span class="fas fa-minus"></span></button>
        </form>
        <button class="btn btn-danger" type="submit" form="removeAllItem<?= $item['id']; ?>">
          <span class="fas fa-times"></span>
        </button>
      </div>
      <div class="p-2 align-self-end">
        <?= formatCurrency($item['price']); ?>
      </div>
    </div>
  </li>
  <?php endforeach; ?>
  <li class="list-group-item">
    <div class="d-flex">
      <div class="p-2 align-self-end ml-auto">Total: <?php echo formatCurrency($totalCost); ?></div>
    </div>
  </li>
</ul>
<?php if (count($cart) === 0): ?>
<div class="text-center"><a href="/">Return to Browse</a></div>
<?php else: ?>
<div class="text-center p-2">
  <a class="btn btn-primary mx-2" href="?action=empty-cart">Empty Cart</a>
  <a class="btn btn-primary mx-2" href="?action=checkout">Check Out</a>
</div>
<?php endif;?>
<?php require 'views/shared/footer.php';?>
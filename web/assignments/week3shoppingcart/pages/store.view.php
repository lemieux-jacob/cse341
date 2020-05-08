<?php partial('header', ['title' => $title, 'cart' => $cart]); ?>

<a class="btn btn-link" href="/?action=cart"><span class="fas fa-shopping-cart"></span> Shopping Cart (<?= $cart->itemCount(); ?>)</a>

<div class="grid-auto">
  <?php if ($inventory): ?>
  <?php foreach($inventory->items() as $product): ?>
  <div class="card">
    <?php if(isset($product['image'])): ?>
    <img src="<?= $product['image']; ?>" alt="<?php $product['name']; ?> Image">
    <?php endif; ?>
    <div class="card-body">
      <h3 class="card-title"><?= $product['name']; ?></h3>
      <p class="card-text"><?= $product['description']; ?></p>
    </div>
    <div class="card-footer d-flex">
      <form class="form-inline" method="POST" action="/" id="add-item-<?= $product['id']; ?>">
        <input name="id" type="hidden" value="<?= $product['id']; ?>">
        <input name="action" type="hidden" value="add-item">
        <button class="btn btn-primary"><span class="fas fa-plus"></span></button>
      </form>
      <?php if ($cart->hasItem($product['id'])): ?>
      <form class="form-inline" method="POST" action="/" id="remove-item-<?= $product['id']; ?>">
        <input name="id" type="hidden" value="<?= $product['id'];?>">
        <input name="action" type="hidden" value="remove-item">
        <button class="btn btn-primary"><span class="fas fa-minus"></span></button>
      </form>
      <?php endif; ?>
    </div>
  </div>
  <?php endforeach; ?>
  <?php endif; ?>
</div>

<?php partial('footer');?>
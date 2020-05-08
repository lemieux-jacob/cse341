<?php partial('header', ['title' => $title]); ?>

<a href="?action=empty-cart" class="btn btn-primary">Empty Cart</a>

<ul class="list-group">
  <?php foreach($cart->items() as $item): ?>
    <li><?= $item['name']; ?></li>
    <li><?= $item ['quantity']; ?></li>
  <?php endforeach; ?>
</ul>

<?php partial('footer');?>
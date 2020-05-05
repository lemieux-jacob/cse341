<?php partial('header', ['title' => $title]); ?>

<a href="?action=empty-cart" class="btn btn-primary">Empty Cart</a>

<ul class="list-group">
  <?php foreach($cart as $item): ?>

  <?php endforeach; ?>
</ul>

<?php partial('footer');?>
<?php if (isset($_SESSION['msg'])) {
  $msg = $_SESSION['msg'];
  unset($_SESSION['msg']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Store</title>
  <!-- Bootstrap 4 & Dependancies & JQuery (Full Version) -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/ec58e5f1d7.js" crossorigin="anonymous"></script>
  <!-- Custom Styles -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">
    <header class="p-2">
      <h1 class="mx-2">The Sock Store</h1>
      <hr>
    </header>
    <?php if (isset($msg)): ?>
    <div class="alert alert-info"><?= $msg; ?></div>
    <?php endif; ?>
    <div class="p-2 text-right">
      <?php if ($action === 'confirm'): ?>
      <a href="/?action=empty-cart">Back to Browse</a> |
      <?php else: ?>
      <a href="/">Back to Browse</a> |
      <?php endif; ?>
      <a href="?action=view-cart">View Cart <span class="fas fa-shopping-cart"></span> (<?= $itemsInCart; ?>) <?php echo formatCurrency($totalCost); ?></a>
    </div>
    <main>
  
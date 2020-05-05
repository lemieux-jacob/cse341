<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if (isset($title)) echo $title . ' - '; ?>The Sock Store</title>
  <!-- Bootstrap 4 & Dependancies & JQuery (Full Version) -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/ec58e5f1d7.js" crossorigin="anonymous"></script>
  <!-- Custom Styles -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="container">
    <header class="jumbotron rounded-0">
      <h1 class="display-1"><?php if (isset($title)) echo $title; ?></h1>
    </header>
    <main>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSE 341 - <?php if ($title) echo $title; ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <script src="https://kit.fontawesome.com/ec58e5f1d7.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
  <header class="hero is-dark is-bold">
    <div class="hero-body">
      <div class="container">
        <h1 class="title is-1">Jacob Lemieux - CSE 341</h1>
        <p class="subtitle is-2"><?php echo $title?> Page</p>
      </div>
    </div>
  </header>
  <nav class="navbar is-dark">
    <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
          <i class="fas fa-italic"></i><i class="fas fa-heart"></i><i class="fab fa-canadian-maple-leaf is-red"></i>
        </a>
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
          data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
      <div id="navigation" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item<?php if (isset($title) && $title === 'Home') echo ' is-active-link';?>" href="/">Home</a>
          <a class="navbar-item<?php if (isset($title) && $title === 'Assignments') echo ' is-active-link';?>" href="/?action=assignments">Assignments</a>
        </div>
      </div>
    </div>
  </nav>
  <section class="section">
    <div id="app" class="container">
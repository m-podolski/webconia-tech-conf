<?php
session_start();

include_once "./bootstrap.php";
include_once BASE_PATH . "/src/content/microcopy.php";
include_once BASE_PATH . "/src/controllers/form-controller.php";
?>

<html lang="de">

<head>

  <?php include_once BASE_PATH . "/src/templates/head.php"; ?>

  <title>Webconia Technology Conference 2021</title>

</head>

<body>
  <header class="landmark">

    <?php include_once BASE_PATH . "/src/templates/header.php"; ?>

  </header>

  <main class="landmark">

    <?php include_once BASE_PATH . "/src/templates/form.php"; ?>

  </main>

  <footer class="landmark">

    <?php include_once BASE_PATH . "/src/templates/footer.php"; ?>

  </footer>
</body>

</html>

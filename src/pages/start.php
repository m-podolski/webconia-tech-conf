<?php
session_start();

include_once BASE_PATH . "/src/content/microcopy.php";
include_once BASE_PATH . "/src/controllers/form-controller.php";
?>

<html lang="de">

<head>

  <?php include BASE_PATH . "/src/templates/head.php"; ?>

  <title>Webconia Technology Conference 2021</title>

</head>

<body>

  <?php include BASE_PATH . "/src/templates/navigation.php"; ?>

  <header
    id="start"
    class="landmark"
  >

    <?php include BASE_PATH . "/src/templates/header.php"; ?>

  </header>

  <main class="landmark">

    <section id="topics"></section>
    <section id="scope"></section>
    <section id="location"></section>

    <section id="register">

      <?php include BASE_PATH . "/src/templates/form.php"; ?>

    </section>


  </main>

  <footer
    id="contact"
    class="landmark"
  >

    <?php include BASE_PATH . "/src/templates/footer.php"; ?>

  </footer>
</body>

</html>

<?php
session_start();

include "src/content/microcopy.php";
include "src/controllers/form-controller.php";
?>

<html lang="de">

<head>

  <?php include "src/templates/meta.php"; ?>

  <link
    rel="stylesheet"
    href="./dist/css/styles.css"
  />
  <script
    type="module"
    src="./dist/js/ui.js"
  ></script>

  <title>Webconia Technology Conference</title>
</head>

<body>
  <header class="landmark">

    <?php include "src/templates/header.php"; ?>

  </header>

  <main class="landmark">

    <?php include "src/templates/form.php"; ?>

  </main>

  <footer class="landmark">

    <?php include "src/templates/footer.php"; ?>

  </footer>
</body>

</html>

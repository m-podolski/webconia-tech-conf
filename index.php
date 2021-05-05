<?php

include "src/partials/microcopy.php";
include "src/controller/form-controller.php";

session_start();
initSession();
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta
    http-equiv="X-UA-Compatible"
    content="IE=edge"
  />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  />
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
    <img
      src="./src/images/webconia.webp"
      alt="Webconia"
      class="header-logo"
    />
    <h1>Webconia TechConf2021</h1>
  </header>

  <main class="landmark">

    <?php include "src/partials/form.php"; ?>

  </main>

  <pre>
    <?php
    print_r($_POST);
    print_r($_SESSION);
    print_r($_SERVER);
    print_r($_REQUEST);
    ?>
  </pre>

  <footer class="landmark">
    webconia GmbH Gänsemarkt 31, 20354 Hamburg
    +49-40-609432300
    info@webconia.de +49-40-609432309
  </footer>
</body>

</html>

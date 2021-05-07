<?php
session_start();

include "../content/microcopy.php";
?>

<html lang="de">

<head>

  <?php include "../templates/meta.php"; ?>

  <link
    rel="stylesheet"
    href="../../dist/css/styles.css"
  />
  <script
    type="module"
    src="../../dist/js/ui.js"
  ></script>

  <title>Webconia Technology Conference</title>
</head>

<body>
  <header class="landmark">

    <?php include "../templates/header.php"; ?>

  </header>

  <main class="landmark">

    <h2>Bis bald...</h2>

    <h2>Sie haben sich erfolgreich registriert. Wir freuen uns auf Ihren Besuch
    </h2>

    <a
      href="../../"
      class="button-primary"
    >
      <?php echo $microcopy["back"]; ?>
    </a>


  </main>

  <pre>
    <?php
    print_r($_POST);
    print_r($_SESSION);

// print_r($_SERVER);
// print_r($_REQUEST);
?>
  </pre>

  <footer class="landmark">

    <?php include "../templates/footer.php"; ?>

  </footer>
</body>

</html>

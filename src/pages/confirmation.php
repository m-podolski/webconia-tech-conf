<?php
session_start();

include "../content/microcopy.php";
include "../controllers/form-controller.php";
?>

<html lang="de">

<head>

  <?php include "../templates/head.php"; ?>

  <title>
    Webconia Technology Conference 2021 | Registrierung erfolgreich
  </title>

</head>

<body>
  <header class="landmark">

    <?php include "../templates/header.php"; ?>

  </header>

  <main class="landmark">

    <h2>Bis bald...</h2>

    <h3>Sie haben sich erfolgreich registriert. Wir freuen uns auf Ihren Besuch
    </h3>

    <div class="button-container">
      <a
        href="./"
        class="button-primary button-action"
      >
        <?php echo $microcopy["back"]; ?>
      </a>
    </div>

    <form
      method="post"
      action="confirmation.php"
      class="form contact-form"
    >

      <button
        type="submit"
        name="show"
        value="show"
        class="button-primary button-action"
      >
        <?php echo $microcopy["form-show"]; ?>
      </button>

    </form>

    <?php include "../templates/table-visitors.php"; ?>

  </main>

  <pre>
    <?php
    print_r($_SERVER);
    print_r($_REQUEST);
    ?>
  </pre>

  <footer class="landmark">

    <?php include "../templates/footer.php"; ?>

  </footer>
</body>

</html>

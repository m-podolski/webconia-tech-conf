<?php
session_start();

include_once "../../config.php";
include_once BASE_PATH . "/src/content/microcopy.php";
include_once BASE_PATH . "/src/controllers/form-controller.php";
?>

<html lang="de">

<head>

  <?php include BASE_PATH . "/src/templates/head.php"; ?>

  <title>
    Webconia Technology Conference 2021 | Registrierung erfolgreich
  </title>

</head>

<body>

  <?php include BASE_PATH . "/src/templates/navigation.php"; ?>

  <header class="landmark image-confirmation-page">

    <div class="header-wrapper">
      <img
        src="./src/images/webconia.png"
        alt="Webconia"
        class="header-logo"
      />
      <h1>Bis bald...</h1>
    </div>

  </header>

  <main class="landmark">

    <h2>Sie haben sich erfolgreich registriert. Wir freuen uns auf Ihren Besuch
    </h2>

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
      action="<?php echo BASE_URL . "src/pages/confirmation.php"; ?>"
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

    <?php include BASE_PATH . "/src/templates/table-visitors.php"; ?>

  </main>

  <footer class="landmark">

    <?php include BASE_PATH . "/src/templates/footer.php"; ?>

  </footer>
</body>

</html>

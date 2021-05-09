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
    class="landmark image-start-page"
  >

    <div class="header-wrapper">
      <img
        src="./dist/images/webconia.webp"
        alt="Webconia"
        class="header-logo"
      />
      <h1>Tech<span class="logo-color">Conf</span>2021</h1>
    </div>

  </header>

  <main class="landmark">

    <?php include BASE_PATH . "/src/content/start.php"; ?>
    <div class="content-section">
      <?php foreach ($paragraphs as $paragraph): ?>
      <p><?php echo $paragraph; ?></p>
      <?php endforeach; ?>
    </div>

    <section
      id="topics"
      aria-labelledby="h2-1"
    >

      <div class="heading-wrapper image-topics">
        <h2 id="h2-1">Themen</h2>
      </div>
      <?php include BASE_PATH . "/src/content/topics.php"; ?>
      <div class="content-section">
        <ul class="content-list">
          <?php foreach ($topics as $topic): ?>
          <li>
            <h3><?php echo $topic["heading"]; ?></h3>
            <p><?php echo $topic["description"]; ?></p>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

    </section>

    <section
      id="program"
      aria-labelledby="h2-2"
    >

      <div class="heading-wrapper image-program">
        <h2 id="h2-2">Programm</h2>
      </div>
      <?php include BASE_PATH . "/src/content/program.php"; ?>
      <div>
        <table>
          <thead>
            <tr>
              <th scope="col">Datum</th>
              <th scope="col">Uhrzeit</th>
              <th scope="col">Titel</th>
              <th scope="col">Themen</th>
              <th scope="col">Kontakt</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($program as $item): ?>
            <tr>
              <td><?php echo $item["date"]; ?></td>
              <td><?php echo $item["time"]; ?></td>
              <td><?php echo $item["title"]; ?></td>
              <td><?php echo $item["topics"]; ?></td>
              <td><?php echo $item["contact"]; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </section>

    <section
      id="location"
      aria-labelledby="h2-3"
    >

      <div class="heading-wrapper image-location">
        <h2 id="h2-3">Veranstaltungsort</h2>
      </div>
      <?php include BASE_PATH . "/src/content/location.php"; ?>
      <div class="content-section">
        <?php foreach ($paragraphs as $paragraph): ?>
        <p><?php echo $paragraph; ?></p>
        <?php endforeach; ?>
      </div>

    </section>

    <section
      id="register"
      aria-labelledby="h2-4"
    >

      <div class="heading-wrapper image-register">
        <h2 id="h2-4">Anmeldung</h2>
      </div>
      <div class="content-section">
        <?php include BASE_PATH . "/src/templates/form.php"; ?>
      </div>

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

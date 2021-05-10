<?php include BASE_PATH . "/src/content/footer.php"; ?>

<section>
  <strong><?php echo $microcopy["footer-contact"]; ?></strong>
  <ul class="footer-list">
    <li>webconia GmbH</li>
    <li>Gänsemarkt 31</li>
    <li>20354 Hamburg</li>
    <li>+49-40-609432300</li>
    <li>info@webconia.de</li>
    <li><a
        href="https://www.webconia.de/"
        target="_blank"
      >www.webconia.de</a></li>
  </ul>
</section>


<section>
  <strong><?php echo $microcopy["footer-sponsors"]; ?></strong>
  <ul class="sponsors-list">
    <?php foreach ($sponsors as $logo): ?>
    <li>
      <img src="./dist/assets/images/<?php echo $logo; ?>">
    </li>
    <?php endforeach; ?>
  </ul>
</section>

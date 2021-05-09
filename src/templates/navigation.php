<?php $navSections = [
  "start" => "Start",
  "topics" => "Themen",
  "scope" => "Programm",
  "location" => "Veranstaltungsort",
  "register" => "Anmeldung",
  "contact" => "Kontakt",
]; ?>

<a
  href="#skip-target"
  class="skip-link"
>
  <?php echo $microcopy["nav-skip"]; ?>
</a>

<nav
  aria-label="Menü"
  class="nav-primary"
>
  <button
    type="button"
    id="menu-btn"
    class="nav-button-menu"
  >
    <?php echo $microcopy["nav-button"]; ?>
  </button>

  <ul
    class="nav-primary-list"
    aria-labelledby="menu-btn"
  >
    <?php foreach ($navSections as $id => $section): ?>
    <li>
      <a
        href="<?php echo BASE_URL . "#" . $id; ?>"
        class="nav-link"
      ><?php echo $section; ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
</nav>

<pre>
<?php echo print_r($_SERVER); ?></pre>

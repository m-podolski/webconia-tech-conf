<script defer>
let formValidityState =
  <?php if (empty($_SESSION["invalidFields"]) === false) {
    echo json_encode(
      $_SESSION["invalidFields"],
      JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK,
    );
  } else {
    echo "'valid'";
  } ?>;
</script>

<section
  id="contact"
  class="contact-form"
>
  <h2>Anmeldung</h2>
  <form
    method="post"
    action="index.php"
    class="form contact-form"
  >

    <div class="honeypot">
      <label for="website">
        Website
        <abbr title="required">*</abbr>
      </label>
      <input
        type="website"
        id="website"
        name="website"
        tabindex="-1"
        class="honey"
      />
    </div>
    <label for="name">
      <?php echo $microcopy["form-first"]; ?>
      <abbr title="required">*</abbr>
    </label>
    <input
      type="text"
      id="firstname"
      name="firstname"
      value="<?php echo empty($_SESSION["firstname"])
        ? ""
        : $_SESSION["firstname"]; ?>"
      placeholder="<?php echo $microcopy["form-first-plh"]; ?>"
      required
    />
    <!-- pattern="^(?:[- a-zA-Z\u00c4-\u00fd]{2,30}){1,3}$" -->

    <p class="error-info noerror">
      <?php echo $microcopy["form-first-err"]; ?>
    </p>

    <label for="name">
      <?php echo $microcopy["form-last"]; ?>
      <abbr title="required">*</abbr>
    </label>
    <input
      type="text"
      id="lastname"
      name="lastname"
      value="<?php echo empty($_SESSION["lastname"])
        ? ""
        : $_SESSION["lastname"]; ?>"
      placeholder="<?php echo $microcopy["form-last-plh"]; ?>"
      required
    />
    <!-- pattern="^(?:[- a-zA-Z\u00c4-\u00fd]{2,30}){1,3}$" -->

    <p class="error-info noerror">
      <?php echo $microcopy["form-last-err"]; ?>
    </p>

    <label for="organisation">
      <?php echo $microcopy["form-org"]; ?>
    </label>
    <input
      type="text"
      id="organisation"
      name="organisation"
      value="<?php echo empty($_SESSION["organisation"])
        ? ""
        : $_SESSION["organisation"]; ?>"
      placeholder="<?php echo $microcopy["form-org-plh"]; ?>"
    />
    <!-- pattern="^[-\. a-zA-Z0-9\u00c4-\u00fd]{2,100}$" -->

    <p class="error-info noerror">
      <?php echo $microcopy["form-org-err"]; ?>
    </p>

    <label for="email">
      <?php echo $microcopy["form-email"]; ?>
      <abbr title="required">*</abbr>
    </label>
    <input
      type="text"
      id="email"
      name="email"
      value="<?php echo empty($_SESSION["email"]) ? "" : $_SESSION["email"]; ?>"
      placeholder="<?php echo $microcopy["form-email-plh"]; ?>"
      required
    />
    <!-- type="email" -->

    <p class="error-info noerror">
      <?php echo $microcopy["form-email-err"]; ?>
    </p>

    <button
      type="submit"
      name="submit"
      value="submit"
      class="button-primary button-submit"
      autocomplete="off"
    >
      <?php echo $microcopy["form-submit"]; ?>
    </button>
  </form>
</section>

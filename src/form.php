<?php session_start();

  $question1 = (isset($_POST["question1"]) && is_string($_POST["question1"]))
    ? $_POST["question1"]
    : "";
  $question2 = (isset($_POST["question2"]) && is_string($_POST["question2"]))
    ? $_POST["question2"]
    : "";
  $question3 = (isset($_POST["question3"]) && is_string($_POST["question3"]))
    ? $_POST["question3"]
    : "";
  $adress = (isset($_POST["adress"]) && is_string($_POST["adress"]))
    ? $_POST["adress"]
    : "";
  $firstname = (isset($_POST["firstname"]) && is_string($_POST["firstname"]))
    ? $_POST["firstname"]
    : "";
  $lastname = (isset($_POST["lastname"]) && is_string($_POST["lastname"]))
    ? $_POST["lastname"]
    : "";
  $email = (isset($_POST["email"]) && is_string($_POST["email"]))
    ? $_POST["email"]
    : "";
  $privacy = (isset($_POST["privacy"]) && is_string($_POST["privacy"]))
    ? $_POST["privacy"]
    : "";

  $_SESSION["question1"] = $question1 !== "" ? $question1 : $_SESSION["question1"];
  $_SESSION["question2"] = $question2 !== "" ? $question2 : $_SESSION["question2"];
  $_SESSION["question3"] = $question3 !== "" ? $question3 : $_SESSION["question3"];
  $_SESSION["adress"] = $adress !== "" ? $adress : $_SESSION["adress"];
  $_SESSION["firstname"] = $firstname !== "" ? $firstname : $_SESSION["firstname"];
  $_SESSION["lastname"] = $lastname !== "" ? $lastname : $_SESSION["lastname"];
  $_SESSION["email"] = $email !== "" ? $email : $_SESSION["email"];
  $_SESSION["privacy"] = $privacy !== "" ? $privacy : $_SESSION["privacy"];

  if ($_SESSION["step4"] === "submit") {
      $result = [
      "question1" => $_SESSION["question1"],
      "question2" => $_SESSION["question2"],
      "question3" => $_SESSION["question3"],
      "adress" => $_SESSION["adress"],
      "firstname" => $_SESSION["firstname"],
      "lastname" => $_SESSION["lastname"],
      "email" => $_SESSION["email"],
      "privacy" => $_SESSION["privacy"],
    ];

      file_put_contents("antworten.txt", $data);
  }

 ?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multistep Form</title>
  <link rel="stylesheet" href="../dist/vendor/normalize.css/normalize.css">
  <link rel="stylesheet" href="../dist/css/styles.css">
</head>
<body>

<div class="wrapper">

  <pre>
    <?php print_r($_POST) ?>
    <?php print_r($_SESSION) ?>
  </pre>

  <?php if (empty($_POST)  || $_POST['step2'] === 'prev' || $_POST['step5'] === 'confirm'): ?>

    <h1>Wie oft telefonieren Sie mit dem Smartphone?</h1>

    <form method="post" action="index.php">
      <fieldset class="select-buttons">
          <label>
            <input type="radio" name="question1" value="Oft"
            <?php if ($_SESSION["question1"] === "Oft") {
     echo "checked=\"checked\"";
 }?>
            >Oft
          </label>
          <label>
            <input type="radio" name="question1" value="Selten"
            <?php if ($_SESSION["question1"] === "Selten") {
     echo "checked=\"checked\"";
 }?>
            >Selten
          </label>
          <label>
            <input type="radio" name="question1" value="Nie"
            <?php if ($_SESSION["question1"] === "Nie") {
     echo "checked=\"checked\"";
 }?>
            >Nie
          </label>
      </fieldset>
      <div class="button-wrapper">
        <button type="submit" name="step1" value="next">Weiter</button>
      </div>
    </form>

  <?php elseif ($_POST['step1'] === 'next' || $_POST['step3'] === 'prev'): ?>

    <h1>Sind Sie berufstätig?</h1>

    <form method="post" action="index.php">
      <fieldset class="select-buttons">
        <label>
          <input type="radio" name="question2" value="Ja"
          <?php if ($_SESSION["question2"] === "Ja") {
     echo "checked=\"checked\"";
 }?>
          >Ja
        </label>
        <label>
          <input type="radio" name="question2" value="Nein"
          <?php if ($_SESSION["question2"] === "Nein") {
     echo "checked=\"checked\"";
 }?>
          >Nein
        </label>
      </fieldset>
      <div class="button-wrapper">
        <button type="submit" name="step2" value="prev">Zurück</button>
        <button type="submit" name="step2" value="next">Weiter</button>
      </div>
    </form>

  <?php elseif ($_POST['step2'] === 'next' || $_POST['step4'] === 'prev'): ?>

    <h1>Fahren Sie Auto oder halten Sie sich in störgeräuschvollen Umgebungen wie Gaststätten, Büros oder Geschäften auf?</h1>

    <form method="post" action="index.php">
      <fieldset class="select-buttons">
        <label>
          <input type="radio" name="question3" value="Oft"
            <?php if ($_SESSION["question3"] === "Oft") {
     echo "checked=\"checked\"";
 }?>
            >Oft
        </label>
        <label>
          <input type="radio" name="question3" value="Selten"
            <?php if ($_SESSION["question3"] === "Selten") {
     echo "checked=\"checked\"";
 }?>
            >Selten
        </label>
        <label>
          <input type="radio" name="question3" value="Nie"
            <?php if ($_SESSION["question3"] === "Nie") {
     echo "checked=\"checked\"";
 }?>
            >Nie
        </label>
      </fieldset>
      <div class="button-wrapper">
        <button type="submit" name="step3" value="prev">Zurück</button>
        <button type="submit" name="step3" value="next">Weiter</button>
      </div>
    </form>

  <?php elseif ($_POST['step3'] === 'next' || $_POST['step5'] === 'prev'): ?>

    <h1>Bitte geben Sie Ihre Kontaktdaten ein</h1>

    <form method="post" action="index.php">
      <fieldset>
        <label>
          <input type="radio" name="adress" value="Frau"
            <?php if ($_SESSION["adress"] === "Frau") {
     echo "checked=\"checked\"";
 }?>
            >Frau
        </label>
        <label>
          <input type="radio" name="adress" value="Herr"
            <?php if ($_SESSION["adress"] === "Herr") {
     echo "checked=\"checked\"";
 }?>
            >Herr
        </label>
      </fieldset>
      <fieldset class="text-inputs">
        <label>
          <input type="text" name="firstname" placeholder="Vorname" value="
            <?php echo htmlspecialchars($_SESSION["firstname"]);?>
          ">
        </label>
        <label>
          <input type="text" name="lastname" placeholder="Nachname" value="
            <?php echo htmlspecialchars($_SESSION["lastname"]);?>
          ">
        </label>
        <label>
          <input type="email" name="email" placeholder="E-Mail" value="
            <?php echo htmlspecialchars($_SESSION["email"]);?>
          ">
        </label>
      </fieldset>
      <fieldset>
        <label>
          <input type="radio" name="privacy" value="confirmed"
            <?php if ($_SESSION["privacy"] === "confirmed") {
     echo "checked=\"checked\"";
 }?>
            >Ich habe die Datenschutzbedingungen gelesen und erkläre mich einverstanden.
        </label>
      </fieldset>
      <div class="button-wrapper">
        <button type="submit" name="step4" value="prev">Zurück</button>
        <button type="submit" name="step4" value="submit">Senden</button>
      </div>
    </form>

  <?php elseif ($_POST['step4'] === 'submit'): ?>

    <form method="post" action="index.php">
      <h1>Vielen Dank für Ihre Teilnahme</h1>
      <p>Wir kontaktieren Sie in Kürze bezüglich eines Termins</p>
      <button type="button" name="step5" value="confirm">OK</button>
    </form>

  <?php endif ; ?>

</div>

</body>
</html>

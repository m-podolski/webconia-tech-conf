<?php

function initSession()
{
  $_SESSION["firstname"] = isset($_SESSION["firstname"])
    ? $_SESSION["firstname"]
    : "";
  $_SESSION["lastname"] = isset($_SESSION["lastname"])
    ? $_SESSION["lastname"]
    : "";
  $_SESSION["organisation"] = isset($_SESSION["organisation"])
    ? $_SESSION["organisation"]
    : "";
  $_SESSION["email"] = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
}

function readSession()
{
  $firstname =
    isset($_POST["firstname"]) && is_string($_POST["firstname"])
      ? $_POST["firstname"]
      : "";
  $lastname =
    isset($_POST["lastname"]) && is_string($_POST["lastname"])
      ? $_POST["lastname"]
      : "";
  $organisation =
    isset($_POST["organisation"]) && is_string($_POST["organisation"])
      ? $_POST["organisation"]
      : "";
  $email =
    isset($_POST["email"]) && is_string($_POST["email"]) ? $_POST["email"] : "";

  $_SESSION["firstname"] =
    $firstname !== "" ? $firstname : $_SESSION["firstname"];
  $_SESSION["lastname"] = $lastname !== "" ? $lastname : $_SESSION["lastname"];
  $_SESSION["organisation"] =
    $organisation !== "" ? $organisation : $_SESSION["organisation"];
  $_SESSION["email"] = $email !== "" ? $email : $_SESSION["email"];

  $result = [
    "firstname" => $_SESSION["firstname"],
    "lastname" => $_SESSION["lastname"],
    "organisation" => $_SESSION["organisation"],
    "email" => $_SESSION["email"],
  ];
  echo "<pre>" . print_r($_SESSION) . "</pre>";
  echo "<pre>" . print_r($result) . "</pre>";
}

function validateForm()
{
  $ok = true;

  if ($ok) {
    header("Location: http://localhost/webconia/index.php");
    exit();
  }
}

if (isset($_POST["submit"]) && $_POST["submit"] === "Submit") {
  readSession();
}

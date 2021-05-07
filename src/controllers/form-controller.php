<?php

function readForm($fields)
{
  $sanitizedFields = [];

  foreach ($fields as $field) {
    switch ($field) {
      case "email":
        $sanitizedField = filter_var(
          trim($_POST[$field]),
          FILTER_SANITIZE_EMAIL,
        );
        break;
      default:
        $sanitizedField = filter_var(
          trim($_POST[$field]),
          FILTER_SANITIZE_STRING,
          FILTER_FLAG_STRIP_LOW |
            FILTER_FLAG_STRIP_HIGH |
            FILTER_FLAG_STRIP_BACKTICK |
            FILTER_FLAG_ENCODE_AMP,
        );
    }

    $$field =
      !empty($sanitizedField) && is_string($sanitizedField)
        ? $sanitizedField
        : false;

    $sanitizedFields[$field] = $$field;
  }

  return $sanitizedFields;
}

function validateForm($fields)
{
  $invalidFields = [];

  $validNames = "/^(?:[- a-zA-Z\x{00c4}-\x{00fd}]{2,30}){1,3}$/";
  $validOrgName = "/^[-\. a-zA-Z0-9\x{00c4}-\x{00fd}]{2,100}$/";

  foreach ($fields as $name => $field) {
    switch ($name) {
      case "firstname":
      case "lastname":
        if (preg_match($validNames, $field) === false) {
          $invalidFields[$name] = $field;
        }
        break;
      case "organisation":
        if (preg_match($validOrgName, $field) === false) {
          $invalidFields[$name] = $field;
        }
        break;
      case "email":
        if (filter_var($field, FILTER_VALIDATE_EMAIL) === false) {
          $invalidFields[$name] = $field;
        }
        break;
      // This is the honeypot field
      case "website":
        if (empty($field) === false) {
          header("Location: http://localhost/webconia/");
          exit();
        }
        break;
    }
  }

  // Put everything into session for prefilling form fields
  foreach ($fields as $name => $field) {
    $_SESSION[$name] =
      !empty($_SESSION[$name]) && $field === false ? $_SESSION[$field] : $field;
  }

  if (empty($invalidFields)) {
    unset($_SESSION["invalidFields"]);
    return true;
  } else {
    $_SESSION["invalidFields"] = $invalidFields;
    return false;
  }
}

function setupDatabase($dbConfig)
{
  try {
    $db = new MySQLi(
      $dbConfig["server"],
      $dbConfig["user"],
      $dbConfig["password"],
    );

    $setupQueries = [
      "create database if not exists webconia;",
      "use webconia;",
      "create table if not exists visitors (
        id mediumint not null auto_increment,
        firstname varchar(90) not null,
        lastname varchar(90) not null,
        organisation varchar(100) not null,
        email varchar(254) not null,
        primary key(id)
      );",
    ];

    foreach ($setupQueries as $query) {
      $db->query($query);
    }
  } catch (Exception $ex) {
    echo "Connection FAILED:" . $ex->getMessage();
  }
}

function registerVisitor($dbConfig, $fields)
{
  try {
    $db = new MySQLi(
      $dbConfig["server"],
      $dbConfig["user"],
      $dbConfig["password"],
      $dbConfig["dbname"],
    );

    $preparedVisitorEntry = $db->prepare("insert into visitors
      (firstname, lastname, organisation, email)
      values (?,?,?,?)");

    $preparedVisitorEntry->bind_param(
      "ssss",
      $fields["firstname"],
      $fields["lastname"],
      $fields["organisation"],
      $fields["email"],
    );

    $preparedVisitorEntry->execute();
    echo "Data inserted!";
    $db->close();
    header("Location: http://localhost/webconia/src/pages/confirmation.php");
    exit();
  } catch (Exception $ex) {
    echo "Connection FAILED:" . $ex->getMessage();
  }
}

$formFields = ["website", "firstname", "lastname", "organisation", "email"];

$dbConfig = [
  "server" => "localhost",
  "user" => "admin",
  "password" => "Maki88",
  "dbname" => "webconia",
];

if (isset($_POST["setup"]) && $_POST["setup"] === "setup") {
  setupDatabase($dbConfig);
}

if (isset($_POST["submit"]) && $_POST["submit"] === "submit") {
  $readFields = readForm($formFields);
  $isValid = validateForm($readFields);

  if ($isValid) {
    registerVisitor($dbConfig, $readFields);
  }
}

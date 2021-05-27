<?php

class Form
{
  private $fields = [];
  private $sanitizedFields = [];
  private $invalidFields = [];

  public function __construct($formFields)
  {
    $this->fields = $formFields;
  }

  public function getSanitizedFields()
  {
    // remove the honeypot
    return array_diff_key($this->sanitizedFields, ["website" => false]);
  }

  private function read()
  {
    foreach ($this->fields as $field) {
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

      $this->sanitizedFields[$field] = $$field;
    }
  }

  public function validate()
  {
    $this->read();

    // Put everything into session for prefilling form fields
    foreach ($this->sanitizedFields as $name => $field) {
      $_SESSION[$name] =
        !empty($_SESSION[$name]) && $field === false
          ? $_SESSION[$field]
          : $field;
    }

    $validNames = "/^(?:[- a-zA-Z\x{00c4}-\x{00fd}]{2,30}){1,3}$/";
    $validOrgName = "/^[-\. a-zA-Z0-9\x{00c4}-\x{00fd}]{2,100}$/";

    foreach ($this->sanitizedFields as $name => $field) {
      switch ($name) {
        case "firstname":
        case "lastname":
          if (preg_match($validNames, $field) === false) {
            $this->invalidFields[$name] = $field;
          }
          break;
        case "organisation":
          if (preg_match($validOrgName, $field) === false) {
            $this->invalidFields[$name] = $field;
          }
          break;
        case "email":
          if (filter_var($field, FILTER_VALIDATE_EMAIL) === false) {
            $this->invalidFields[$name] = $field;
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

    if (empty($this->invalidFields)) {
      unset($_SESSION["invalidFields"]);
      return $this->getSanitizedFields();
    } else {
      $_SESSION["invalidFields"] = $this->invalidFields;
      return false;
    }
  }
}

class Visitors
{
  public function setupDatabase()
  {
    try {
      $db = new MySQLi(
        DB_CONFIG["server"],
        DB_CONFIG["user"],
        DB_CONFIG["password"],
      );

      $setupQueries = [
        "create database if not exists " . DB_CONFIG["name"] . ";",
        "use " . DB_CONFIG["name"] . ";",
        "create table if not exists " .
        DB_CONFIG["tableName"] .
        " (
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
      $_SESSION["dbsetup"] = true;
    } catch (Exception $ex) {
      $_SESSION["dbsetup"] = "Connection failed:" . $ex->getMessage();
    }
  }

  public function register($fields)
  {
    try {
      $db = new MySQLi(
        DB_CONFIG["server"],
        DB_CONFIG["user"],
        DB_CONFIG["password"],
        DB_CONFIG["name"],
      );

      $preparedVisitorEntry = $db->prepare(
        "insert into " .
          DB_CONFIG["tableName"] .
          " (firstname, lastname, organisation, email)
        values (?,?,?,?);",
      );

      if ($preparedVisitorEntry !== false) {
        $preparedVisitorEntry->bind_param(
          "ssss",
          $fields["firstname"],
          $fields["lastname"],
          $fields["organisation"],
          $fields["email"],
        );
      } else {
        throw new Exception(
          "Invalid SQL command: Check if DB_CONFIG['tableName'] is configured correctly.",
        );
      }

      $preparedVisitorEntry->execute();
      $db->close();
      unset($_SESSION["dbsetup"]);
      header("Location: " . BASE_URL . "src/pages/confirmation.php");
      exit();
    } catch (Exception $ex) {
      echo "</pre>" . "Connection failed:" . $ex->getMessage() . "</pre>";
    }
  }

  public function show()
  {
    try {
      $db = new MySQLi(
        DB_CONFIG["server"],
        DB_CONFIG["user"],
        DB_CONFIG["password"],
        DB_CONFIG["name"],
      );

      $showAllQuery = "select * from " . DB_CONFIG["tableName"] . ";";

      $results = $db->query($showAllQuery);

      unset($_SESSION["visitors"]);
      while ($row = $results->fetch_assoc()) {
        $_SESSION["visitors"][] = $row;
      }
      unset($_SESSION["dbsetup"]);
    } catch (Exception $ex) {
      echo "</pre>" . "Connection failed:" . $ex->getMessage() . "</pre>";
    }
  }
}

$form = new Form(["website", "firstname", "lastname", "organisation", "email"]);
$visitors = new Visitors();

if (isset($_POST["setup"]) && $_POST["setup"] === "setup") {
  $visitors->setupDatabase();
}
if (isset($_POST["submit"]) && $_POST["submit"] === "submit") {
  $validFields = $form->validate();
  if ($validFields !== false) {
    $visitors->register($validFields);
  }
}
if (isset($_POST["show"]) && $_POST["show"] === "show") {
  $visitors->show();
}

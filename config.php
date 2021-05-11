<?php

/////////////// Setup project here /////////////////////////////////////////////

define("PROJECT_DIR", "webconia");
define("DB_CONFIG", [
  "server" => "localhost",
  "user" => "admin",
  "password" => "Maki88",
  "name" => "webconia",
  "tableName" => "visitors",
]);
////////////////////////////////////////////////////////////////////////////////

function url()
{
  $inputUrl = "http://" . $_SERVER["HTTP_HOST"];
  return sprintf(
    "%s://%s/%s/",
    isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] != "off" ? "https" : "http",
    parse_url($inputUrl, PHP_URL_HOST),
    PROJECT_DIR,
  );
}

define(
  "BASE_PATH",
  $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . PROJECT_DIR,
);
define("BASE_URL", url());

<?php

include "Database.php";

$database = new Database();
$koneksi = $database->connect();

if (empty($_SESSION)) {
  session_start();
}
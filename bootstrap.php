<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include 'vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::create(__DIR__);
$dotenv->load();
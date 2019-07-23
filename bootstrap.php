<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use \App\Session;

$session = new Session();

$fm = new \Plasticbrain\FlashMessages\FlashMessages();

$dotenv = \Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$capsule = new Capsule;
$capsule->addConnection([
   "driver"     => getenv('DRIVER'),
   "host"       => getenv('HOST'),
   "database"   => getenv('DB_NAME'),
   "username"   => getenv('DB_USER'),
   "password"   => getenv('DB_PASSWORD')
]);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();
$capsule->bootEloquent();
<?php

   error_reporting(E_ALL);
   ini_set("display_errors", 1);

   include 'vendor/autoload.php';

   use Pimple\Container;

   $container = new Container();

   $container['session'] = function($c){
      return new \App\Session();
   };

   $container['fm'] = function($c){
      return new \Plasticbrain\FlashMessages\FlashMessages();
   };

   $container['dotenv'] = function($c){
      return \Dotenv\Dotenv::create(__DIR__);
   };

   $container['capsule'] = function($c){
      return new \Illuminate\Database\Capsule\Manager;
   };

   $container['auth'] = function($c){
      return new \App\Auth( $c['session'] );
   };

   $container['user'] = function($c){
      return new \App\User();
   };


   $_session = $container['session'];
   $_fm      = $container['fm'];
   $_dotenv  = $container['dotenv']->load();
   $_capsule = $container['capsule'];
   $_auth    = $container['auth'];
   $_user    = $container['user'];

   $_capsule->addConnection([
      "driver"     => getenv('DRIVER'),
      "host"       => getenv('HOST'),
      "database"   => getenv('DB_NAME'),
      "username"   => getenv('DB_USER'),
      "password"   => getenv('DB_PASSWORD')
   ]);

   //Make this Capsule instance available globally.
   $_capsule->setAsGlobal();

   // Setup the Eloquent ORM.
   $_capsule->bootEloquent();
   $_capsule->bootEloquent();
<? session_start(); ?>
<?php require_once __DIR__.'/../../bootstrap.php'; ?>
<?php

  use \App\Auth as Auth;

  if( !Auth::check() ){
    header('location:login.php');
  }

  // if( Auth::check() )
  // {
  //   if( Auth::user()->isAdmin() )
  //   {
  //     echo '<pre>';
  //     print_r(  \App\Client::all()->toArray() );
  //     echo '</pre>';
  //   }else
  //   {
  //     echo '<pre>';
  //     print_r(  Auth::user()->with('client')->where('id_user',Auth::user()->id_user)->get()->toArray() );
  //     echo '</pre>';
  //   }

  // }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Bem Vindo <?= Auth::user()->email ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style type="text/css"></style>

</head>
<body>

<?php require_once __DIR__.'/../../bootstrap.php'; ?>
<?php session_start(); ?>
<?php

  use \App\Auth as Auth;

  if( !Auth::check() ){
    header('location:login.php');
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Bem Vindo <?= Auth::user()->isAdmin() ? 'ADMIN' : Auth::user()->client->name ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <style type="text/css"></style>

</head>
<body>
  <div class="container">
    <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">[...]</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="index.php">Home</a></li>
                  <li><a href="upload.php">Upload</a></li>
                  <!-- <li><a href="#">Contact</a></li> -->
                  <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li role="separator" class="divider"></li>
                      <li class="dropdown-header">Nav header</li>
                      <li><a href="#">Separated link</a></li>
                      <li><a href="#">One more separated link</a></li>
                    </ul>
                  </li> -->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <!-- <li class="active"><a href="#">Default <span class="sr-only">(current)</span></a></li> -->
                  <!-- <li><a href="#">Static top</a></li> -->
                  <li><a href="../login.php">Sair</a></li>
                </ul>
              </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
          </nav>
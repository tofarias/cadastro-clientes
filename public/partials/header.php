<? session_start(); ?>
<?php require_once __DIR__.'/../../bootstrap.php'; ?>

<?php

if( isset($_POST['email']) && isset($_POST['passwd']) )
{
    $user = \App\User::where('email', $_POST['email'])->first();

    if( password_verify($_POST['passwd'], $user->password) )
    {
        $_SESSION['user'] = \App\User::where('email', $_POST['email'])->first()->toArray();
    }
}

if( !isset($_SESSION['user']) )
{
    unset($_SESSION['user']);  
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style type="text/css"></style>

</head>
<body>
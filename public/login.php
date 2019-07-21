<?php 
    session_start(); 

    include '../vendor/autoload.php';
    \App\Auth::logout();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <style type="text/css">
            .login-form {
            width: 340px;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">      
                    <div class="login-form">

                        <form action="home.php" method="post" autocomplete="off">
                            <h2 class="text-center">Acesso Restrito</h2>       
                            <div class="form-group">
                                <input autocomplete="off" autofocus type="text" name="email" class="form-control" placeholder="cpf" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" name="passwd" class="form-control" placeholder="senha" required="required">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Acessar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>
<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Auth
{
    public static function check() : void
    {
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
    }
}
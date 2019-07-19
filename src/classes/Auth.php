<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use \App\User as User;

class Auth
{
    public static function check() : Bool
    {
        $email = trim($_POST['email']);
        $passwd = trim($_POST['passwd']);

        if( isset( $email )  && isset( $passwd ) )
        {
            $user = User::where('email', $_POST['email'])->first();

            if( password_verify($_POST['passwd'], $user->password) )
            {
                $_SESSION['user'] = User::where('email', $_POST['email'])->first();
            }
        }

        if( !isset($_SESSION['user']) )
        {
            unset($_SESSION['user']);
            return false;
            //header('location:login.php');
        }

        return true;
    }

    public static function user() :? User
    {
        return $_SESSION['user'] ?? $_SESSION['user'];
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use \App\User as User;

class Auth
{
    public static function check() : Bool
    {
        if( isset($_POST['email']) && isset( $_POST['passwd'] ) )
        {
            $email = trim($_POST['email']);
            $passwd = trim($_POST['passwd']);
            
            $user = User::where('key', $email)->first();
            if( password_verify($passwd, $user->password) )
            {
                $_SESSION['user'] = $user;
            }
        }

        if( !isset($_SESSION['user']) || (!$_SESSION['user'] instanceof User)  )
        {
            unset($_SESSION['user']);
            return false;
        }

        return true;
    }

    public static function user() :? User
    {
        return $_SESSION['user'] ?? $_SESSION['user'];
    }
}
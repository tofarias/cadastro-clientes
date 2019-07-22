<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use \App\User as User;

class Auth
{
    public function __construct()
    {
        
    }
    public static function check() : Bool
    {
        if (session_status() !== PHP_SESSION_ACTIVE || session_id() === ""){
            session_start(); 
        }        

        if( isset($_SESSION['user']) && ($_SESSION['user'] instanceof User)  )
        {
            return true;
        }
        else
        {
            if( isset($_POST['email']) && isset( $_POST['passwd'] ) )
            {
                $email = trim($_POST['email']);
                $passwd = trim($_POST['passwd']);
                
                $user = User::where('key', $email)->first();
                
                if( ($user instanceof User) && password_verify($passwd, $user->password) )
                {
                    $_SESSION['user'] = $user;
                    unset($_SESSION['msg']);
                    return true;
                }
            }
        }

        return false;
    }

    public static function user() :? User
    {
        return $_SESSION['user'] ?? $_SESSION['user'];
    }

    public function logout()
    {
        if( isset($_SESSION['user']) )
        {
            unset($_SESSION['user']);
        }
    }
}
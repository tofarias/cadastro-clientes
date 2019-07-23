<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use \App\User as User;

class Auth
{
    private static $session;

    public function __construct(Session $session)
    {
        self::$session = $session;
    }

    public static function check() : Bool
    {
        if( isset($_POST['email']) && isset( $_POST['passwd'] ) )
        {
            $email = trim($_POST['email']);
            $passwd = trim($_POST['passwd']);

            $user = User::where('key', $email)->first();

            if( ($user instanceof User) && password_verify($passwd, $user->password) )
            {
                self::$session::set('user', $user);
                return true;
            }
        }

        if( is_null( self::user() ) )
        {
            return false;
        }

        return true;
    }

    public static function user() :? User
    {
        return self::$session::get('user') ?? null;
    }

    public static function logout()
    {
        self::$session::destroy();
    }
}
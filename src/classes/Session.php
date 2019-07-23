<?php

namespace App;

class Session
{
    public function __construct()
    {
        if( session_status() == PHP_SESSION_NONE ){
            session_start();
        }
    }

    public static function get( String $index )
    {
        return $_SESSION[$index] ?? null;
    }

    public static function set( String $index, $value )
    {
        $_SESSION[$index] = $value;
    }

    public static function destroy() : void
    {
        session_destroy();
        session_unset();
    }
}
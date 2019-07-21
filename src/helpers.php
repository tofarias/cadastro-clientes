<?php

if( !function_exists('debug') )
{
    function debug($var) : void
    {
        echo '<pre>';
        print_r( $var );
        echo '</pre>';
    }
}
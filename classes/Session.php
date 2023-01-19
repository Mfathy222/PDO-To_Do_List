<?php

class Session {

    public function __construct()
    {
            session_start();
    }

    // set 

    public function set($key , $value)
    {
        $_SESSION[$key] = $value;
    }
    //get

    public function get($key)
    {
        return $_SESSION[$key];
    }
    //unset
    public function unset($key)
    {
        unset($_SESSION[$key]);
    }


    //destroy

    public function destroy()
    {
        session_destroy();
    }
}
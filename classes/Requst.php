
<?php


class Request {

    public function get($key=null)
    {
        return  ($key!=null) ? (isset($_GET[$key])?  $_GET[$key]  :null) : null;

    }

    public function post($key)
    {
        return  ($key!=null) ? (isset($_POST[$key])?  $_POST[$key]  :null) : null;
    }

    public function hasPost($key)
    {
        return isset($_POST[$key]);
    }
    public function hasGet($key)
    {
        return isset($_GET[$key]);
    }

    public function filter($key) {
            return trim(htmlspecialchars($_POST[$key]));
    }

    public function header($file){
        return header("location:$file");
    }

}
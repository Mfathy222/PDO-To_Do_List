<?php

$host = "localhost";
$userName = "root";
$password = "";
$db_name = "to-do-list";

try{
    $conn = new PDO("mysql:host=$host;dbname=$db_name",$userName,$password);
    
    
}catch(Exception $e){
    echo "connection Failed: ".$e->getMessage();
}


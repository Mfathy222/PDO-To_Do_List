<?php

require_once 'inc/connection.php ';
require_once 'classes/Requst.php ';
require_once 'classes/Session.php';
require_once 'classes/Validation/Required.php';
require_once 'classes/Validation/Str.php';
require_once 'classes/Validation/Validation.php';


$request = new Request;
$session = new Session;

$validation = new Validation;

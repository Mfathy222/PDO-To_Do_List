
<?php
require_once 'Validator.php';

class Required implements validator{

public function check ($key,$value){

    if (empty($value)){
            return "$key is required";
    }else{
            return false;
    }
    
}

}
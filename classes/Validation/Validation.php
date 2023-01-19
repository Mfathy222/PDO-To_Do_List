<?php

class validation{
    private $errors = [];
public function validate($key,$value,$rules){

    foreach($rules as $rule){
            $object = new $rule;
            $error = $object->check($key, $value);
if($error !=false){
                $this->errors[] = $error;
}
    }



}
public function getErore(){
        return $this->errors;
}

}
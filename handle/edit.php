<?php

require_once('../App.php');

if($request->hasPost("submit")&& $request->hasGet("id")){
    $id = $request->get("id");
    $title = $request->filter("title");

    $validation->validate("title", $title, ["Required", "Str"]);
    $error = $validation->getErore();

    if(empty($errors)){
        $stm=$conn->prepare(" SELECT * FROM todo WHERE id =(:id)");
        $stm->bindParam("id", $id, PDO::PARAM_STR);
        $out = $stm->execute();
    if($out){
        $stm=$conn->prepare(" UPDATE todo SET `title`=(:title) WHERE `id`=(:id)");
        $stm->bindParam(":title",$title);
        $stm->bindParam(":id",$id);
        $is_updated = $stm->execute();
if($is_updated){
    $session->set("success", "data updated successfuly ");
    $request->header("../index.php");

}else{
    $session->set("errors", "error at update ");
        $request->header("../index.php");
}




    }else{
        $session->set("errors", "data not found ");
        $request->header("../index.php");
    }





    }else{
        $session->set("errors", $errors);
    $request->header("../edit.php?id=$id");

    }

}else{
    $request->header("../index.php");
}
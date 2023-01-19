<?php
require_once 'inc/header.php';
require_once 'App.php';

?>



<?php


if($request->hasGet('id')){
    $id = $request->get('id');
    $stm=$conn->prepare(" SELECT * FROM todo WHERE id =(:id)");
    $stm->bindParam("id", $id, PDO::PARAM_STR);
    $out = $stm->execute();
if($out){
        $todo = $stm->fetch(PDO::FETCH_ASSOC);
}else{
        $request->header("ïndex.php");
}


}else{
    $request->header("ïndex.php");
}
?>

<body class="container w-50 mt-5">
    <form action="handle/edit.php?id=<?php echo $todo ['id']?>" method="post">
            <textarea type="text" class="form-control"  name="title" id="" placeholder="enter your note here"><?php echo $todo['title']  ?></textarea>
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Update</button>
            </div>  
    </form>
</body>
</html>
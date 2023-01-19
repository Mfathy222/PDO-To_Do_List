<?php
require_once 'inc/header.php';
require_once 'App.php';
?>

<body>

    <div class="container my-3 ">
        <div class="row d-flex justify-content-center">

            <div class="container mb-5 d-flex justify-content-center">
                <div class="col-md-4">
                    <form action="handle/addToDo.php" method="post">
                        <textarea type="text" class="form-control" rows="3" name="title" id=""
                            placeholder="enter your note here"></textarea>
                        <div class="text-center">
                            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 ">Add To
                                Do</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <div class="row d-flex justify-content-between">
            <!-- all -->

            <div class="col-md-3 ">
                <h4 class="text-white">All Notes</h4>

           <?php
           $stm=$conn->query("SELECT * FROM todo WHERE `status`='all'");


             ?>




                <div class="m-2  py-3">
                    <div class="show-to-do">

      <?php
      if($stm->rowCount()<1):
     ?>

                        <div class="item">
                            <div class="alert-info text-center ">
                                empty to do
                            </div>
                        </div>
                        <?php endif;?>

                        <?php  
                        while($todo=$stm->fetch(PDO::FETCH_ASSOC)):
                        ?>

                        <div class="alert alert-info p-2">
                            <h4><?php echo $todo['title'] ?></h4>
                            <h5><?php echo $todo['created_at'] ?></h5>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="edit.php?id=<?php echo $todo['id']?>" class="btn btn-info p-1 text-white">edit</a>

                                <a href="#" class="btn btn-info p-1 text-white">doing</a>
                            </div>

                        </div>
                    <?php endwhile ;
                     ?>
                    </div>
                </div>

            </div>

            <!-- doing -->
            <div class="col-md-3 ">

                <h4 class="text-white">Doing</h4>
                <?php
                 $stm =$conn->query("SELECT * FROM todo WHERE `status`='doing'")
                 ?>

                <div class="m-2 py-3">
                    <div class="show-to-do">


                    <?php if($stm->rowCount()<1):
                        ?>

<div class="item">
    <div class="alert-success text-center ">
        empty to do
    </div>
</div>
<?php endif ; ?>
<?php while($doing=$stm->fetch(PDO::FETCH_ASSOC)):?>

                        <div class="alert alert-success p-2">
                            <h4><?php echo $doing['title'] ?></h4>
                            <h5><?php echo $doing['created_at'] ?></h5>
                            <div class="d-flex justify-content-between mt-3">
                                <a></a>
                                <a href="#" class="btn btn-success p-1 text-white">Done</a>
                            </div>

                        </div>
                        <?php endwhile ;?>
                    </div>
                </div>

            </div>

            <!-- done -->
            <div class="col-md-3">
                <h4 class="text-white">Done</h4>
             <?php
         $stm =$conn->query("SELECT * FROM todo WHERE `status`='done'")
                ?>



                <div class="m-2 py-3">
                    <div class="show-to-do">
                        <?php if($stm->rowCount()<1):?>

                        <div class="item">
                            <div class="alert-warning text-center ">
                                empty to do
                            </div>
                        </div>
         <?php endif ; ?>
             <?php while($done=$stm->fetch(PDO::FETCH_ASSOC)):?>
                        <div class="alert alert-warning p-2">
                            <a href="#" onclick="confirm('are your sure')"
                                class="remove-to-do text-dark d-flex justify-content-end ">X</a>
                            <h4><?php echo $done['title'] ?></h4>
                            <h5><?php echo $done['created_at'] ?></h5>


                        </div>
                    </div>
                    <?php endwhile ;?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
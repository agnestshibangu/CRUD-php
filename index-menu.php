
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style-index-menu.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6a824a900d.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>



        <?php  require_once 'process-menu.php';?>
    
    <div class="container-form">

        <form  class="form" action="process-menu.php" method="POST" >
            <input class="form-item input" type="text" name="title"
            value="<?php echo $title; ?>"  placeholder="Enter a new title">
            <button  class="box-add"  type="submit" name="save"><i class="fas fa-plus"></i></button>
        </form>

    </div>

<div class="container">

            <div class="container-boxes">


                    <?php
                    while($box = $result->fetch_assoc()): ?>
                      
                       <div class="box">
                           <div class="box-title">

                               <?php echo $box['title']?>
                            </div>

                       <a href="index-menu.php?delete=<?php echo $box['id']; ?>"
                            class="btn btn-delete btn-action">
                            <div class="box-trash">
                                <i class="fas fa-trash-alt"></i>
                            </div>
                        </a>
                    
                       </div>
                              
                    <?php endwhile; ?> 



            </div>  


</div>

        





</body>

</html>


</body>
</html>


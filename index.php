
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<div class="container">


                



    <h1><i class="fas fa-book"></i>  <?php echo $_GET['title'] ?></h1>

       

        <?php require_once 'process.php'; ?>

        <?php 
        
            $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
            $title = $_GET['title'];
            $result = $mysqli->query("SELECT * FROM $title") or die($mysqli->error);

          
        
        ?>


        <?php

            function pre_r( $array ) {
                echo '<pre>';
                print_r($array);
                echo '<pre>';
            }
        ?>

                        <div class="container-table">

                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th class="th-action">Action</th> 
                                        </tr>
                                    </thead>

                            <?php
                                while($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['tutorial_title']; ?></td>
                                        <td><?php echo $row['tutorial_author']; ?></td>
                                        <td class="td-btn">
                                            <a href="index.php?edit=<?php echo $row['tutorial_id']; ?>&title=<?php echo $title;?>"
                                            class="btn btn-info btn-action">Edit</a>
                                            <a href="process.php?delete=<?php echo $row['tutorial_id']; ?>&title=<?php echo $title;?>"
                                            class="btn btn-delete btn-action">delete<i class="fas fa-trash-alt"></i></a>
                                        </td>

                            <?php endwhile; ?>

                                    </tr>
                                    
                            </table>

                        </div>


                    <div class="container-form">

                        <form class="form" action="process.php" method="POST">
                            
                        <input type="hidden" name="id" value="<?php echo $id; ?> ">
                        
                        <input class="form-item input" type="text" name="name" 
                            value="<?php echo $name; ?>" placeholder="Enter your name">
                            <input class="form-item input" type="text" name="location"
                            value="<?php echo $location; ?>"  placeholder="Enter your location">
                            <?php 
                                if ($update == true):
                            ?>
                                <button class="form-item btn btn-save btn-width" type="submit" name="update">Update</button>
                        
                            <?php else :?>
                                <button class="form-item btn btn-save btn-width" type="submit" name="save">Save</button>
                            <?php endif; ?>
                        
                        </form>
                    </div>

</div>



</body>
</html>
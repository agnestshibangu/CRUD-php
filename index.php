
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

<?php require_once 'process.php'; ?>

<?php 
    $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM data ORDER by name ASC") or die($mysqli->error);
 
    
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
                                    <th>Action</th> 
                                </tr>
                            </thead>

                    <?php
                        while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['location']; ?></td>
                                <td>
                                    <a href="index.php?edit=<?php echo $row['id']; ?>"
                                    class="btn btn-info">Edit</a>
                                    <a href="index.php?delete=<?php echo $row['id']; ?>"
                                    class="btn btn-delete">delete</a>
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
                         <button class="form-item btn btn-save" type="submit" name="update">Update</button>
                
                    <?php else :?>
                        <button class="form-item btn btn-save" type="submit" name="save">Save</button>
                    <?php endif; ?>
                
                </form>
            </div>




</body>
</html>
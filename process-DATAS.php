<?php


$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));


$resultDatas = $mysqli->query("SELECT * FROM datas ORDER by title ASC") or die($mysqli->error);



$title = '';


if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $mysqli->query("INSERT INTO datas (title) VALUES('$title')") or
    die($mysqli->error);

    header("location: DATAS.php");

}

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $sql = "CREATE TABLE $title ( ".
            "id INT NOT NULL AUTO_INCREMENT, ".
            "tutorial_title VARCHAR(100) NOT NULL, ".
            "tutorial_author VARCHAR(40) NOT NULL, ".
            "submission_date DATE, ".
            "PRIMARY KEY ( id )); ";
    $mysqli->query($sql) or die($musqli->error);

    header("location: DATAS.php");
}





if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM datas WHERE id=$id") or die($mysqli->error);

    header("location: DATAS.php");

}


























?>

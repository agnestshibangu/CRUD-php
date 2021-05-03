<?php

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
$title = $_GET['title'];
$result = $mysqli->query("SELECT * FROM $title") or die($mysqli->error);





$update = false;
$name = '';
$location ='';
$id = 0;

if (isset($_POST['save'])) {
    $author = $_POST['tutorial_author'];
    // $title = $_POST['title'];

    $mysqli->query("INSERT INTO $title (tutorial_author) VALUES('$author')") or
    die($mysqli->error);

    header("location: index.php");

}

if  (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $title = $_GET['title'];
    $mysqli->query("DELETE FROM $title WHERE tutorial_id = $id") or die(mysqli_error($mysqli));

    header("location: index.php");
}

if (isset($_GET['edit'])) {
    $title = $_GET['title'];
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM $title WHERE id=$id") or die($mysqli->error());
  // if (count($result)==1) {
        $row = $result->fetch_array();
        $author = $row['tutorial_id'];
        $id = $row['tutorial_id'];

       

  //  }
}

if (isset($_POST['update'])) {
    $id = $_POST['tutorial_id'];
    $author = $_POST['author'];

    $mysqli->query("UPDATE $title SET author='$author' WHERE id=$id ") or die(mysqli_error($mysqli));
   
    header("location: index.php");


}











?>





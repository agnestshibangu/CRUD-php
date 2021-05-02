<?php


$mysqli = new mysqli('localhost', 'root', '', 'crud') or die (mysqli_error($mysqli));
$result = $mysqli->query('SELECT * FROM boxes ORDER by title ASC') or die (mysqli_error($mysqli));


$title = '';


if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $mysqli->query("INSERT INTO boxes (title) VALUES('$title')") or
    die($mysqli->error);

    header("location: index-menu.php");

}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM boxes WHERE id=$id") or die($mysqli->error);

    header("location: index-menu.php");

}





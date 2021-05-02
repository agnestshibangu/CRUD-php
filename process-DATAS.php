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

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM datas WHERE id=$id") or die($mysqli->error);

    header("location: DATAS.php");

}


























?>

<?php
session_start();
include("connect.php");
$sql = "INSERT INTO topic (title, description, author, created)
        VALUES ("."'".$_POST['title']."', '".$_POST['description']."', '".$_SESSION['u_id']."', "."now());";
$result = mysqli_query($conn, $sql);
header('Location: http://localhost/project00/bord.php');
 ?>

<?php
session_start();
include("inner_connect.php");
$where = $_POST['submit'];
if($where != "Cancel"){ // submit의 값이 Cancel이 아니라면
  $checkSql = "SELECT * FROM topic WHERE id ='".$_POST['id']."';";
  $result = mysqli_query($conn, $checkSql);
  if($result->num_rows == 1){ // 게시물이 존재하면 UPDATE OR DELETE
    if($where == "ModifyOK"){ // UPDATE
      $sql = "UPDATE topic SET title="."'".$_POST['title']."'".", description="."'".$_POST['description']."'"."WHERE id ='".$_POST['id']."';";
      $result = mysqli_query($conn, $sql);
      header('Location: http://localhost/project00/bord_content.php?id='.$_POST['id']);
    } else if ($where == "Delete"){ // DELETE
      $sql = "DELETE FROM topic WHERE id ="."'".$_POST['id']."';";
      $result = mysqli_query($conn, $sql);
      header('Location: http://localhost/project00/bord.php');
    }
  } else { // 존재하지 않을경우, INSERT
    $sql = "INSERT INTO topic (title, description, author, created)
            VALUES ("."'".$_POST['title']."', '".$_POST['description']."', '".$_SESSION['u_id']."', "."now());";
    $result = mysqli_query($conn, $sql);
            header('Location: http://localhost/project00/bord.php');
  }
} else { // submit의 값이 Cancel일 경우
  header('Location: http://localhost/project00/bord.php');
}
 ?>

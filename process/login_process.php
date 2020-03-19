<?php
session_start();
include("connect.php");
$u_id = mysqli_real_escape_string($conn, $_POST['u_id']);
$u_pwd = mysqli_real_escape_string($conn, $_POST['u_pwd']);
$sql = "SELECT * FROM user WHERE u_id='".$u_id."' AND u_pwd='".$u_pwd."'";
$result = mysqli_query($conn, $sql);
if($result->num_rows == 1){ //로그인 성공
  $row = mysqli_fetch_array($result);
  $_SESSION['u_id'] = $row['u_id'];
  header('Location: http://localhost/project00/index.php');
} else { // 로그인 실패
  header('Location: http://localhost/project00/index.php');
}
 ?>

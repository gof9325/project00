<?php
function db_init($host, $duser, $dpwd, $dname){
  $conn = mysqli_connect($host, $duser, $dpwd);
  mysqli_select_db($conn, $dname);
  return $conn;
}
 ?>

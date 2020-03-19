<?php
session_start();
if($_SESSION['u_id']!= null){
  session_destroy();
}
header('Location: http://localhost/project00/index.php');
 ?>

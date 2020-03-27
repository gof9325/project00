<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>글 상세</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <header>
      <?php include("index.php"); ?>
    </header>
    <div class="container">
      <div class="hero-unit">
          <h2>BORD</h2>
          <h3>CONTENT</h3>
      </div>
      <?php
        session_start();
        include("process/outer_connect.php");
        $sql = "SELECT * FROM topic WHERE id =".$_GET['id'];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '<div id="content">';
        echo "제목 : ";
        echo '<p>'.htmlspecialchars($row['title']).'</p>';
        echo "내용 : ";
        echo '<p>'.strip_tags($row['description'], '<a>').'</p>';
        echo '</div>';
        if($_SESSION['u_id']!=null){
          ?>
          <a class="btn" href="http://localhost/project00/write.php?id=<?php echo $_GET['id']?>" >Modify</a>
          <form class="" action="process/bord_process.php" method="POST">
            <input class="btn" type="submit" name="submit" value="Delete">
            <input type="hidden" name="id" value=<?php echo $_GET['id'] ?>>
          </form>
        <?php  } ?>
    </div>
    <script type="text/javascript">
      function askDelte(id) {
        const result = confirm("삭제 하시겠습니까?");
        if(result){
          location.href = "process/bord_process.php"
        }
      }
    </script>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>게시판</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <header>
      <?php include("index.php"); ?>
    </header>
    <div class="container">
      <!-- article start -->
      <div class="hero-unit">
          <h2>BORD</h2>
          <h3>LIST</h3>
      </div>
          <article>
            <div id="bord">
            <?php
              session_start();
              include("process/outer_connect.php");
              if(empty($_GET['id'])){
                $result = mysqli_query($conn, 'SELECT * FROM topic');
                  echo '<div>';
                  echo '<table class="table table-striped table-hover">';
                  echo '<th>No</th>
                        <th>제목</th>
                        <th>내용</th>
                        <th>작성자</th>
                        <th>시간</th>';
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>'.$row['id'].'</td>';
                      echo '<td id="desc"><a href="http://localhost/project00/bord_content.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></td>';
                      echo '<td id="desc"><a href="http://localhost/project00/bord_content.php?id='.$row['id'].'">'.htmlspecialchars($row['description']).'</a></td>';
                      echo '<td>'.$row['author'].'</td>';
                      echo '<td>'.$row['created'].'</td>';
                      echo '</tr>';
                      }
                      echo '</table>';
                      echo '</div>';
                      if($_SESSION['u_id']!=null){echo "<button class=\"btn\" name='write' onclick=\"location.href='write.php'\">글쓰기</button>";}
                } else {
                  header('Location: http://localhost/project00/bord_content.php?id='.$_GET['id']);
                }
                  ?>
              </article>
      </div>
    </div>
  <!-- article end -->
  <script src="https://code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>

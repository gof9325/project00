<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>게시판</title>
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <header>
      <?php include("index.php"); ?>
    </header>
    <!-- article start -->
    <article>
      <h2>게시판</h2>
      <div id="bord">
          <?php
             session_start();
             include("process/connect.php");
             if(empty($_GET['id'])){
               echo "<h3>목록</h3>";
               if($_SESSION['u_id']!=null){echo "<button name='글쓰기' onclick=\"location.href='write.php'\">글쓰기</button>";}
               $result = mysqli_query($conn, 'SELECT * FROM topic');
               echo '<div class="wraper">';
               echo '<div id="bord_line">
                 <p>No</p>
                 <p>제목</p>
                 <p>내용</p>
                 <p>작성자</p>
                 <p>시간</p>
               </div>';
                echo '<div class="table">';
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<div>'.$row['id'].'</div>';
                  echo '<div><a href="http://localhost/project00/bord.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></div>';
                  echo '<div><a href="http://localhost/project00/bord.php?id='.$row['id'].'">'.htmlspecialchars($row['description']).'</a></div>';
                  echo '<div>'.$row['author'].'</div>';
                  echo '<div>'.$row['created'].'</div>';
                  }
                echo '</div>';
                echo '</div>';
              } else {
                $sql = "SELECT * FROM topic WHERE id =".$_GET['id'];
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo '<div id="content">';
                echo "제목 : ";
                echo '<p>'.htmlspecialchars($row['title']).'</p>';
                echo "내용 : ";
                echo '<p>'.strip_tags($row['description'], '<a>').'</p>';
                echo '</div>';
              }
                ?>
      </article>
    </div>
  <!-- article end -->
  </body>
</html>

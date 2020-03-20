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
          echo "<div>";
          echo "<a class='btn' href='http://localhost/project00/write.php?id=".$row['id']."'>수정</a>";
          echo "<a class='btn' href='javascript:go2Post("."http://localhost/project00/process/bord_process, ".$row['id'].", "."Delete".");\'>삭제</a>";
          echo "</div>";
      } ?>
    </div>
    <script type="text/javascript">
      function go2Post(url, id, submit){
        var form = document.createElement("form");
        var parm = new Array();
        var input = new Array();

        form.action = url;
        form.method = "POST";

        param.push(['id',id]);
        param.push(['submit',submit]);

        for (var i = 0; i < parm.length; i++) {
          input[i] = document.createElement("input");
          input[i].setAttribute("type", "hidden");
          input[i].setAttribute("name", param[i][0]);
          input[i].setAttribute("value", param[i][1]);
          form.appendChild(input[i]);
        }
        document.body.appendChild(form);
        form.submit();
      }
    </script>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

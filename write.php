<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>글쓰기 & 수정</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <header>
      <?php include("index.php"); ?>
    </header>
    <div class="container">
        <?php
          $id = $_POST['id'];
          if($id!=null){
            ?>
            <div class="hero-unit">
                <h2>BORD</h2>
                <h3>MODIFY</h3>
            </div>
            <?php
            include("process/outer_connect.php");
            $result = mysqli_query($conn, 'SELECT * FROM topic WHERE id='.$id);
            $row = mysqli_fetch_assoc($result);
            echo '<div>';
            echo '<form class="text-center" action="process/bord_process.php" method="POST">';
            echo '<div><span>title : </span><input class="span4" type="text" name="title" value="'.$row['title'].'"></div>';
            echo '<div><span>content : </span><textarea class="span4" rows="10" type="textarea" name="description">'.$row['description'].'</textarea></div>';
            echo '<input type="hidden" name="id" value="'.$id.'">';
            echo '<div class="">';
            echo '<input class="btn btn-success" type="submit" name="submit" value="ModifyOK">';
            echo '<input class="btn btn-warning" type="submit" name="submit" value="Cancel">';
            echo '</div>';
            echo '</form>';
            echo '</div>';
            exit(); } else {?>
            <div class="hero-unit">
                <h2>BORD</h2>
                <h3>WRITE</h3>
            </div>
            <div>
                <form class="text-center" action="process/bord_process.php" method="POST">
                      <div> <span>title : </span><input class="span4" type="text" name="title"></div>
                      <div> <span>content : </span><textarea class="span4" rows="10" type="textarea" name="description"></textarea></div>
                      <div class="">
                    <input class="btn btn-success" type="submit" name="submit" value="WriteOK">
                    <input class="btn btn-warning" type="submit" name="submit" value="Cancel">
                  </div>
                </form>
            </div>
          <?php  } ?>
    </div>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

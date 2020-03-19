<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>로그인</title>
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <header>
      <h1><a href="http://localhost/project00/index.php">Project00</a></h1>
    </header>
    <div id='menu_box'>
      <button type="button" name="bord" onclick="location.href='bord.php'">게시판</button>
    </div>
    <div id='login_box'>
      <div id='login_box0'>
      <?php
        session_start();
        if($_SESSION['u_id'] == null){
       ?>
      <form action="http://localhost/project00/process/login_process.php" method="POST">
      아이디 : <input type="text" name="u_id" value=""><br/>
      비밀번호 : <input type="password" name="u_pwd" value="">
      <input type="submit" name="login" value="로그인">
      <input type="submit" name="join" value="회원가입">
      </form>
      <?php
      } else {
           ?>
      <form action="http://localhost/project00/process/logout_process.php" method="post">
      <p> <?php echo $_SESSION['u_id']; ?> 님이 로그인 하였습니다.</p>
      <input type="submit" name="logout" value="로그아웃">
      </form>
      <?php
      }
        ?>
      </div>
    </div>
    <!-- login_box end -->
    <?php include("footer.php"); ?>
  </body>
</html>

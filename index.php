<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Project00</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" id="top_box">
      <div class="container">
          <a class="brand" href="http://localhost/project00/index.php">Project00</a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li><a href="http://localhost/project00/bord.php">게시판</a></li>
            <li><a href="http://localhost/project00/mypage.php">내 정보</a></li>
          </ul>
          <?php
            session_start();
            if($_SESSION['u_id'] == null){
           ?>
          <form class="navbar-form pull-right" action="http://localhost/project00/process/login_process.php" method="POST">
            <input class="span2" type="text" name="u_id" placeholder="아이디">
            <input class="span2" type="password" name="u_pwd" placeholder="비밀번호">
            <input class="btn" type="submit" name="login" value="로그인">
            <input class="btn" type="submit" name="join" value="회원가입">
          </form>
          <?php
          } else {
               ?>
          <form class="navbar-form pull-right" action="http://localhost/project00/process/logout_process.php" method="POST">
          <span id="white"><?php echo $_SESSION['u_id']; ?> 님이 로그인 하였습니다.</span>
          <input class="btn" type="submit" name="logout" value="로그아웃">
          </form>
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- top nav bar end -->
    <?php include("footer.php"); ?>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>글쓰기</title>
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <header>
      <?php include("index.php"); ?>
    </header>
    <article>
      <form class="" action="process/bord_process.php" method="POST">
          제목 : <input type="text" name="title"><br/>
          내용 : <textarea type="textarea" name="description"></textarea>
          <input type="submit" name="" value="완료">
          <input type="submit" name="" value="취소">
      </form>
    </article>
  </body>
</html>

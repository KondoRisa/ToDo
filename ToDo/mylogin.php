<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8"/>
  <link rel="icon" type="image/png" href="fav.png"> <!-- ファビコンの設定  -->
</head>
<body>

<?php
  $input_id = $_POST['input_id'];
  $input_passwd = md5($_POST['input_passwd']);

  $db = new SQLite3("pblone.db");

  $stmt = $db->prepare("SELECT * FROM user WHERE id = :input_id");

  $stmt->bindValue(':input_id', $input_id);

  $res = $stmt->execute();
  $res = $db->query("SELECT * FROM user");

  $i = 0;
  while($row = $res->fetchArray()){
    if($row["id"] == $input_id){
      if($row["password"] == $input_passwd && $input_id != ""){
        session_start();
        $_SESSION['userid'] = $input_id; 
        header("Location:02.php");
        $i = 1;
      }
    }
  }
  if($i == 0){
    header("Location:myerror.html");
  }
  $db->close();
?>
</body>
</html>

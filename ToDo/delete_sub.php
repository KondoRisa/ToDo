<!DOCTYPE html>
<html lang="ja">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="icon" type="image/png" href="fav.png"> <!-- ファビコンの設定  -->
<title>削除実行画面</title>
<style>
input[type = "button"]{
          font-family: 'Kosugi Maru', sans-serif;
          border: 0;
          background-color: #000000;
          display: block;
          margin: 20px auto;
          border: 2px solid #f0f8ff;
          padding: 15px 10px;
          width: 200px;
          outline: none;
          color: #f0f8ff;
          border-radius: 25px;
          transition: 0.25s;
          text-align: center;
          cursor: pointer;
  }
input[type = "button"]:hover{
    background-color: #66ffff;
    border: 2px solid #66ffff;
    color: #000;
  }
body {
    color: #ffffff;
    background-color: #000000;
  }

</style>
</head>
<body>
<?php
session_start();

//$id = 3; //要修正　:近藤
$id = $_POST['taskId'];

$db = new SQLite3("pblone.db");

$user = $_SESSION['userid'];
$stmt = $db->prepare("DELETE FROM $user
WHERE
taskId = :taskId
");

$stmt->bindValue( ':taskId', $id, SQLITE3_INTEGER);

$stmt->execute();

//var_dump($db->changes()); // int(1)


$db->close();

?>
<div align="center">
<br><br><br>タスクが削除されました
</div><br>
<input type="button" onclick="location.href='./02.php'" value="ホーム画面に戻る">
</body>
</html>

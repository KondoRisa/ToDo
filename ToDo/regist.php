<!DOCTYPE html>
<html lang="ja">
<html>
<head>
<meta charset="UTF-8"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="fav.png"> <!-- ファビコンの設定  -->
<title>編集の登録</title>
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
date_default_timezone_set('Asia/Tokyo');
session_start();
$name = $_SESSION['userid'];
$taskId = $_POST["taskId"];
$taskName = $_POST["taskName"];
$taskYear = $_POST["taskYear"];
$taskMonth = $_POST["taskMonth"];
$taskDate = $_POST["taskDate"];
$taskStart_hour = $_POST["taskStart_hour"];
$taskStart_min = $_POST["taskStart_min"];
$taskEnd_hour = $_POST["taskEnd_hour"];
$taskEnd_min = $_POST["taskEnd_min"];
$category = $_POST["category"];
$TaskContents = $_POST["TaskContents"];
$kanryou = $_POST["kanryou"];
$doHide = $_POST["doHide"];

// データが設定されてなければ終了
//if(empty($_POST["taskName"]) || empty($_POST["taskYear"]) || empty($_POST["taskMounth"]) || empty($_POST["taskDate"]) || empty($_POST["taskStart_hour"])
 //|| empty($_POST["taskStart_min"]) |\ | empty($_POST["taskEnd_hour"]) || empty($_POST["taskEnd_min"])  || empty($_POST["category"]) || empty($_POST["doHide"])){
 //exit(データが登録されていません);
//}

try {
  $db = new SQLite3('pblone.db');
} catch (Exception $e) {
  print 'データベース接続エラー<br>';
  print $e->getTraceAsString();
}

$stmt = $db->prepare("UPDATE $name
  SET
  taskName = :taskName,
  taskYear = :taskYear,
  taskMonth = :taskMonth,
  taskDate = :taskDate,
  taskStart_hour = :taskStart_hour,
  taskStart_min = :taskStart_min,
  taskEnd_hour = :taskEnd_hour,
  taskEnd_min = :taskEnd_min,
  category = :category,
  kanryou = :kanryou,
  TaskContents = :TaskContents,
  doHide = :doHide
  WHERE
  taskId = :taskId
");

$stmt->bindValue( ':taskName', $taskName);
$stmt->bindValue( ':taskYear', $taskYear);
$stmt->bindValue( ':taskMonth', $taskMonth);
$stmt->bindValue( ':taskDate', $taskDate);
$stmt->bindValue( ':taskStart_hour', $taskStart_hour);
$stmt->bindValue( ':taskStart_min', $taskStart_min);
$stmt->bindValue( ':taskEnd_hour', $taskEnd_hour);
$stmt->bindValue( ':taskEnd_min', $taskEnd_min);
$stmt->bindValue( ':category', $category);
$stmt->bindValue( ':kanryou', $kanryou);
$stmt->bindValue( ':TaskContents', $TaskContents);
$stmt->bindValue( ':doHide', $doHide);
$stmt->bindValue( ':taskId', $taskId);

$res = $stmt->execute();
if (!$res) {
  exit('データを登録できませんでした');
}

$db->close();
?>
<div align="center">
<br><br><br>登録が終わりました
</div><br>
<input type="button" value="ホーム画面に戻る" onclick="location.href='./02.php'">
</body>
</html>

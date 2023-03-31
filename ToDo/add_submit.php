<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8"/>
<link rel="icon" type="image/png" href="fav.png"> <!-- ファビコンの設定  -->
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
$loginUser = $_SESSION['userid'];
try {
  $db = new SQLite3('pblone.db');
} catch (Exception $e) {
  print 'データベース接続エラー<br>';
  print $e->getTraceAsString();
}

$ip = $_SERVER['REMOTE_ADDR'];
$host = gethostbyaddr($ip);
$id = null;
$loginUserId = null;
$taskName = $_POST["taskName"];
$taskYear = $_POST["taskYear"];
$taskMonth = $_POST['taskMonth'];
$taskDate = $_POST['taskDate'];
$taskStart_hour = $_POST['taskStart_hour'];
$taskStart_min = $_POST['taskStart_min'];
$taskEnd_hour = $_POST['taskEnd_hour'];
$taskEnd_min = $_POST['taskEnd_min'];
$category = $_POST['category'];
$TaskContents = $_POST['TaskContents'];


//要修正　近藤
$doSummarize = $_POST['doSummarize'];
$cycle = $_POST['cycle'];
$ptaskStart_year = $_POST['ptaskStart_year'];
$ptaskStart_month = $_POST['ptaskStart_month'];
$ptaskStart_date = $_POST['ptaskStart_date'];
$ptaskEnd_year = $_POST['ptaskEnd_year'];
$ptaskEnd_month = $_POST['ptaskEnd_month'];
$ptaskEnd_date = $_POST['ptaskEnd_date'];
//

$doHide = $_POST['doHide'];
$kanryou = "0";


$stmt = $db->prepare("INSERT INTO $loginUser VALUES (:taskId, :taskName, :taskYear, :taskMonth, :taskDate, :taskStart_hour, :taskStart_min, :taskEnd_hour, :taskEnd_min, :category, :TaskContents, :doHide, :kanryou)");

$stmt->bindValue( ':taskName', $taskName);
$stmt->bindValue( ':taskYear', $taskYear);
$stmt->bindValue( ':taskMonth', $taskMonth);
$stmt->bindValue( ':taskDate', $taskDate);
$stmt->bindValue( ':taskStart_hour', $taskStart_hour);
$stmt->bindValue( ':taskStart_min', $taskStart_min);
$stmt->bindValue( ':taskEnd_hour', $taskEnd_hour);
$stmt->bindValue( ':taskEnd_min', $taskEnd_min);
$stmt->bindValue( ':category', $category);
$stmt->bindValue( ':TaskContents', $TaskContents);
$stmt->bindValue( ':doHide', $doHide);
$stmt->bindValue( ':kanryou', $kanryou);

$res = $stmt->execute();
/*
if($res){
  echo "成功";
}
else{
  echo "失敗";
}
*/
$db->close();
?>

<div align="center">
<br><br><br>タスクの追加が完了しました。
</div><br>
<input type="button" onclick="location.href='./02.php'" value="ホーム画面に戻る"><br><br>
</body>
</html>

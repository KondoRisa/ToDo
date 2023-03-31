<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="fav.png"> <!-- ファビコンの設定  -->
<title>タスクの完了</title>
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
<?php //https://gray-code.com/php/update-by-using-sqlite3/
	date_default_timezone_set('Asia/Tokyo');
	session_start();
	//更新するテーブル名，タスク情報の受け取り
	$taskId = $_POST['taskId'];
	$name = $_SESSION['userid'];
	$kanryou = "1";

	$db = new SQLite3("pblone.db");
	$stmt = $db->prepare("UPDATE $name
		SET
		kanryou = :kanryou
		WHERE
		taskId = :taskId
	");
	$stmt->bindValue(':taskId', $taskId);
	$stmt->bindValue(':kanryou', $kanryou);
	$stmt->execute();
	$db->close();
?>
<div align="center"><br><br><br>タスクが完了しました．</div><br>
<input type="button" onclick="location.href='./02.php'" value="ホーム画面に戻る"><br>
</body>
</html>

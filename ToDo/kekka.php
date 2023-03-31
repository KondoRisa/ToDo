<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  	<link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
      <link rel="icon" type="image/png" href="fav.png"> <!-- ファビコンの設定  -->
    <title>検索結果画面</title>
    <?php
    session_start();
    $table = $_SESSION['userid'];
    $time_flag = 0;
    $taskname = $_POST['keyword'];
    $duedate_s = $_POST['taskStart_year'].$_POST['taskStart_month'].$_POST['taskStart_date'];
    $duedate_e = $_POST['taskEnd_year'].$_POST['taskEnd_month'].$_POST['taskEnd_date'];
    $category = $_POST['category'];
    $db = new PDO("sqlite:pblone.db");
    if($_POST['category'] != ""){ //カテゴリ検索
        $category = $_POST['category'];
        $res = $db->query("select * from $table where category='$category'");
    }
    else if($_POST['keyword'] != ""){ //キーワード検索
        $keyword = $_POST['keyword'];
        $res = $db->query("select * from $table where taskName like '%$keyword%' OR category like '%$keyword%' OR taskContents like '%$keyword%'");
    }
    else{ //年月日検索
        $res = $db->query("select * from $table");
    }
    if( $duedate_s != null){
        $time_flag = 1;
    }
    $tasks = array();
    ?>
</head>
<style>
.box{
    width: 45%;
    border: #66ffff 1px solid;
    padding:10px;
    font-weight: bold;
}
body {
    color: #ffffff;
    background-color: #000000;
}

.b{
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

.a{
    font-family: 'Kosugi Maru', sans-serif;
    border: 0;
    background-color: #000000;
    display: block;
    margin: 20px auto;
    border: 2px solid #f0f8ff;
    padding: 15px 10px;
    width: 100px;
    outline: none;
    color: #f0f8ff;
    border-radius: 25px;
    transition: 0.25s;
    text-align: center;
    cursor: pointer;
}

input[type = "submit"]:hover,input[type = "button"]:hover{
    background-color: #66ffff;
    border: 2px solid #66ffff;
    color: #000;
}

th.zz{
    border: none;
}

td.aa{
    border: none;
}
</style>

<body>
<div align = "center">
    <?php
    $i = 0;
    foreach( $res as $time ){
        if( $time_flag == 1){
            $duedate = $time['taskYear'].$time['taskMonth'].$time['taskDate'];
            if ( $duedate_s <= $duedate && $duedate <= $duedate_e ){
                $tasks[$i] = $time;
                $i++;
            }
        }
        else{
            $tasks[$i] = $time;
            $i++;
        }
    }
    ?>
    <h2>検索結果は <?=$i?>件 です。</h2>
    <?php
        if( $i == 0 ){
            echo "条件に合うタスクはありません";
        }
        else{
            echo "<table border=\"1\" style=\"border-collapse: collapse\" bordercolor=\"#000000\">";
            echo "<tr>";
            echo "<th bgcolor=\"696969\">&emsp;開始時間・終了時間&emsp;</th>";
            echo "<th bgcolor=\"505050\">&emsp;タスクの名前&emsp;</th>";
            echo "<th class = \"zz\"></th>";
            echo "</tr>";
            for( $i = 0; $i < count($tasks); $i++ ){
                echo"<tr bgcolor=\"696969\">";
                echo "<td>&emsp;".$tasks[$i]['taskStart_hour']."時".$tasks[$i]['taskStart_min']."分～"
                 .$tasks[$i]['taskEnd_hour']."時".$tasks[$i]['taskEnd_min']."分&emsp;</td>";
                echo "<td bgcolor=\"505050\">&emsp;".$tasks[$i]['taskName']."&emsp;</td>";
                $url = "task_property.php?taskName=".$tasks[$i]['taskName']."&taskId=".$tasks[$i]['taskId']."&taskYear=".$tasks[$i]['taskYear']."&taskMonth=".$tasks[$i]['taskMonth']
                ."&taskDate=".$tasks[$i]['taskDate']."&taskStart_hour=".$tasks[$i]['taskStart_hour']
                ."&taskStart_min=".$tasks[$i]['taskStart_min']."&taskEnd_hour=".$tasks[$i]['taskEnd_hour']
                ."&taskEnd_min=".$tasks[$i]['taskEnd_min']."&category=".$tasks[$i]['category']."&TaskContents=".$tasks[$i]['TaskContents']."&kanryou=".$tasks[$i]['kanryou'];
                echo "<td class =\"aa\" bgcolor=\"000000\">"."<input type=\"button\" class=\"a\" onclick=\"location.href='$url'\" value=\"詳細\">"."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
    </div>
    <br><br>
    <div align="center">
        <input type="button" class="b" onclick=history.back() value="検索画面に戻る">
    </div>
    <div align="center">
        <input type="button" class="b" onClick="history.go(-2); return false;" value="ホーム画面に戻る">
    </div>
</body>

</html>

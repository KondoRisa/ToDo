<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="fav.png"> <!-- ファビコンの設定  -->
  <title>開発中</title>  <!-- タイトルの設定  -->
  <style>
  /*CSS*/
  .box { /*https://qiita.com/7note/items/a12d57c36550033d2b0a*/
    width: 800px;
    height: 250px;
    border: 1px solid #000;
    overflow-y: scroll;  /* 縦方向にスクロール可能にする */
    font-size: 120%;
  }
  .box input{
    font-size: 90%;
  }
  input{
    font-size: 110%;
  }
  </style>
</head>

<body>
  <h2>
    <span id="year"></span>年<span id="month"></span>月<span id="day"></span>日 (<span id="dayOfTheWeek"></span>)&nbsp;予定のタスク
  </h2>

  <div align="center">
    <div id="taskList" align="center" class="box">    <!-- 表示されているタスクを表示するためのdiv -->
      <?php
      $year = $_POST[];
      $month = $_POST[]; //2桁
      $date = $_POST[]; //2桁
      $db = new SQLite3('pblone.db');
      $name = $_SESSION['userid'];
      $stmt = $db->prepare("SELECT * FROM $name
        WHERE
        taskDate = :taskDate
        AND
        taskMonth = :taskMonth
        AND
        taskYear = :taskYear
        ");
        $stmt->bindValue( ':taskDate', $date, SQLITE3_TEXT);
        $stmt->bindValue( ':taskMonth', $month, SQLITE3_TEXT);
        $stmt->bindValue( ':taskYear', $year, SQLITE3_TEXT);
        $res = $stmt->execute();

        echo '<table>';
        while($data = $res->fetchArray()) {
          echo '<tr>';
          echo '<td>';
          echo($data[5]);
          echo '：';
          echo($data[6]);
          echo '～';
          echo($data[7]);
          echo '：';
          echo($data[8]);
          echo '&emsp;</td>';

          echo '<td>';
          echo($data[1]);
          echo '&emsp;</td>';

          echo '<td>';
          echo($data[10]);
          echo '&emsp;</td>';
          echo '<td style="text-align:right;">';
          echo "<form action='09.php' method='get'>
          <input type='hidden' name='taskId' value='$data[0]'>
          <input type='hidden' name='taskName' value='$data[1]'>
          <input type='hidden' name='taskYear' value='$data[2]'>
          <input type='hidden' name='taskMonth' value='$data[3]'>
          <input type='hidden' name='taskDate' value='$data[4]'>
          <input type='hidden' name='taskStart_hour' value='$data[5]'>
          <input type='hidden' name='taskStart_min' value='$data[6]'>
          <input type='hidden' name='taskEnd_hour' value='$data[7]'>
          <input type='hidden' name='taskEnd_min' value='$data[8]'>
          <input type='hidden' name='category' value='$data[9]'>
          <input type='hidden' name='TaskContents' value='$data[10]'>";
          echo "<input type='hidden' name='kanryou' value='$data[10]'>
          <input type='submit' value='詳細'>
          </form>";
          echo '</td>'; //09.phpの仕様に合わせるため，変更．taskIdの追加 :近藤\
          echo '<tr>';
        }
        echo '</table>';
        $db->close();
        ?>
      </div>
    </div>
    <br>

    <div align="center">
      <input type="button" value="タスクの追加" Onclick="add()">&emsp;&emsp;
      <input type="button" value="ホーム画面に戻る" onclick="location.href='./02.php'"><br><br><br><br>
    </div>

    <script type="text/javascript">
      var date = new Date();
      var year = date.getFullYear();
      var month = date.getMonth() + 1;
      var day = date.getDate();
      var dayOfweek = ["日", "月", "火", "水", "木", "金", "土"] //https://www.sejuku.net/blog/22867
      var dayWeeknum = date.getDay();

      document.getElementById("year").innerHTML = year;
      document.getElementById("month").innerHTML = month;
      document.getElementById("day").innerHTML = day;
      document.getElementById("dayOfTheWeek").innerHTML = dayOfweek[dayWeeknum];

    </script>
  </body>
</html>

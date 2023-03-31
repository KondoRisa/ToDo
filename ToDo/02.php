<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="fav.png">  <!-- ファビコンの設定 https://www.irasutoya.com/2013/03/blog-post_5326.html-->
  <title>ホームページ</title>  <!-- タイトルの設定  -->
  <style>
  /*CSS*/
  .Sun{
    color: red;
  }

  .Sat{
    color: blue;
  }

  td{
    text-align: center;
  }

  table td{
    font-size: 120%;
    word-break: break-all;
  }

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

  /*table取り消し線*/
  .border {
    position: relative;
  }

  .border::after {
    width: 100%;
    height: 100%;
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    background: linear-gradient(
      transparent 47%,
      #000000 20%,
      #000000 50%,
      #000000 20%,
      transparent 52%
    );
  }
.add, .search{
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
    width: 50px;
    outline: none;
    color: #f0f8ff;
    border-radius: 25px;
    transition: 0.25s;
    text-align: center;
    cursor: pointer;
  }

  .shousai{
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

  .logout{
    font-family: 'Kosugi Maru', sans-serif;
    border: 0;
    background-color: #000000;
    display: block;
    margin: -80px 10px 20px auto;
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

  input[type = "submit"]:hover, input[type = "button"]:hover{
    background-color: #66ffff;
    border: 2px solid #66ffff;
    color: #000;
    }

  </style>

  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://zeptojs.com/zepto.min.js"></script> -->

  <script type="text/javascript">

  function chCalendar(x){
    //月と日付
    if( x == 1 && calmonth == 12 ){
      calmonth = 1;
      calyear += x;
    }
    else if( x == -1 && calmonth == 1 ){
      calmonth = 12;
      calyear += x;
    }
    else{
      calmonth += x;
    }

    var startDayOfWeek = new Date(calyear, calmonth-1, 1).getDay(); //1日の曜日

    var maxday; //月別の日数
    //月別の日数を判定
    if ( calmonth == 4 || calmonth == 6 || calmonth == 9 || calmonth == 11 ){
      maxday = 30;
    }
    else if( calmonth == 2 ){
      if( calyear % 400 == 0 || ( calyear % 4  == 0 && year % 100 != 0 ) ){
        maxday = 29;
      }
      else{
        maxday = 28;
      }
    }
    else{
      maxday = 31;
    }

    //console.log(calmonth + ","+ maxday); // !!!確認用!!! OK

    table = "<table width='500' height='500' margin='auto'>";
    table += '<tr><h2><span id="calyear"></span>年<span id="calmonth"></span>月のカレンダー</h2></tr>';
    table += '<tr><th class="Sun">日</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th class="Sat">土</th></tr>';

    var start;
    for( start = 0; start < 7; start++ ){
      if (start == startDayOfWeek){
        break;
      }
    }
    var skip = false;
    day = 1;
    cnt = 0;
    while( day <= maxday ){ //0%7=0とするため，0スタート
      week = new Date(calyear, calmonth-1, day).getDay();
      if( week == 0 ){
        table += '<tr class="day">';
        table += '<td class="Sun">';
      }
      else if( week == 6 ){
        table += '<td class="Sat">';
      }
      else{
        table += '<td>';
      }

      if( !skip && cnt < start ){
        table += '</td>';
        cnt++;
      }
      else{
        skip = true;
        table += day; //日付

        if(
          <?php
          $cnt = 0;/*
          session_start();
          $name = $_SESSION['userid'];

            $db = new SQLite3('pblone.db');
            $stmt = $db->prepare("SELECT count FROM $name
              WHERE
              taskDate = :taskDate
              AND
              taskMonth = :taskMonth
              AND
              taskYear = :taskYear
              ");
              $stmt->bindValue( ':taskDate', $date);
              $stmt->bindValue( ':taskMonth', $month);
              $stmt->bindValue( ':taskYear', $year);

              $res = $stmt->execute();
              $db->close();*/
              echo "$cnt";
            ?> > 0){ //タスクがあれば
          table += '<br><span style="color:green;">●</span>';
          /*day = ("0" + day).slice(-2); //日付を2桁で取得
          month = ("0" + calmonth).slice(-2); //月を2桁で取得
          year = ("0" + calyear).slice(-2);
          $.get("day-task.php?year=" + year + "&month=" + month + "&day=" + day);*/

        }



        table += '</td>';
        day++;
      }

    }

    table += '</table>';
    document.getElementById("calendar").innerHTML = table;
    document.getElementById("calyear").innerHTML = calyear;
    document.getElementById("calmonth").innerHTML = calmonth;
  }

  /*
  function is_task(year, month, day){
    $.ajax({
      type: "POST",
      url: "02.php",
      data: { '年': year, '月': month, '日': day},
      dataType : "json",
      scriptCharset: 'utf-8'
    })
    .then(
      function(param){
        return param;
      },
      function(XMLHttpRequest, textStatus, errorThrown){ //　エラーが起きた時はこちらが実行される
        console.log(XMLHttpRequest); //　エラー内容表示
      }
    );


    <?php
    /*
    $year = $_POST['年'];
    $month = $_POST['月'];
    $day = $_POST['日'];

    $name = $_SESSION['userid'];
    $db = new SQLite3("pblone.db");

    $stmt = $db->prepare("SELECT COUNT(*) FROM $name
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
    $stmt->execute();

    $cnt = $db->querySingle($stmt);
    $db->close();
    echo $cnt;
    */
    ?>

  }*/

</script>
</head>

<body bgcolor="#000000" text="#ffffff">
  <h1>
    <span id="year"></span>年<span id="month"></span>月<span id="day"></span>日 (<span id="dayOfTheWeek"></span>)
    &emsp;&emsp;
    <?php
    session_start();
    $name = $_SESSION['userid'];
    echo $name;
    ?>
    さんの本日のタスク
  </h1>

  <input type="button" value="Logout" class="logout" onclick="location.href='./index.html'">
  <br>
  <div align="center">
    <div id="taskList" align="center" class="box" style="color:#000000; background-color:#dcdcdc">    <!-- 格納されているタスクを表示するためのdiv -->
      <?php
      $name = $_SESSION['userid']; //ログイン画面からuseridを受け取る
      $year = date("Y");
      $month = date("m"); //2桁
      $date = date("d"); //2桁
      $db = new SQLite3('pblone.db');
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
          if($data[12]=="1"){
            echo '<td class="border", width="220px">';
            echo($data[5]);
            echo '：';
            echo($data[6]);
            echo '～';
            echo($data[7]);
            echo '：';
            echo($data[8]);
            echo '&emsp;</td>';

            echo '<td class="border">';
            echo($data[1]); //タスクの名前
            echo '&emsp;</td>';

            if($data[11]=="no"){
              echo '<td class="border">';
              echo($data[10]);
              echo '&emsp;</td>';
            }
            else {
              echo '<td class="border">';
              echo "*****"; //タスクの内容→伏字
              echo '&emsp;</td>';
            }
          }
          else{
            echo '<td width="220px">';
            echo($data[5]);
            echo '：';
            echo($data[6]);
            echo '～';
            echo($data[7]);
            echo '：';
            echo($data[8]);
            echo '&emsp;</td>';

            echo '<td>';
            echo($data[1]); //タスクの名前
            echo '&emsp;</td>';

            if($data[11]=="no"){
              echo '<td>';
              echo($data[10]);
              echo '&emsp;</td>';
            }
            else {
              echo '<td>';
              echo "*****"; //タスクの内容→伏字
              echo '&emsp;</td>';
            }
          }


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
          <input type='hidden' name='TaskContents' value='$data[10]'>
          <input type='hidden' name='doHide' value='$data[11]'>
          <input type='hidden' name='kanryou' value='$data[12]'>
          <input type='submit' class='shousai' value='詳細'>
          </form>";
          echo '</td>'; //09.phpの仕様に合わせるため，変更．taskIdの追加 :近藤
          echo '</tr>';
        }
        echo '</table>';
        $db->close();
        ?>
      </div>
    </div>

    <table align = "center">
       <tr>
        <td><input type="submit" value="タスクの追加" class="add" onclick="location.href='./04.html'"></td><td>&emsp;</td>
        <td><input type="button" value="タスクの検索" class="search" onclick="location.href='./06.html'"></td>
      </tr>

    </table><br><br>
    <table align="center" style="color:#000000; background-color:#dcdcdc">
      <tr>
        <td>
          <input type="button" class="a" value="<" Onclick="chCalendar(-1)">&emsp;&emsp;
        </td>
        <td>
          <div id="calendar" ><!-- 表示のためのdiv --></div>
        </td>

        <td>
          <input type="button" class="a" value=">" Onclick="chCalendar(1)">&emsp;&emsp;
        </td>
      </tr>
    </table>
    <br>

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

    var calyear = year;
    var calmonth = month;
    chCalendar(0);
    document.getElementById("calyear").innerHTML = calyear;
    document.getElementById("calmonth").innerHTML = calmonth;
    </script>
  </body>
  </html>

<!DOCTYPE html> <!-- データベース未使用 時間があれば未完成機能を-->
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="fav.png"> <!-- ファビコンの設定  -->
    <title>詳細画面</title>
</head>

<style>

  body {
    color: #ffffff;
    background-color: #000000;
  }

  /* 枠のタイトル */
  .boxtitle{
    position: absolute;
    padding: 0 0.3em;
    left: 30px;
    top: -13px;
    font-weight: bold;
    color: white;
    background-color: #000;
  }
  /* 枠の中身 */
  .box1{
    position: relative;
    border-radius: 4px;
    width: 45%;
    border: #66ffff 1px solid;
    padding:10px;
    font-weight: bold;
  }

 form input[type = "submit"],form input[type = "button"],input[type = "button"]{
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

  div{
    word-break: break-all;
  }

  form input[type = "submit"]:hover,form input[type = "button"]:hover,input[type = "button"]:hover{
    background-color: #66ffff;
    border: 2px solid #66ffff;
    color: #000;
  }
 </style>

<body>
    <div align="center">
    <h1>タスクの詳細</h1>
    <div class="box1">
      <div class="boxtitle">
        タスクの名前
      </div>
      <?php echo $_GET['taskName']; ?></div><br>
    <div class="box1">
      <div class="boxtitle">
        日時
      </div>
      <?php echo $_GET['taskYear']; ?>年　<?php echo $_GET['taskMonth']; ?>月　<?php echo $_GET['taskDate']; ?>日</div><br>
    <div class="box1">
      <div class="boxtitle">
        開始時間
      </div> 
      <?php echo $_GET['taskStart_hour']; ?>時　<?php echo $_GET['taskStart_min']; ?>分
    </div><br>
    <div class="box1">
      <div class="boxtitle">
        終了時間
      </div>
      <?php echo $_GET['taskEnd_hour']; ?>時　<?php echo $_GET['taskEnd_min']; ?>分
    </div><br>
    <div class="box1">
      <div class="boxtitle">
        カテゴリ
      </div>
      <?php echo $_GET['category']; ?></div><br>
    <div class="box1">
      <div class="boxtitle">
        内容
      </div>
      <?php echo $_GET['TaskContents']; ?>
    </div><br>
    <div class="box1">
      <div class="boxtitle">
        状態
      </div>
      <?php
        $konryou = $_GET['kanryou'];
        if( $konryou == 0){
          echo "未完了";
        }else if( $konryou == 1){
          echo "完了";
        }
        ?>
    </div><br><br>
<div style="display:inline-flex">
    <form action="./05.php" method="POST">
        <?php
            echo "<input type='hidden' name='taskId' value='".$_GET['taskId']."'>";
            echo "<input type='hidden' name='taskName' value='".$_GET['taskName']."'>";
            echo "<input type='hidden' name='taskYear' value='".$_GET['taskYear']."'>";
            echo "<input type='hidden' name='taskMonth' value='".$_GET['taskMonth']."'>";
            echo "<input type='hidden' name='taskDate' value='".$_GET['taskDate']."'>";
            echo "<input type='hidden' name='taskStart_hour' value='".$_GET['taskStart_hour']."'>";
            echo "<input type='hidden' name='taskStart_min' value='".$_GET['taskStart_min']."'>";
            echo "<input type='hidden' name='taskEnd_hour' value='".$_GET['taskEnd_hour']."'>";
            echo "<input type='hidden' name='taskEnd_min' value='".$_GET['taskEnd_min']."'>";
            echo "<input type='hidden' name='category' value='".$_GET['category']."'>";
            echo "<input type='hidden' name='taskName' value='".$_GET['taskName']."'>";
            echo "<input type='hidden' name='TaskContents' value='".$_GET['TaskContents']."'>";
            echo "<input type='hidden' name='kanryou' value='".$_GET['kanryou']."'>";
            echo "<input type='hidden' name='doHide' value='".$_GET['doHide']."'>";
            echo "<input type='submit' value='タスクを編集する'>";
        ?>
    </form>
        <!-- <input type="button" onclick="location.href=''" value="タスクを消去する"> formに変更:近藤-->
 &emsp;
        <form name="form" action="delete_sub.php" method="POST">
            <?php
            echo "<input type='hidden' name='taskId' value='".$_GET['taskId']."'>";
          ?>
            <input type="submit" value=" タスクを削除する" >
        </form>
 &emsp;
        <form name="form2" action="kanryou.php" method="POST">
            <?php
            echo "<input type='hidden' name='taskId' value='".$_GET['taskId']."'>";
            ?>
            <input type="submit" value=" タスクを完了する" >
        </form>
</div>
        <input type="button" value="ホーム画面に戻る" onclick="location.href='./02.php'">
    </div>

</body>

</html>

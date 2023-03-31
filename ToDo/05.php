<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="fav.png"> <!-- ファビコンの設定  -->
    <title>編集画面</title>
      <style>
	      body {
          color: #ffffff;
          background-color: #000000;
        }

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

        input[type = "submit"], input[type = "button"]{
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
         input[type = "submit"]:hover, input[type = "button"]:hover{
          background-color: #66ffff;
          border: 2px solid #66ffff;
          color: #000;
        }
    </style>
	</head>
  <body>
    <div align ="center">

    <h1>タスクの編集</h1>
    <form name="form" action="regist.php" method="POST">
    <div class="box1">
      <div class="boxtitle">
        タスクの名前
      </div>      
      <input type="text" name="taskName" size=20 required="required" value="<?php echo $_POST['taskName']; ?>">
    </div>
    <br>
    <div class="box1">
      <div class="boxtitle">
        日付　
      </div>
        <select name="taskYear" required></div>
            <option value="<?php echo $_POST['taskYear']; ?>" selected><?php echo $_POST['taskYear']; ?></option>
            <option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option>
            <option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option>
            <option value="2030">2030</option>
          </select>
        年

        <select name="taskMonth" required>
          <option value="<?php echo $_POST['taskMonth']; ?>" selected><?php echo $_POST['taskMonth']; ?></option>
          <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option>
          <option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option>
          <option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
          <!-- 以後１～12まで -->
        </select>
        月
        <select name="taskDate" required>
          <option value="<?php echo $_POST['taskDate']; ?>" selected><?php echo $_POST['taskDate']; ?></option>
          <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option>
          <option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option>
          <option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
          <option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option>
          <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
          <option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option>
          <option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option>
          <option value="29">29</option><option value="30">30</option><option value="31">31</option>
          <!-- 以後１～31まで -->
        </select>
        日
    </div>
    <br>
        <div class="box1">
          <div class="boxtitle">
            開始時間
          </div>
          <select name="taskStart_hour">
          <option value="<?php echo $_POST['taskStart_hour']; ?>" selected><?php echo $_POST['taskStart_hour']; ?></option>
          <option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option>
          <option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option>
          <option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option>
          <option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
          <option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option>
          <option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
          <!-- 以後１～12まで -->
        </select>
        時
        <select name="taskStart_min">
          <option value="<?php echo $_POST['taskStart_min']; ?>" selected><?php echo $_POST['taskStart_min']; ?></option>
          <option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option>
          <option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option>
          <option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option>
          <option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
          <option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option>
          <option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
          <option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option>
          <option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
          <option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option>
          <option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option>
          <option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option>
          <option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option>
          <option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option>
          <option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option>
          <option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
          <!-- 以後１～60まで -->
        </select>
        分</div><br>
        <div class="box1">
          <div class="boxtitle">
            終了時間
          </div>
          <select name="taskEnd_hour">
          <option value="<?php echo $_POST['taskEnd_hour']; ?>" selected><?php echo $_POST['taskEnd_hour']; ?></option>
          <option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option>
          <option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option>
          <option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option>
          <option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
          <option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option>
          <option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
          <!-- 以後１～12まで -->
        </select>
        時
        <select name="taskEnd_min">
         <option value="<?php echo $_POST['taskEnd_min']; ?>" selected><?php echo $_POST['taskEnd_min']; ?></option>
         <option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option>
         <option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option>
         <option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option>
         <option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
         <option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option>
         <option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
         <option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option>
         <option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
         <option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option>
         <option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option>
         <option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option>
         <option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option>
         <option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option>
         <option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option>
         <option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
        </select>
        分
        <!--<input type="time" value="">-->
        <!--<input type="date" value="">-->
    </div>
    <br>
    <div class="box1">
      <div class="boxtitle">
        カテゴリ
      </div>
        <select name="category" required="required">
            <option value="<?php echo $_POST['category']; ?>" selected><?php echo $_POST['category']; ?></option>
            <option value="なし">なし</option><option value="授業">授業</option><option value="課題">課題</option>
            <option value="ごはん">ごはん</option><option value="趣味">趣味</option><option value="バイト">バイト</option>
        </select>
    </div>
    <br>
    <div class="box1">
      <div class="boxtitle">
        内容
      </div>
        <textarea name="TaskContents" rows=2 cols=40><?php echo $_POST['TaskContents']; ?></textarea>
    </div>
    <br>
    <div class="box1">
      <div class="boxtitle">
        内容の表示
      </div>
      <?php
      echo "<input type='hidden' name='taskId' value='".$_POST['taskId']."'>";
      if($_POST['doHide']=="yes"){
        echo '<input type="radio" name="doHide" value="no" required="required">表示
        <input type="radio" name="doHide" value="yes" required="required" checked>非表示';
      }
      else{
        echo '<input type="radio" name="doHide" value="no" required="required" checked>表示
        <input type="radio" name="doHide" value="yes" required="required">非表示';
      }
      ?>
    </div><br>
    <div class="box1">
      <div class="boxtitle">
        タスクの状態
      </div>
      <?php
      if($_POST['kanryou']=="1"){
        echo '<input type="radio" name="kanryou" value="1" required="required" checked>完了
        <input type="radio" name="kanryou" value="0" required="required">未完了';
      }
      else{
        echo '<input type="radio" name="kanryou" value="1" required="required">完了
        <input type="radio" name="kanryou" value="0" required="required" checked>未完了';
      }
      ?>
    </div>
    <input type="submit" value="変更する">
    <input type="button" onclick="location.href='./02.php'" value="ホーム画面に戻る">
    </form>
  </div>
</body>
</html>

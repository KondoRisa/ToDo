<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8"/>
</head>
<body>

<?php
  $input_id = $_POST['input_id'];
  $input_passwd = md5($_POST['input_passwd']);

  $db = new SQLite3("pblone.db");

  $res = $db->query("SELECT * FROM user");

  $i = 0;
  if($input_id == "" || $_POST['input_passwd'] == ""){
    $i = 1;
    header("Location:newaccount_error.html");
  }

  while($row = $res->fetchArray()){
    if($row["id"] == $input_id){
      $i = 1;
      header("Location:newaccount_error.html");
    }
  }
  $db->close();
  if($i == 0){
   $db = new SQLite3("pblone.db");
   $stmt = $db->prepare("INSERT INTO user VALUES (:input_id, :input_passwd)");
   $stmt->bindValue( ':input_id', $input_id);
   $stmt->bindValue( ':input_passwd', $input_passwd);
   $res = $stmt->execute();
   $sql = "CREATE TABLE $input_id(
     taskId INTEGER PRIMARY KEY,
     taskName TEXT NOT NULL,
     taskYear TEXT NOT NULL,
     taskMonth TEXT NOT NULL,
     taskDate TEXT NOT NULL,
     taskStart_hour TEXT NOT NULL,
     taskStart_min TEXT NOT NULL,
     taskEnd_hour TEXT NOT NULL,
     taskEnd_min TEXT NOT NULL,
     category TEXT NOT NULL,
     TaskContents TEXT,
     doHide TEXT NOT NULL,
     kanryou TEXT NOT NULL
   )";
   $res = $db->exec($sql);
   header("Location:index.html");
   $db->close();
  }
?>
</body>
</html>

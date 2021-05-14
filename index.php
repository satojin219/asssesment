<?php

session_start();
require('dbconnect.php');
if(!empty($_POST)){

  
  if(empty($_POST["gender"])){
    $error['gender']='blank';
  }
  
  if($_POST["age"]===''){
    $error['age']='blank';
  }
  if($_POST["height"]===''){
    $error['height']='blank';
  }
  if($_POST["weight"]===''){
    $error['weight']='blank';
  }
  
  if(empty($error)){
    $_SESSION['join']=$_POST;
    header('Location:check.php');
    exit();
  }


}
  

  ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css"> -->
  <link rel="stylesheet" href="css/style.css">
  <title>栄養アセスメント</title>
</head>

<body>


  <h1>栄養アセスメント</h1>
  <form action="" method="post">

    <label for="gender">性別:</label>
        <input type="radio" name="gender" value="男性" <?php if (isset($_POST['gender']) && $_POST['gender'] == "1") echo 'checked'; ?>>男性
        <input type="radio" name="gender" value="女性" <?php if (isset($_POST['gender']) && $_POST['gender'] == "2") echo 'checked'; ?>>女性
        <?php if($error['gender']==='blank'):?>
        <p class="error">性別を選んでください</p>
        <?php endif ;?>
    <br>
    <label for="age">年齢:</label>
        <input name="age" type="text" value="<?php print(htmlspecialchars($_POST['age'],ENT_QUOTES));?>">歳
        <?php if($error['age']==='blank'):?>
        <p class="error">年齢を記入してください</p>
        <?php endif ;?>
    <br>
    <label for="height">身長:</label>
        <input name="height" type="text" placeholder="少数第１位まで" value="<?php print(htmlspecialchars($_POST['height'],ENT_QUOTES));?>">cm
        <?php if($error['height']==='blank'):?>
        <p class="error">身長を記入してください</p>
        <?php endif ;?>
    <br>
    <label for="weight">体重:</label>
        <input name="weight" type="text" placeholder="少数第１位まで" value="<?php print(htmlspecialchars($_POST['weight'],ENT_QUOTES));?>">kg
        <?php if($error['weight']==='blank'):?>
        <p class="error">体重を記入してください</p>
        <?php endif ;?>
    <br>

    <label for="level">身体活動レベル:</label>
      <select name="active_level">
      <option name="active_level" value="低い">レベルⅠ（低い）</option>
      <option name="active_level" value="普通">レベルⅡ（普通）</option>
      <option name="active_level" value="高い">レベルⅢ（高い）</option>
    </select>

    <br>
    <button type="submit">計算する</button>

  </form>
</body>

</html>
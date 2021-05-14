<?php

session_start();
require('dbconnect.php');
if(!isset($_SESSION['join'])){
  header('Location:index.php');
  exit();
}

if(!empty($_POST)){

  $statement=$db->prepare('INSERT INTO nutrition_db SET gender=?,age=?,weight=?,height=?,active_level=?,
  BMI=weight/((height/100)*(height/100)),
  fitness_weight=height/100*height/100*22,
  obesity_level=CASE WHEN BMI < 18.5 THEN "痩せ"
  WHEN BMI >=18.5 AND BMI < 25 THEN "標準" 
  WHEN BMI >=25 AND BMI < 30 THEN "肥満（1度）" 
  WHEN BMI >=30 AND BMI < 35 THEN "肥満（2度）"
   WHEN BMI >=35 AND BMI < 40 THEN "肥満（3度）"
    WHEN BMI >= 40 THEN "肥満（4度）" 
    ELSE NULL 
    END  ,
    身体活動レベル=CASE WHEN active_level="普通" AND  (age >=1 AND age <= 2)  THEN 1.35

    WHEN active_level="普通" AND  (age >=3  AND age <= 5)  THEN 1.45

    WHEN active_level="低い" AND  (age >=6 AND age <= 7)  THEN 1.35
    WHEN active_level="普通" AND  (age >=6 AND age <= 7)  THEN 1.55
    WHEN active_level="高い" AND  (age >=6 AND age <= 7)  THEN 1.75

    WHEN active_level="低い" AND  (age >=8 AND age <= 9)  THEN 1.40
    WHEN active_level="普通" AND  (age >=8 AND age <= 9)  THEN 1.60
    WHEN active_level="高い" AND  (age >=8 AND age <= 9)  THEN 1.80

    WHEN active_level="低い" AND  (age >=10 AND age <= 11)  THEN 1.45
    WHEN active_level="普通" AND  (age >=10 AND age <= 11)  THEN 1.65
    WHEN active_level="高い" AND  (age >=10 AND age <= 11)  THEN 1.85

    WHEN active_level="低い" AND  (age >=12 AND age <= 14)  THEN 1.45
    WHEN active_level="普通" AND  (age >=12 AND age <= 14)  THEN 1.65
    WHEN active_level="高い" AND  (age >=12 AND age <= 14)  THEN 1.85

    WHEN active_level="低い" AND  (age >=15 AND age <= 17)  THEN 1.55
    WHEN active_level="普通" AND  (age >=15 AND age <= 17)  THEN 1.75
    WHEN active_level="高い" AND  (age >=15 AND age <= 17)  THEN 1.95

    WHEN active_level="低い" AND  (age >=18 AND age <= 29)  THEN 1.50
    WHEN active_level="普通" AND  (age >=18 AND age <= 29)  THEN 1.75
    WHEN active_level="高い" AND  (age >=18 AND age <= 29)  THEN 2.00

    WHEN active_level="低い" AND  (age >=30 AND age <= 49)  THEN 1.50
    WHEN active_level="普通" AND  (age >=30 AND age <= 49)  THEN 1.75
    WHEN active_level="高い" AND  (age >=30 AND age <= 49)  THEN 2.00

    WHEN active_level="低い" AND  (age >=50 AND age <= 69)  THEN 1.50
    WHEN active_level="普通" AND  (age >=50 AND age <= 69)  THEN 1.75
    WHEN active_level="高い" AND  (age >=50 AND age <= 69)  THEN 2.00

    
    WHEN active_level="低い" AND  age >=70   THEN 1.45
    WHEN active_level="普通" AND  age >=70   THEN 1.70
    WHEN active_level="高い" AND  age >=70   THEN 1.95
    ELSE NULL
    END,

    基礎代謝基準値=CASE WHEN gender="男性" AND  (age >=1 AND age <= 2)  THEN 61.0
    WHEN gender="女性" AND  (age >=1 AND age <= 2)  THEN 59.7

    WHEN gender="男性" AND  (age >=3 AND age <= 5)  THEN 54.8
    WHEN gender="女性" AND  (age >=3 AND age <= 5)  THEN 52.2

    WHEN gender="男性" AND  (age >=6 AND age <= 7)  THEN 44.3
    WHEN gender="女性" AND  (age >=6 AND age <= 7)  THEN 41.9

    WHEN gender="男性" AND  (age >=8 AND age <= 9)  THEN 40.8
    WHEN gender="女性" AND  (age >=8 AND age <= 9)  THEN 38.3
    
    
    WHEN gender="男性" AND  (age >=10 AND age <= 11)  THEN 37.4
    WHEN gender="女性" AND  (age >=10 AND age <= 11)  THEN 34.8

    
    WHEN gender="男性" AND  (age >=12 AND age <= 14)  THEN 31.0
    WHEN gender="女性" AND  (age >=12 AND age <= 14)  THEN 29.6

    WHEN gender="男性" AND  (age >=15 AND age <= 17)  THEN 27.0
    WHEN gender="女性" AND  (age >=15 AND age <= 17)  THEN 25.3

    WHEN gender="男性" AND  (age >=18 AND age <= 29)  THEN 24.0
    WHEN gender="女性" AND  (age >=18 AND age <= 29)  THEN 22.1

    WHEN gender="男性" AND  (age >=30 AND age <= 49)  THEN 22.3
    WHEN gender="女性" AND  (age >=30 AND age <= 49)  THEN 21.7
    
    WHEN gender="男性" AND  (age >=50 AND age <= 69)  THEN 21.5
    WHEN gender="女性" AND  (age >=50 AND age <= 69)  THEN 20.7

    WHEN gender="男性" AND  age >=70   THEN 21.5
    WHEN gender="女性" AND  age >=70   THEN 20.7
    ELSE NULL
    END,
    基礎代謝量=基礎代謝基準値*weight,
    推定エネルギー必要量=基礎代謝量*身体活動レベル
    ');
  $statement->execute(array(
    $_SESSION['join']['gender'],
    $_SESSION['join']['age'],
    $_SESSION['join']['weight'],
    $_SESSION['join']['height'],
    $_SESSION['join']['active_level']

  ));

  unset($_SESSION['join']);
  header('Location:result.php');
  exit();
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>計算確認</title>
</head>
<body>
<form action="" method="post">
<input type="hidden" name="action" value="submit" />
性別:<?php print(htmlspecialchars($_SESSION['join']['gender'],ENT_QUOTES));?>

年齢:<?php print(htmlspecialchars($_SESSION['join']['age'],ENT_QUOTES));?>


身長:<?php print(htmlspecialchars($_SESSION['join']['height'],ENT_QUOTES));?>

体重:<?php print(htmlspecialchars($_SESSION['join']['weight'],ENT_QUOTES));?>

身体活動レベル:<?php print(htmlspecialchars($_SESSION['join']['active_level'],ENT_QUOTES));?>


<div><a href="assesment.php?action=rewrite">&laquo;&nbsp;戻る</a> | <input type="submit" value="計算する" /></div>
</form>

</body>
</html>
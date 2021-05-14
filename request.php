<?php 
session_start();
require('dbconnect.php');


 
$stmt = $db -> prepare("SELECT * FROM assesment_db WHERE id=(SELECT MAX(id) FROM assesment_db)"); 
$stmt -> execute();
$data = $stmt -> fetch();
 
$pdo = NULL;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
計算結果

<p>BMI:<?php print(htmlspecialchars($data['BMI'],ENT_QUOTES));?>(kg/m²)</p>
<p>肥満度:<?php print(htmlspecialchars($data['obesity_level'],ENT_QUOTES));?></p>
<p>基礎代謝量:<?php print(htmlspecialchars($data['基礎代謝量'],ENT_QUOTES));?>kcal/日</p>
<p>推定エネルギー必要量:<?php print(htmlspecialchars($data['推定エネルギー必要量'],ENT_QUOTES));?>kcal/日</p>
</body>
</html>
<?php
try{
  $dsn = 'mysql:dbname=heroku_e65ff3d9c1fd232;host=us-cdbr-east-03.cleardb.com';
  $db = new PDO($dsn, 'b2433b078f1bab', '062b9a4e');
}catch(PDOException $e){
  echo 'DB接続エラー' .$e->getMessage();
}

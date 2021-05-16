<?php


function dbConnect()
{

  $dsn = 'mysql:dbname=heroku_ba2a38aa56250a2;host=us-cdbr-east-03.cleardb.com;charset=utf8';
  $user = 'b90ef526dcb188';
  $password = '8f204a7b';
  $option = array(

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
  );

  $db= new PDO($dsn, $user, $password, $option);
  return $db;
}

// try{
//   $dsn = 'mysql:dbname=heroku_567ac67b6b8a4e9;host=us-cdbr-east-03.cleardb.com';
//   $db = new PDO($dsn, 'bd4bbc72cf0720', '1b965628');
// }catch(PDOException $e){
//   echo 'DB接続エラー' .$e->getMessage();
// }
  ?>
<?php


function dbConnect()
{

  $dsn = 'mysql:dbname=heroku_567ac67b6b8a4e9;host=us-cdbr-east-03.cleardb.com;charset=utf8';
  $user = 'bd4bbc72cf0720';
  $password = '1b965628';
  $option = array(

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
  );

  $dbh = new PDO($dsn, $user, $password, $option);
  return $dbh;
}
?>
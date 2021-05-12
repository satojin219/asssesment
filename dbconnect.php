<?php


function dbConnect()
{

  $dsn = 'mysql:dbname=heroku_6b56cb56f839be0;host=us-cdbr-east-03.cleardb.com;charset=utf8';
  $user = 'befd36e304aa83';
  $password = 'c34364a4';
  $option = array(

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
  );

  $dbh = new PDO($dsn, $user, $password, $option);
  return $dbh;
}
?>
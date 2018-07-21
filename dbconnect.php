<?php

  date_default_timezone_set("Asia/Manila");


  $dsn = 'mysql:dbname=Mymemories;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $dbh->query('SET NAMES utf8');
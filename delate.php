<?php

// 削除する処理

  require('dbconnect.php');

  $id = $_GET['id'];


  $sql = 'DELETE FROM `feeds` WHERE `id` = ?';

  $data[] = $id;

  $stmt = $dbh->prepare($sql);
  $stmt->execute($data);


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Memories</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/main.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/chart.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=""><i class="fa fa-camera" style="color: #fff;"></i></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php" style="font-family: 'Chalkduster">Main page</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  
    
    <div class="container">
      <div class="col-xs-8 col-xs-offset-2 thumbnail">
        <h2 class="text-center content_header" style="font-family: 'Chalkduster'">Completed!</h2>
        <div class="text-center">
          <p style="font-family: 'Chalkduster'">Delate completed.</p>
          <a href="../index.php" class="btn btn-info" style="font-family: 'Chalkduster'">Home</a>
        </div>
      </div>
    </div>

    <div id="f">
      <div class="container">
        <div class="row">
          <p style="font-family: 'Chalkduster'">I <i class="fa fa-heart"></i> Cebu.</p>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/bootstrap.js"></script>
  </body>
</html>

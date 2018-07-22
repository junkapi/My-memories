<?php


  // session_start();

  require('dbconnect.php');





  // $dsn = 'mysql:dbname=Mymemories;host=localhost';
  // $user = 'root';
  // $password = '';
  // $dbh = new PDO($dsn, $user, $password);
  // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // $dbh->query('SET NAMES utf8');




    $sql = 'SELECT * FROM `feeds` ORDER BY `date` ASC';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();


    $pics = array();
    while (1) {
    // データを１件ずつ取得
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rec == false) {
           break;
        }

         $pics[] = $rec;
    }


    // $dbh = null;






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
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/chart.js"></script>


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
            <li class="active"><a href="register/post.php" style="font-family: 'Chalkduster">Post photos</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div id="hello">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2 centered">
              <h1 style="font-family: 'Chalkduster">My Memories</h1>
              <h2 style="font-family: 'Chalkduster">~ In Cebu ~</h2>
            </div><!-- /col-lg-8 -->
          </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /hello -->
    
    
    <div class="container">
      <div class="main-contents">
        <div class="row centered mt grid">
          <h3 style="font-family: 'Chalkduster" >Album</h3>
          <?php  foreach ($pics as $pic): ?>
          <div class="col-lg-4">
            <a href="detail.php?id=<?php echo $pic['id']; ?>" class="trim"><img class="picture"    src="post_img/<?php echo $pic['img_name']; ?>" alt=""></a>
          </div>
          <?php endforeach; ?>
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
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>

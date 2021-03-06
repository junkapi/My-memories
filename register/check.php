<?php



    session_start();

    require_once('../dbconnect.php');

    if(!isset($_SESSION['register'])) {
        header('Location:post.php');
        exit();
    }


    //多次元配列
    $title = $_SESSION['register']['title'];
    $date = $_SESSION['register']['date'];
    $detail = $_SESSION['register']['detail'];
    $img_name = $_SESSION['register']['img_name'];

    // 登録ボタンが押された時のみ処理するif文
    if (!empty($_POST)) {
        // この中のデータベース登録処理を記述します
        $sql = 'INSERT INTO `feeds` SET `title`=?, `date`=?, `detail`=?, `img_name`=?';
        $data = array($title, $date, $detail, $img_name);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

        unset ($_SESSION['register']);
        header('Location: thanks.php');
        exit();
    }



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
            <li class="active"><a href="index.php" style="font-family: 'Chalkduster">Main menu</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
      <div class="main-contents">
        <div class="col-lg-10 col-lg-offset-1 centered">
           <h2 class="text-center content_header" style="font-family: 'Chalkduster">Post OK？</h2>
          <div class="col-xs-4">
            <a href="" class="trim"><img class="picture" src="../post_img/<?php echo htmlspecialchars($img_name); ?>" alt=""></a>
          </div>
          <div class="col-xs-8">
            <div class="details">
              <h3 class="post-title"><?php echo htmlspecialchars($title); ?></h3>
              <h4 class="post-date"><?php echo date('Ymd', strtotime($date)); ?></h4><br>
              <h3 class="post-detail"><?php echo htmlspecialchars($detail); ?></h3>
            </div><br><br><br><br>
            <form method="POST" action="">
                            <!-- ④ -->
            <a href="post.php?action=rewrite" class="btn btn-default" style="font-family: 'Chalkduster">&laquo;&nbsp;Back</a> | 
                            <!-- ⑤ -->
            <input type="hidden" name="action" value="submit">
            <input type="submit" class="btn btn-primary" style="font-family: 'Chalkduster" value="Post">
            </form>
          </div>
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

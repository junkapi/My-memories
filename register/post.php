<?php

  session_start();

  date_default_timezone_set("Asia/Manila");

  $title = '';
  $date = '';
  $detail = '';
  $errors = array();

 
  if (isset($_GET['action']) && $_GET['action'] == 'rewrite') {
        $_POST['title'] = $_SESSION['register']['title'];
        $_POST['date'] = $_SESSION['register']['date'];
        $_POST['detail'] = $_SESSION['register']['detail'];

        $errors['rewrite'] = true;
    }



  if (!empty($_POST)) {

    $title = htmlspecialchars($_POST['title']);
    $date = ($_POST['date']);
    $detail = htmlspecialchars($_POST['detail']);


    $count = mb_strlen($title . $detail);

        if ($title == '') {
            $errors['title'] = 'blank';
        } elseif ($count > 24) {
            $errors['title'] = 'length';
        }

        if ($detail == '') {
            $errors['detail'] = 'blank';
        } elseif ($count > 140) {
            $errors['detail'] = 'length';
        }



    $file_name = '';
    if (!isset($_GET['action'])) {
        $file_name = $_FILES['input_img_name']['name'];
        }



    if (!empty($file_name)) {
        $file_type = substr($file_name, -3);  //画像名の後ろから３文字を取得
        $file_type = strtolower($file_type);  //大文字が含まれていた場合全て小文字化
        if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif') {
            $errors['img_name'] = 'type';
        }
    } else {
       $errors['img_name'] = 'blank';
    }



    if (empty($errors)) {
            //$errorsが空だった場合はバリデーション成功
            //成功時の処理を記述する
            $date_str = date('YmdHis');
            $submit_file_name = $date_str.$file_name;
            // move_uploaded_file（テンポラリパス、保存したい場所、ファイル名）
            move_uploaded_file($_FILES['input_img_name']['tmp_name'], '../post_img/'.$submit_file_name);

            $_SESSION['register']['title'] = $_POST['title'];
            $_SESSION['register']['date'] = $_POST['date'];
            $_SESSION['register']['detail'] = $_POST['detail'];
            $_SESSION['register']['img_name'] = $submit_file_name;



    header('Location: check.php');
    exit();


  }

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
            <li class="active"><a href="index.php" style="font-family: 'Chalkduster">Main page</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  
    
    <div class="container">
      <div class="col-xs-8 col-xs-offset-2 thumbnail">
        <h2 class="text-center content_header" style="font-family: 'Chalkduster">Post photos</h2>
        <!-- $_FILESを使うにはformでenctype~を入れないといけない -->
        <form method="POST" action="post.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="task" style="font-family: 'Chalkduster">Title</label>
            <input name="title" class="form-control" value="<?php echo htmlspecialchars($title); ?>">
            <?php if (isset($errors['title']) && $errors['title'] == 'blank'): ?>
                <p class="text-danger" style="font-family: 'Chalkduster">Please write "title".</p>
            <?php endif; ?>
            <?php if (isset($errors['title']) && $errors['title'] =='length'): ?>
                <p class="text-danger" style="font-family: 'Chalkduster">Please write "title" within 24 characters.</p>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="date" style="font-family: 'Chalkduster">Date</label>
            <input type="date" name="date" class="form-control" value="<?php echo $date; ?>">
          </div>
          <div class="form-group">
            <label for="detail" style="font-family: 'Chalkduster">Comment</label>
            <textarea name="detail" class="form-control" rows="3"><?php echo htmlspecialchars($detail); ?></textarea><br>
            <?php if (isset($errors['detail']) && $errors['detail'] == 'blank'): ?>
              <p class="text-danger" style="font-family: 'Chalkduster">Please write "Comment".</p>
            <?php endif; ?>
            <?php if (isset($errors['detail']) && $errors['detail'] =='length'): ?>
                <p class="text-danger" style="font-family: 'Chalkduster">Please write "Comment" within 140 characters.</p>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="img_name" style="font-family: 'Chalkduster'">Photo</label>
            <input type="file" name="input_img_name" id="img_name" value="<?php echo $file_name; ?>">
            <?php if(isset($errors['img_name']) && $errors['img_name'] =='blank') { ?>
              <p class="text-danger" style="font-family: 'Chalkduster'">Please choose a photo.</p>
            <?php } ?>
            <?php if (isset($errors['img_name']) && $errors['img_name'] == 'type'): ?>
              <p class="text-danger">Please choose a photo "jpeg", "png", "gif".</p>
            <?php endif; ?>
          </div><br>
          <input type="submit" class="btn btn-primary" value="Check?">
        </form>
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

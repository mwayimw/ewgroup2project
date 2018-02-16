<html lang="en">
<head>
  <?php session_start() ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--adding bootstrap css source -->
  <link rel="stylesheet" href="../config/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../config/font-awesome-4.6.3/css/font-awesome.css">
  <script src="../config/jquery-3.1.1.js"></script>
  <script src="../config/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

 <?php //include ('reg_code.php'); ?>
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<div class="navbar navbar-default navbar-static-top" style="background-color: skyblue;" role="navigation">
    <div class="container row">
        <div class="navbar-header" role="nav">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        </div>
<a class="navbar-brand fa fa-home " href="../../index.php" title='NACIT SMS home'>Student Home</a>
<form class="form-inline pull-right">
  <label>Signed In as <span class="fa fa-user fa-lg"></span></lable>
  <label class="btn-success">
    <option><?php if (isset($_SESSION['user_id'])) {
      echo "$_SESSION[name]";
    }
     ?></label>
</form>
<a href="logout.php"><span class="btn-warning">Logout</span></a>

    </div>
</div>

    <title> IDEAS FOR IMPROVEMENT </title>

</head>
<body>
  <div class="container">
  <div class="container " >

       <?php if (isset($successmsg )) { ?><div class="alert alert-info" id="alert1"><?php echo "<h4>$successmsg </h4></div>"; }
              elseif(isset($errormsg)) { ?><div class="alert alert-danger" id="alert1"><?php echo "</h4>$errormsg </h4></div>";}
       ?>
       <script type="text/javascript">

       $(document).ready(function () {

         window.setTimeout(function() {
           $("#alert1").fadeTo(1000, 0).slideUp(1000, function(){
             $(this).remove();
             });
           }, 7000);

           });

     </script>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6">

    <h3>Posted ideas</h3>
    <?php if (isset($idea_submitted)) {
    $posted_idea = mysqli_fetch_array($idea_submitted);
      foreach ($variable as $key => $value) {
        # code...
      }
    }
    else {
      echo "No ideas posted yet";
    }

    ?>
  </div>
    <div class="col-lg-6 col-m6 col-sm-8">
      <?php if (isset($comments)) {
      $view_comment = mysqli_fetch_array($comments);
        foreach ($variable as $key => $value) {
          # code...
        }
      }

      ?>
      <form role="form" class="form-horizontal col-lg-12 col-sm-12 col-sm-12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

          <div class="form-group">
            <label for="select" class="col-sm-8 col-md-3 col-lg-3 control-label" > Department</label>
            <div class="col-sm-10 col-md-6 col-lg-9 input-group row">
            <select name="department">
            <option value="1">Nursing</option>
            <option value="2">Education</option>
            <option value="2">ICT</option>
            <option value="2">Civil Engineering</option>
            </select>
          </div>
        </div>
          <div class="form-group">
          <label for="select" class="col-sm-8 col-md-3 col-lg-3 control-label"> Category for your idea</label>
          <div class="col-sm-10 col-md-6 col-lg-9 input-group row">
          <select name="category">
          <option value="1">admin</option>
          <option value="2">Lecture Delivery</option>
          </select>
        </div>
          </div>
          <div class="form-group">
            <label for="select" class="col-sm-8 col-md-3 col-lg-3 control-label"> Post as</label>
            <div class="col-sm-10 col-md-6 col-lg-9 input-group">
            <select name="identity">
            <option value="hidden">Uknown</option>
            <option value="visible">ME</option>
            </select>
          </div>

          </div>
          <div class="form-group">
            <label class="col-sm-8 col-md-3 col-lg-3 control-label">Suporting document</label>
            <div class="col-sm-10 col-md-6 col-lg-9 input-group"><input type="file" name="file"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-8 col-md-3 col-lg-3 control-label">Idea Title</label>
          <div class="input-group">
            <input class="col-sm-12 col-md-12 col-lg-12" type="text" name="title" placeholder="Enter idea Subject Title">
          </div>
          </div>

          <div class="form-group">
          <label for="name">Post Idea</label>
          <textarea class="form-control" rows="4" name="idea"></textarea>
          <button type="submit" name="idea_post" class="btn-info">Submit</button>
          </div>
      </form>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3"><h3>Ideas Statistics </h3></div>
</div>
</body>
</html>

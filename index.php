 <!DOCTYPE html>

<?php
include 'pages/php_scripts/login.php';
include 'pages/reg_code.php';

 ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--adding bootstrap css source -->
  <link rel="stylesheet" href="pages/config/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="pages/config/font-awesome-4.6.3/css/font-awesome.css">
  <script src="pages/config/jquery-3.1.1.js"></script>
  <script src="pages/config/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

  <title> MUST INNOVATIONS </title>

  <style>
  .white
  {
    text-color: white;
  }
  </style>
</head>

<body data-spy="scroll" data-target="#scroll_from_here" style="background-image: url(pages/images/mustmain1.jpg);background-position: center center; background-size: cover;">
  <div class="center-block container-fluid"  >
    <!-- -->
    <!--Adding and centering logo -->

      <!-- MW SPARES MARKET  Navigation bar  -->
   <div class="navbar navbar-default navbar-static-top nav-justfied" role="navigation" style="background-color:skyblue;"  id="scroll_from_here">
    <div class="navbar-header row" >
      <!-- Navigation bar toggling(#mw_spares) have been added so it can vertically stack the links on small screen devices-->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mw_spares">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <a class="navbar-brand fa fa-home " style="color:white"  href="#" data-toggle="tooltip" title='new ideas home'>Home</a>
    </div>
    <form class="form-inline pull-right" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >

        <div class="form-group">
          <label for="user_id" class="col-sm-8 col-md-6 col-lg-6 control-label">User ID</label>
          <div class="col-sm-10 col-md-6 col-lg-9 input-group row">
          <input type="text" class="form-control" name="user_id"
          placeholder="enter your user id" required><span class="fa fa-key"></span>
          </div>
        </div>
        <div class="form-group">
          <label for="Password" class="col-sm-8 col-md-6 col-lg-6 control-label">Password </label>
          <div class="col-sm-10 col-md-6 col-lg-9 input-group row">
          <input type="password" class="form-control" name="password"
          placeholder="Enter password" required><span class="glyphicon glyphicon-lock"></span>
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 col-md-4 col-lg-4">
        <button type="submit" name="login" class="btn btn-default" color="green"><span class="glyphicon glyphicon-log-in"></span> Login</button>
        </div>
        </div>
      </form>


    <!-- List of main nav links, i have addedd them in the body i should say the whole nav have been added in the body so as to easily center the whole
        page as the body has been added with the container-fluid class, i had diffculties in aligning the nav with body to the same size hence added it to the body-->

      </div>


    <div class="row ">
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

    </div class="row">
    <div class="col-lg-3 col-sm-6 col-md-4 "><img class="img-responsive" src="pages/images/mustlogo1.jpg"></div>
      <div class="col-lg-4 col-sm-8 col-xsm-12 col-md-6  pull-right "><a href="#">
      <h3 class="pull-right"><button class="btn btn-warning">Forgot password?</button></h3></a>
      <form class="form-horizontal animate"  role="form"
         action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="color:black">
        <fieldset> <h3 class="center-block">Register your details below </h3> </fieldset>
        <div class="form-group">
          <label for="user_id" class="col-sm-4 control-label"> User ID </label>
          <div class="col-sm-8 input-group row">
          <input type="text" class="form-control" name="id" value="<?php if(isset($error)){ echo $name; } ?>"
          placeholder="enter your user-id" required><span class="fa fa-key"></span>
          </div>
        </div>
        <div class="form-group">
          <label for="user_id" class="col-sm-4 control-label">Full Name </label>
          <div class="col-sm-8 input-group row">
          <input type="text" class="form-control" name="name" value="<?php if(isset($error)){ echo $name; } ?>"
          placeholder="enter your full name" required><span class="fa fa-key"></span>
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-4 control-label">Email</label>
          <div class="col-sm-8 input-group row">
          <input type="text" class="form-control" name="email" value="<?php if(isset($error)){ echo $email; } ?>"
          placeholder="enter email address" required><span class="glyphicon glyphicon-envelope"></span>
          </div>
          <span> <?php if (isset($email_error)) { ?><div class="alert alert-danger"><?php echo "$email_error</div>";} ?> </span>
        </div>

        <div class="form-group">
          <label for="Password" class="col-sm-4 control-label">Password </label>
          <div class="col-sm-8 input-group row">
          <input type="password" class="form-control" name="password" value="<?php if(isset($error)){ echo $password; } ?>"
          placeholder="Enter password"><span class="glyphicon glyphicon-lock"></span>
          </div>
          <span> <?php if (isset($password_error)) { ?><div class="alert alert-danger"><?php echo "$password_error</div>";} ?> </span>
        </div>
        <div class="form-group">
          <label for="cPassword" class="col-sm-4 control-label">Confirm Password </label>
          <div class="col-sm-8 input-group row">
          <input type="password" class="form-control" name="cpassword" value="<?php if(isset($error)){ echo $cpassword; } ?>"
          placeholder="Enter password" required><span class="glyphicon glyphicon-lock"></span>
          </div>
          <span> <?php if (isset($cpassword_error)) { ?><div class="alert alert-danger"><?php echo "$cpassword_error</div>";} ?> </span>
        </div>
        <div class="form-group">
          <label for="secret" class="col-sm-4 control-label"> Password reset question  </label>
            <div class="col-sm-8 input-group row">
            <input type="text" class="form-control" name="secret" value="<?php if(isset($error)){ echo $question; } ?>"
            placeholder="enter question" required><span class="fa fa-address"></span>
            </div>
        </div>
        <div class="form-group">
          <label for="answer" class="col-sm-4 control-label"> Answer </label>
            <div class="col-sm-8 input-group row">
            <input type="text" class="form-control" name="answer" value="<?php if(isset($error)){ echo $answer; } ?>"
            placeholder="enter answer" required><span class="fa fa-address"></span>
            </div>
        </div>
        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
        <button type="submit" class="btn btn-default" name="register"><span class="glyphicon glyphicon-open-file"></span> Register </button>
        </div>
        </div>
      </form>


    </div>
  </div>

    </div>

  </div>

</div>
  <div class="container-fluid  navbar-static-bottom " style="background-color: grey; hieght:500px; margin-top:15px">
      <div class="row">

         <div class="col-sm-6 col-md-6 col-lg-6 center-block " style="background-color: grey;">

      <div class="col-md-9 col-lg-12 text-center">
        <p>© All Rights Reserved | Design by&nbsp; <a href="http://www.facebook.com/group2"> Enterprise web group 2</a></p>
      </div>

      </div>
  </div>
</div>

</body>

</html>

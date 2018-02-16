<html lang="eng">
  <head>
    <?php
    session_start();
    include"../css/css.php";
    ?>
  </head>
  <body>
    <div class="container-fluid">

      <div class="col-md-8 col-lg-12 well rown  text-center "><h1> Prospectus student Section</h1>

        <a class="navbar-brand fa fa-home" href="../php_scripts/logout.php" title='take me out to home page'> Welcome
<?php if (isset($_SESSION['username'])){echo $_SESSION['username'];} ?>
          <span class="btn btn-warning">Logout </span></a> </div>

      </div>


      <div class="col-xs-12 col-sm-3 col-md-6 col-lg-6 ">

        <?php $image = isset($_SESSION['phone']); ?>

          <h3 class="list-group-item active text-center" style="background-color: green">Add More details</h3>
          <form class="form-horizontal animate col-lg-6 col-sm-10 col-md-offset-3"  role="form"
             action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="color:black">
            <fieldset> <h3 class="center-block btn btn-success"> required documents uploads </h3> </fieldset>



            <div class="form-group">
              <label for="cPassword" class="col-sm-8 control-label">upload application fee deposit sleep </label>
              <div class="col-sm-8 input-group file-upoad row">
              <input type="file" class="form-control" name="<?php echo'$phone.certificate';?>"> <span class="glyphicon file"></span>

              </div>
              <span> <?php if (isset($slip_error)) { ?><div class="alert alert-danger"><?php echo "$deposit_slip</div>";} ?> </span>
            </div>
            <div class="form-group">
              <label for="secret" class="col-sm-8 control-label">Upload certificate </label>
                <div class="col-sm-8 input-group file-upload row">
                <input type="file" class="form-control" name="<?php echo'$phone.certificate';?>"><span class="fa fa-file"></span>

                </div>
                <span> <?php if (isset($cert_error)) { ?><div class="alert alert-danger"><?php echo "$certificate</div>";} ?> </span>
            </div>

            <div class="col-sm-10 input-group row" ><input type="text" name="type" value="5" hidden></div>
            <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" class="btn btn-default" name="register"><span class="glyphicon glyphicon-open-file"></span> Register </button>
            </div>
            </div>
          </form>


      </div>

      </div>

    <?php // include"footer.php"; ?>

  </body>
</html>

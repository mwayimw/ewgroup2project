<?php
session_start();

//including database connection
require 'pages/config/dbconnect.php';

//if session user id is not empty(meaning a user logged in but is trying to
//access the Index page it should redirect user to the homepage)
if(isset($_SESSION['user_id'])!="") {

//assinging session user id to $user variable to use it for accessing user type_id to direct to right home page
  $user = $_SESSION['user_id'];
	$result = mysqli_query($dbc,"SELECT user_type FROM users WHERE (user_id = '$user' ) ");
//directing users to the right
	if ($row = $result->fetch_row()) {
		$usertype =$row[0];
    switch ($usertype) {
      case 'admin':
        header('Location: pages/admin/admin.php');
          break;
      case 'coordinator':
        header('Location: pages/staff/coordinator_home.php');
          break;
      case 'staff':
        header('Location: pages/staff/staff_home.php');
          break;
      case 'manager':
        header('Location: pages/admin/admin_home.php');
          break;
      case 'administrator':
        header('Location: pages/admin/admin_home.php');
          break;
      default;
        header('Location: pages/students/student_home.php');
          break;
     }
		}
	}

//check if form is submitted
elseif (isset($_POST['login'])) {
  $allow = "active";
	$userid = mysqli_real_escape_string($dbc, $_POST['user_id']);
	$password = mysqli_real_escape_string($dbc, $_POST['password']);
//checking submitted values against database records in the users table at the same time getting users details
	$result = mysqli_query($dbc, "SELECT user_id,name,email,user_type
    FROM users WHERE (user_id LIKE '$userid') AND (password ='$password') AND (status ='$allow')");

  if (mysqli_num_rows($result) === 1) {

	if ($row = mysqli_fetch_array($result)){

      $usertype = $row['user_type'];
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['type'] = $usertype;
      $_SESSION['name'] = $row['name'];
      $_SESSION['email'] = $row['email'];


//intialising details to session depending on user type
		if ($usertype ==='student') {
			$result = mysqli_query($dbc,"SELECT * FROM students WHERE student_id ='$userid'");
        if (mysqli_num_rows($result) === 1) {

			$get = mysqli_fetch_array($result);

      $_SESSION['dpt_name'] = $get['dpt_name'];
      $_SESSION['program'] = $get['program'];

    	header('Location: pages/students/student_home.php');
    }
    else {
      $errormsg = "error in getting your details call +265999383076";
    }

		}

    elseif ($usertype ==='staff') {
			$result = mysqli_query($dbc,"SELECT * FROM staff WHERE staff_id LIKE'$user_id'");
       if (mysqli_num_rows($result) === 1) {

			$get = mysqli_fetch_array($result);
      $_SESSION['position'] = $get['position'];
      $_SESSION['department'] = $get['department'];

    	header('Location: pages/staff/staff_home.php');

		}
    else {
      $errormsg = "error in getting your details please logout and try again";
    }
	}
  elseif ($usertype ==='coordinator') {
    $result =  mysqli_query($dbc, "SELECT * FROM departments WHERE qa_id ='$userid'");
     if (mysqli_num_rows($result) === 1) {

    $get = mysqli_fetch_array($result);
    $_SESSION['qa_dpt'] = $get['dpt_name'];
    $_SESSION['pa_id'] = $get['qa_id'];


    header('Location: pages/staff/coordinator_home.php');

  }
  else {
    $errormsg = "error in getting your details please logout and try again";
  }
}
else {
  $result =  mysqli_query($dbc, "SELECT * FROM admin WHERE admin_id ='$userid'");
   if (mysqli_num_rows($result) === 1) {

  $get = mysqli_fetch_array($result);
  $_SESSION['role'] = $get['role'];
  $_SESSION['admin_id'] = $get['admin_id'];


  header('Location: pages/admin_home.php');

}
else {
  $errormsg = "error in getting your ADMIN details please logout and try again";
}
}

}
}
//check if form is submitted and user does not match

else {
  $result = mysqli_query($dbc,"SELECT question FROM users WHERE user_id ='$userid' ");

  if (mysqli_num_rows($result) >= 1) {
    $value = mysqli_fetch_array($result);
    $reminder = $value['question'];
  }

  $errormsg = "Incorrect Email or Password!!!";
}
}

?>

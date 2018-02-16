<?php

require 'config/dbconnect.php';

  if (isset($_POST['register'])) {
      $id = mysqli_real_escape_string($dbc, $_POST['id']);
      $name = mysqli_real_escape_string($dbc, $_POST['name']);
    	$email = mysqli_real_escape_string($dbc, $_POST['email']);
      //$phone = mysqli_real_escape_string($dbc, $_POST['phone']);
    	$password = mysqli_real_escape_string($dbc, $_POST['password']);
    	$cpassword = mysqli_real_escape_string($dbc, $_POST['cpassword']);
      $question = mysqli_real_escape_string($dbc, $_POST['secret']);
      $answer = mysqli_real_escape_string($dbc, $_POST['answer']);

      //declaring sefault registered user status active to a variable $status
      $status = "active";


      /*
        this part verifies form inpunts during registration
       */

        //setting error flag to false
         $error = false;

        	if(!filter_var($email,FILTER_VALIDATE_EMAIL))//this is validating email
        	{
        	  $error = true;
        		$email_error = "Please Enter Valid Email ID";
        	}
        	if(strlen($password) < 6) {
        		$error = true;
        		$password_error = "Password must be minimum of 6 characters";
        	}

        	if($password != $cpassword) {
        		$error = true;
        		$cpassword_error = "Password and Confirm Password doesn't match";
        	}

        	if (!$error) {



            //cheking if given username is a valid UserName
$result = mysqli_query($dbc,"SELECT * FROM authorised_users WHERE user_id ='$id'");

if (mysqli_num_rows($result)==1) {

$get = mysqli_fetch_array($result);
$type = $get['type'];
$title = $get['title'];
$department = $get['department'];
$status = 'active';


//checking if user already exist in the database

$result1 = mysqli_query($dbc,"SELECT * FROM users WHERE user_id='$id'");

  if($result1) {

    if(mysqli_num_rows($result1) === 1) {
       $errormsg = 'UserID already in use please crosscheck and try again';
    }
    @mysqli_free_result($result1);

if($type == 'student') {

      $query = mysqli_query($dbc,"INSERT INTO users (user_id, name, email, user_type, status, password, question, answer)
      VALUES('$id','$name','$email','$type','$status','$password','$question','$answer')")or die(mysqli_error($dbc));
      if($query)
      {

        //insert staff specific data such as department name and position
      $reg_student = mysqli_query($dbc,"INSERT INTO students(student_id,dpt_name,program) VALUES('$id','$department','$title')");

        if ($reg_student) {

          $successmsg = "Successfully done! <a href='../../index.php'>
            <button class='btn btn-success'> LOGIN TO CONTRIBUTE, BY POSTING, VIEW AND COMMENT IDEAS  </button></a>";
        }
        else {
          //if the first values were successfully entered in users table then we should delete them to
          //ensure data integrity. WAZIZIZWA ZA ATOMICITY ZIJA LOL
          $integrity = mysqli_query($dbc,"DELETE FROM users WHERE user_id ='$id'");

        }
      }
      else{
      mysqli_error();
      }
    }
    //check if user is staff
elseif ($type == 'staff') {
  $query = mysqli_query($dbc,"INSERT INTO users (user_id, name, email, user_type, status, password, question, answer)
  VALUES('$id','$name','$email','$type','$status','$password','$question','$answer')")or die(mysqli_error($dbc));
  //if the query has successfully run
  if($query)
  {
    //insert staff specific data such as department name and position
  $reg_staff = mysqli_query($dbc,"INSERT INTO staff(staff_id,position,department) VALUES('$id','$title','$department')");

    if ($reg_staff) {
      //header('Location: signup-success.php');
      $successmsg = "Successfully done! <a href='../../index.php'>
        <button class='btn btn-success'> LOGIN AND FINISH FROM HERE </button></a>";
    }
    else {
      //if the first values were successfully entered in users table then we should delete them to
      //ensure data integrity. WAZIZIZWA ZA ATOMICITY ZIJA LOL
      $integrity = mysqli_query($dbc,"DELETE FROM users WHERE user_id ='$id'");

    }
  }
  else{
  mysqli_error();
  }

}
else {
  $error = "failed to register please contact +265 999 383 8076";
}
   }
  }

                  }

              }

 ?>

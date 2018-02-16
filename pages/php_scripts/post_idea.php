<?php

  include '../config/dbconnect.php';

  if (isset($_POST['idea_post'])) {
  $deparment = mysqli_real_escape_string($_POST['department']);
  $cat_id = mysqli_real_escape_string($_POST['category']);
  $idea = mysqli_real_escape_string($_POST['idea']);
  $title = mysqli_real_escape_string($_POST['title']);
  $identity = mysqli_real_escape_string($_POST['identity']);
  $sub_id = "NULL";
  $student_id = $_SESSION['user_id'];
  $status = 'open';

  $submit = mysqli_query($dbc,"INSERT INTO submitted_ideas(sub_id, student_id, idea, cat_id,	status,	identity,	sub_date,title)
  VALUES('$sub_id','$student_id','$idea','$cat_id','$status','$identity',)");

  if($submit){
    //$match = mysqli_query($dbc."INSERT INTO ")
    $successmsg ="<h3 class='btn btn-success'>SUCCESSFULLY POSTED THE IDEA YOU WILL BE NOTIFIED WHEN COMMENTS ARE AVAILABLE<h3>"

  }
  }

 ?>

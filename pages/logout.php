<?php
session_start();

if(isset($_SESSION['user_id'])) {
  session_destroy();
  unset($_SESSION['user_id']);
  unset($_SESSION['name']);
  unset($_SESSION['course']);
  unset($_SESSION['department']);
  unset($_SESSION['status']);
  unset($_SESSION['role']);
  unset($_SESSION['email']);
    unset($_SESSION['dpt_name']);
  header("Location: ../index.php");
}
else {
  header("Location: ../index.php");
}
?>

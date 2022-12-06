<?php
   include('config.php');
   session_start();

   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select * from users where Username = '$user_check' ");
   $login_session = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $username = $login_session['Username'];
   $email = $login_session['Email'];
   $pn = $login_session['Phone_Number'];
   $dob = $login_session['Date_Of_Birth'];
   $count = $login_session['Times_Rented'];
   $check = $login_session['Status'];
   $Balance = $login_session['Balance'];
   $Last_Pick = $login_session['Last_Pick'];
   $Last_Pick_Area = $login_session['Last_Pick_Area'];
   
   if(!isset($_SESSION['login_user']))
   {
      header("location:login.php");
      die();
   }
?>

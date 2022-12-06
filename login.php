<?php
   include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      <title>LOGIN</title>

      <style type="text/css">
         body {
            background-color: black;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
         }

         label {
            color: #39D8F0;
            font-weight: bold;
            width: 100px;
            font-size: 20px;
         }

         .box {
            border: #307FBF solid 3px;
         }
      </style>

   </head>

   <body>
      <div class="hero-container">
         <div style="width:400px; height:450px; border: solid 2px #307FBF; " align="left">
            <div class="top-window">
               <b>LOGIN</b>

               <div>
                  <a style="color:white;" href="/">Home</a>
                  |
                  <a style="color:white;" href="register.php">Sign Up</a>
               </div>

            </div>

            <img src="https://smartcycle15.000webhostapp.com/banner.png" width="100%" alt="">
            <div style="margin:10px">
               <form action="" method="post">
                  <label>Username: </label><input type="text" name="username" class="box" required/><br /><br />
                  <label>Password: </label><input type="password" name="password" id = "pas" class="box" required/><br />
                  <input style="width: 20px;height: 20px;margin:10px" type="checkbox" onclick="myFunction()"><label> Show Password</label>
                  <script>
                     function myFunction() 
                     {
                        var x = document.getElementById("pas");
                        if (x.type === "password") 
                        {
                           x.type = "text";
                        } 
                        else 
                        {
                           x.type = "password";
                        }
                     }
                  </script>
                  <input type="submit" name="Submit" value="LOGIN" /><br />
                  
                  <?php
                     session_start();
                     $error = "";
                     if (isset($_POST['Submit'])) 
                     {
                        $myusername = mysqli_real_escape_string($db, $_POST['username']);
                        $mypassword = mysqli_real_escape_string($db, $_POST['password']);

                        $sql = "SELECT Username from users where Username = '$myusername' and Password = '$mypassword'";
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        $count = mysqli_num_rows($result);

                        if ($count == 1) 
                        {
                           $_SESSION['login_user'] = $myusername;

                           header("location: dashboard.php");
                        } 
                        else 
                        {
                           $error = "*Username or Password is Invalid";
                        }
                     }
                  ?>

                  <div class="error"><?php echo $error; ?></div>
               </form>

            </div>
         </div>
      </div>
   </body>
</html>
<?php
   include('session.php');
?>

<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

      <title>WELCOME</title>
   </head>

   <body>
      <div style="color:#307FBF;" class="hero-container">
         <img src="https://smartcycle15.000webhostapp.com/banner.png" alt="">

         <?php
            echo "<p style = 'font-size:28px'>".$username."</p>";
            echo "<a class='nav-button' href='profile.php'>PROFILE</a><br>";
            if ($check == 'No') 
            {
               echo '<a class="nav-button" href="rent.php"> RENT CYCLE</a>' . '<br>';
            } 
            else
               echo '<a class="nav-button" href="deliver.php">DELIVER CYCLE</a>' . '<br>';
         ?>

         <a class="nav-button" href="list.php">AVAILABILITY</a><br>
         <a class="nav-button" href="recharge.php">RECHARGE</a>
         <h3><a class="nav-button" href="logout.php">SIGN OUT</a></h3>
      </div>
   </body>
</html>
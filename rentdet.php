<?php
    include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RENT DETAILS</title>
        <style type="text/css">
            body {
                
                background-color: black;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 14px;
            }

            label {
                color: #307FBF;
                font-weight: bold;
                width: 100px;
                font-size: 20px;
            }

            .box {
                color: black;
                width: 100%;
                background: white;
                border: #307FBF solid 3px;
            }
        </style>
    </head>
    
    <body>
    <body class = "hero-container" style="color:#307FBF; font-size:20px">
      <img src="https://smartcycle15.000webhostapp.com/banner.png" alt="">
      <div style="margin:10px">
            <label>Username:</label><br>
            <div class="box"><?php echo $username ?></div><br>
            <label>Rented Place:</label><br>
            <div class="box"><?php echo $Last_Pick_Area ?></div><br>
            <label>Rented Time:</label><br>
            <div class="box"><?php $date=date_create("$Last_Pick");echo date_format($date,"d-M-Y / H:i:s"); ?></div><br>
            <label>Balance:</label><br>
            <div class="box"><?php echo "Rs. ".$Balance ?></div><br>
            <label>No.Of Times Rented:</label><br>
            <div class="box"><?php echo $count ?></div><br>
        <center><br><a class="nav-button" href="dashboard.php">Home</a></center>
    </body>
</html>
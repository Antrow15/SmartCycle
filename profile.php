<?php
    include('session.php');
?>

<!DOCTYPE html>
<html lang="en">

   <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>PROFILE</title>

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

    <body class = "hero-container" style="color:#307FBF; font-size:16px">
        <img src="https://smartcycle15.000webhostapp.com/banner.png" width=25% alt="">
            
        <div style="width:400px; height:550px; border: solid 2px #307FBF; " align="left"><!---700--->
            <div class="top-window">
                <b>PROFILE</b>
            </div>
            
            <div style="margin:10px">
            <label>Username:</label><br>
            <div class="box"><?php echo $username ?></div><br>
            <label>Email:</label><br>
            <div class="box"><?php echo $email ?></div><br>
            <label>Phone Number:</label><br>
            <div class="box"><?php echo "+91 ".$pn ?></div><br>
            <label>Date Of Birth:</label><br>
            <div class="box"><?php $date=date_create("$dob");echo date_format($date,"d-M-Y"); ?></div><br>
            <label>Balance:</label><br>
            <div class="box"><?php echo "Rs. ".$Balance ?></div><br>
            <label>No.Of Times Rented:</label><br>
            <div class="box"><?php echo $count ?></div><br>
            <label>Status of Rent:</label><br>
            <div class="box">
                <?php 
                    if ($check=="Yes")
                    echo "Rented";
                    else
                    echo "Not Rented";
                ?>
            </div><br>
            <?php 
                    if ($check=="Yes")
                    echo "<label>Last Pick:</label><br>";
                    else
                    echo "<label>Last Drop:</label><br>";
                ?>
            <div class="box">
                <?php 
                    if($Last_Pick=="0000-00-00 00:00:00")
                        echo "Not Yet Rented"; 
                    else
                    {
                        $date=date_create("$Last_Pick");
                        echo date_format($date,"d-M-Y / H:i:s"); 
                    }
                ?></div>
            
        </div>
        <center><br><br><a class="nav-button" href="dashboard.php">HOME</a><br><br>
        
    </body>
</html>
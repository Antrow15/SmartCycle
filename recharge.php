<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECHARGE</title>

    <style>
        label1 {
            text-align: center;
            color: #307FBF;
            font-size: 60px;
            font-weight: bold;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
    </style>
</head>

<body>
<div class="hero-container" style="color:white; font-size:24px">
        <img src="https://smartcycle15.000webhostapp.com/banner.png" alt="">
        <label1>RECHARGE</label1><br>
        Current Balance = Rs. <?php echo $Balance?><br><br>
        <form class="register-head" action="" method="POST">
            
            <label>Amount to Deposit: </label><input type="number" name="balance"><br>
            <input type="submit" name="Deposit" value="Deposit">
        </form><center>
        <?php
        if (isset($_POST['Deposit'])) 
        {
            $amt = $_POST['balance'];
            if ($amt > 200) 
            {
                echo '<div class="error">'."*Please deposit Below Rs.200"."</div>";
            } 
            else if($amt == "")
            {
                echo '<div class="error">'."*Enter a valid Amount"."</div>";
            }
            else
            {
                $Balance = $Balance + $amt;
                header("Refresh:0");
                $query = "UPDATE users SET Balance = '$Balance' WHERE Username = '$user_check'";
                $result = $db->query($query);
            }
        }
        ?>
        <br><a class="nav-button" href="dashboard.php">Home</a>
    </div>
</body>

</html>
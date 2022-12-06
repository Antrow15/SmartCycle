<?php
    include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DELIVER CYCLE</title>
    </head>

    <body>
    <style type="text/css">
            body {
                background-color: black;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 45px;
            }

            label1 {
            text-align: center;
            color: #307FBF;
            font-size: 60px;
            font-weight: bold;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
            label {
                color: white;
                font-weight: bold;
                width: 100px;
                font-size: 20px;
            }

            select {
                font-size: 18px;
            }

        </style><center>

    <div class="hero-container" style="color:white; font-size:20px">
      <img src="https://smartcycle15.000webhostapp.com/banner.png" alt="">
      <label1>DELIVER CYCLE</label1><br>
        <form method="POST">
            <label>Select a Area:</label>
            <select name="Area">
                <?php 
                    $sql = mysqli_query($db, "SELECT Name_Of_Areas FROM areas");
                    while ($row = $sql->fetch_assoc())
                    {
                        $area = $row['Name_Of_Areas'];
                        echo "<option value='$area'>".$row['Name_Of_Areas']."</option>";
                    }
                ?>

            </select><br><br>

            <?php
                if($check == "No")
                {
                    echo "*Please Rent a bike to Deliver";
                }
                else 
                {
                    echo '<input type="submit" name="Submit" value="Submit">';
                }
            ?>
        </form>
  
        <?php
            if (isset($_POST['Submit'])) 
            {
                date_default_timezone_set("Asia/Calcutta");
                $current_date = date("Y-m-d H:i:s");
                $rented = date_diff(date_create($Last_Pick),date_create($current_date));
                if ($rented->h>0)
                {
                    echo $rented->h;
                    $amt = ($rented->h*60) + $rented->i;
                }
                else
                {
                    if($rented->i<=0)
                        $amt = 1;
                    else
                        $amt = $rented->i; 
                }
                
                if($Balance<$amt)
                {
                    echo '<div class="error">'."*You don't have enough money to Deliver. Recharge and try again"."<br>"."</div><br>";
                    echo "Amount to be Paid = Rs. $amt"."<br>";
                    echo "Balance = Rs. $Balance"."<br>";
                }
                else
                {
                    $Area = $_POST['Area'];
                    $Balance = $Balance - $amt;
                    $query = "UPDATE users SET Balance = '$Balance', Times_Rented = '$count' , Last_Pick = '$current_date', Last_Pick_Area = '$Area', Status = 'No' WHERE Username = '$user_check'";
                    $result = $db->query($query);
                    $query1 = "UPDATE areas SET No_Of_Bikes = No_Of_Bikes + 1 WHERE Name_Of_Areas = '$Area'";
                    $result1 = $db->query($query1);
                    header("location:deliverdet.php");
                    die();
                }
            }
        ?>
        <br><a class="nav-button" href="dashboard.php">Home</a>
    </body>
</html>
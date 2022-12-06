<?php
    include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RENT CYCLE</title>
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
        <label1>RENT CYCLE</label1><br>
            Current Balance: Rs. <?php echo $Balance?><br><br>
            <form action =" " method="POST">
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
                    if ($Balance < 10)
                    {
                    echo '<div class="error">'."Low Balance. Have a minimum Amount of Rs.10 to Rent"."<br>"."</div>";
                    }
                    else 
                    {
                        echo '<input type="submit" name="Submit" value="Submit">';
                    }
                ?>

            </form>

            <div class="error">
                *Confidential Fees of Rs.10 will be debited from your account to Rent a Bike <br>
            </div>
            
            <?php
                if (isset($_POST['Submit'])) 
                {
                    if($Balance < 10)
                    {
                        echo "Please Recharge to Rent a Bike";
                    }
                    else
                    {
                        $Balance = $Balance - 10;
                        $count = $count + 1;
                        date_default_timezone_set("Asia/Calcutta");
                        $rent_date = date("Y-m-d H:i:s");
                        $Area = $_POST['Area'];
                        $query = "UPDATE users SET Times_Rented = '$count', Last_Pick = '$rent_date', Last_Pick_Area = '$Area', Status = 'Yes', Balance = '$Balance' WHERE Username = '$user_check'";
                        $result = $db->query($query);
                        $query1 = "UPDATE areas SET No_Of_Bikes = No_Of_Bikes - 1 WHERE Name_Of_Areas = '$Area'";
                        $result1 = $db->query($query1);
                        header("location:rentdet.php");
                        die();
                    }
                }
            ?>

            <br><br><a class="nav-button" href="dashboard.php">Home</a>
        </div>
    </body>
</html>
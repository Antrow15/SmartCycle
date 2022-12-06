<?php
    include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

   <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>REGISTER</title>

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
                width: 98%;
                border: #307FBF solid 3px;
            }

            input {
                margin: 0 ;
                width: 100%;
                height: 30px;
                margin-bottom: 25px;
            }
        </style>
    </head>

    <body>
        <div class="hero-container">
        <div style="width:400px; height:780px; border: solid 2px #307FBF; " align="left">
        <div class="top-window">
            <b>REGISTER</b>
            <div>
               <a style="color:white;" href="/">Home</a>
               |
               <a style="color:white;" href="login.php">Sign In</a>
            </div>
         </div>
           
         <img src="https://smartcycle15.000webhostapp.com/banner.png" width="100%" alt="">
         <div style="margin:10px">
            <form  action="" method="POST">
                <label>Username:</label><br>
                <input type="text" name="username" class="box" required><br>

                <label>Date Of Birth:</label><br>
                <input type="date" name="dob" class="box" required><br>

                <label>Phone Number:</label><br>
                <input type="number" name="phonenumber" class="box" required><br>

                <label>Email: </label><br>
                <input type="text" name="email" class="box" required><br>

                <label>Password:</label><br>
                <input type="password" name="password" id = "pas" class="box" required><br>

                <label>Re-Enter Password:</label><br>
                <input type="password" name="password1" id = "pas1" class="box" required><br>

                <input style="width: 20px;height: 20px" type="checkbox" onclick="myFunction()"><label> Show Password</label>
                <script>
                    function myFunction() 
                    {
                        var x = document.getElementById("pas");
                        var y = document.getElementById("pas1");

                        if (x.type === "password") 
                        {
                           x.type = "text";
                           y.type = "text";
                        } 
                        else 
                        {
                           x.type = "password";
                           y.type = "password";
                        }
                     }
                </script>
                
                <input type="submit" name="Submit" value="CREATE ACCOUNT">
            </form>
        </div><center>

        <?php
            if (isset($_POST['Submit'])) 
            {
                $Username = $_POST['username'];
                $DOB = $_POST['dob'];
                $PN = $_POST['phonenumber'];
                $Email = $_POST['email'];
                $p = $_POST['password'];
                $p1 = $_POST['password1'];
                
                $query = "SELECT * FROM users WHERE Username = '$Username' or Phone_Number = '$PN' or Email = '$Email'";
                    $result = $db->query($query);
                    if ($result) 
                    {
                        if (mysqli_num_rows($result) > 0) 
                        {
                            echo '<div class="error">'.'*User Credentials already exists. Please Sign-In' . '<br>';
                        } 
                        else if (!($p == $p1)) 
                        {
                            echo '<div class="error">'."*Password Doesn't Match"."<br>";
                        } 
                        else 
                        {
                            $sql = "INSERT INTO `users` (`Username`, `Email`, `Phone_Number`, `Password`, `Date_Of_Birth`, `Balance`, `Last_Pick`, `Last_Pick_Area`, `Times_Rented`, `Status`) VALUES ('$Username', '$Email', '$PN', '$p', '$DOB', '0', '0000-00-00 00:00:00.000000', ' ', '0', 'No');";
                            if ($db->query($sql) === TRUE)
                            {
                                echo "antrow";
                                header("location:login1.php");
                                exit();
                            }
                            else
                            echo "asd";
                        }
                    }
                $db->close();
            }
        ?>
    </body>

</html>
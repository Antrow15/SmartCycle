<?php
    include('session.php');
?>
<html>
<head>
    <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      <title>CYCLE DETAILS</title>
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        label {
            text-align: center;
            color: #307FBF;
            font-size: 60px;
            font-weight: bold;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: white;
            border: 1px solid black;
        }
        th {
            background-color: #307FBF;
            border: 1px solid black;
            color: black;
        }
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            color: black;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
    <body>
    <div class="hero-container">

    <center><img src="https://smartcycle15.000webhostapp.com/banner.png" alt=""><br>
    <label>CYCLE AVAILABILITY</label>
        <section>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Area ID</th>
                <th>Name Of Areas</th>
                <th>No Of Bikes</th>
            </tr>
            <?php
                
                    $sql = "SELECT * FROM areas";
                    $result = $db->query($sql);
                    while($rows=$result->fetch_assoc())
                    {
                        ?>
                        <tr>
                            <td><?php echo $rows['Area_ID'];?></td>
                            <td><?php echo $rows['Name_Of_Areas'];?></td>
                            <td><?php echo $rows['No_Of_Bikes'];?></td>
                        </tr>
                        <?php
                    }
            ?>
        </table>
    </section>
    <br><a class="nav-button" href="dashboard.php">HOME</a><br><br>
    </body>
</html>
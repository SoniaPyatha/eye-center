<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="style.css">
    <style>
       
        th{
            background-color: lightgray;
        }
         th,
    td {
        border-spacing: 30px;
        padding: 15px;
        text-align: center;
        font-size: medium;

    }
        table {
        border: 3px solid black;
        width: 100%;
        table-layout: fixed;
    }
    tr{
        border-bottom: 3px solid #000; 
    }
    tr:hover{
        background-color: antiquewhite ;
    }
    </style>
</head>

<body>
    <?php
    include("patient-header.php");
    ?>
    <section class="home" id="home" style="height:100vh">
        <div class="results-container">
            <div class="results">
                <div class="result_title">
                <h1 class="heading">Booking <span> Details</span></h1>
                </div>
                <?php
                include("connection.php");
                $pid = $_SESSION['patientId'];
                $sql = "SELECT * FROM booking WHERE pid=$pid";
                $result = $conn->query($sql);
                if ($result) {
                    echo "<table style='border-collapse:collapse; width:100%;'><tr><th>Id</th><th>Service</th><th>Date</th><th>Time</th><th>Status</th></tr>";
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $booked= $rows['booked'];
                        $bookingDone="pending";
                        $color="red";
                        if($booked!=0){
                            $bookingDone="booked";
                            $color="green";
                        }
                        echo "<tr><td>" . $rows['id'] . "</td><td>" . $rows['service'] . "</td><td>" . $rows['date'] . "</td><td>" . $rows['time'] . "</td>
            <td> <b style='color:$color;'>$bookingDone</b>";
           
               
              echo" </td>
            </tr>";
                    }
                } else {
                    echo "database_error!!!";
                }

               
              
                ?>
            </div>
        </div>

    </section>
    <?php
    include("patient-footer.php");
    ?>
</body>

</html>
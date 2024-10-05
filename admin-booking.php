<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="style.css">
    <style>
        th {
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

        tr {
            border-bottom: 3px solid #000;
        }

        tr:hover {
            background-color: antiquewhite;
        }
    </style>
</head>

<body>
    <?php
    include("admin-header.php");
    ?>
    <section class="home" id="home" style="height:100vh">
        <div class="results-container">
            <div class="results">
                <div class="result_title">
                <h1 class="heading">Booking <span>Details</span></h1>
                </div>
                <?php
                include("connection.php");
                
                $sql = "SELECT b.id,p.fullname,p.gender,b.date,b.time,b.booked,p.dob,b.service FROM booking as b  INNER JOIN patient as p on b.pid=p.id";
                $result = $conn->query($sql);
                if ($result) {
                    echo "<table style='border-collapse:collapse; width:100%;'><tr><th>Id</th><th>Full Name</th><th>Service</th><th>Gender</th><th>DOB</th><th>Booking Date</th><th>Booking Time</th><th>Status</th><th>Action</th></tr>";
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $booked = $rows['booked'];
                        $bookingDone = "pending";
                        $color = "red";
                        if ($booked != 0) {
                            $bookingDone = "booked";
                            $color = "green";
                        }
                        echo "<tr><td>" . $rows['id'] . "</td><td>" . $rows['fullname'] . "</td><td>" . $rows['service'] . "</td><td>" . $rows['gender'] . "</td><td>" . $rows['dob'] . "</td><td>" . $rows['date'] . "</td><td>" . $rows['time'] . "</td>
            <td> <b style='color:$color;'>$bookingDone</b>";


                        echo "<td><form method='POST'><input type='hidden' name='bookingId' value=" . $rows['id'] . "><button type='submit' name='accept' style='border-radius:20%;padding:3px;background-color:green;color:white'>Accept</button><button type='submit' name='reject' style='border-radius:20%;padding:3px;margin:10px;background-color:red;color:white'>Reject</button></form></td> </td>
            </tr>";
                    }
                } else {
                    echo "database_error!!!";
                }



                ?>
            </div>
        </div>

    </section>
    
</body>

</html>
<?php
include("connection.php");
if(isset($_POST["accept"]) ){
    
    $bookingId=$_POST['bookingId'];
    $sql = "UPDATE booking SET booked = 1 WHERE id = $bookingId";
    if($conn->query($sql)===true){
        echo "<script>window.location.href = window.location.href;</script>";
    }else{
        echo "Error updating record: " . $stmt->error();
    }

      
}if(isset($_POST["reject"]) ){
    
    $bookingId=$_POST['bookingId'];
    $sql = "DELETE from booking WHERE id = $bookingId";
    if($conn->query($sql)===true){
        echo "<script>window.location.href = window.location.href;</script>";
    }else{
        echo "Error updating record: " . $stmt->error();
    }

      
}
$conn->close();
?>
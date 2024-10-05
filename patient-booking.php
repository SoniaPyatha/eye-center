<?Php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <title>Booking</title>
    <style>
      
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .form-container h2 {
            margin-top: 0;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select,
        .form-group button {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="submit"],
        .form-group button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover,
        .form-group button:hover {
            background-color: #45a049;
        }

        .form-text {
            color: #6c757d;
            font-size: 0.875em;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php
    include("patient-header.php");
    ?>
<section class="home" id="home" style="height:100vh">
    <div class="content">
    
        <div class="form-container">
        <h1 class="heading">Booking <span> Form</span></h1>
            <form action="" method="POST">
                <div class="form-group mb-3">
                    <label for="dateInput" class="form-label">Date:</label>
                    <input type="date" class="form-control" id="dateInput" name="bookingDate" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" max="<?php echo date('Y-m-d', strtotime('+7 day')); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="timeInput" class="form-label">Time:</label>
                    <select name="bookingTime" id="timeInput" >
                        <option value="09:00:00">9 AM</option>
                        <option value="13:00:00">1 PM</option>
                        <option value="16:00:00">4 PM</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="serviceInput" class="form-label">Serive:</label>
                    <select name="service" id="timeInput" >
                        <option value="cataract surgery">Cataract Surgery</option>
                        <option value="contact lens fitting and evaluating">Contact Lens Fitting and Evaluating</option>
                        <option value="retina service">Retina Service</option>
                        <option value="pedriatic eye care">Pedriatic Eye Care</option>
                    </select>
                </div>
                <!-- <div class="form-group mb-3">
                    <label for="nameInput" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="nameInput" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="addressInput" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="addressInput" name="address" required>
                </div>
                <div class="form-group mb-3">
                    <label for="contactInput" class="form-label">Contact:</label>
                    <input type="text" class="form-control" id="contactInput" name="contact" required>
                </div>
                <div class="form-group mb-3">
                    <label for="emailInput" class="form-label">Email address:</label>
                    <input type="email" class="form-control" id="emailInput" name="email" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div> -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </section>
    
    <link rel="stylesheet" href="script.js">
</body>

</html>
<?php
include("connection.php");
 $pid = $_SESSION['patientId'];
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookingTime=$_POST['bookingTime'];
    $bookingDate=$_POST['bookingDate'];
    $service=$_POST['service'];
    
        try{
            $sql="INSERT INTO `booking` (`pid`, `date`, `service`,`time`) VALUES ( '$pid', '$bookingDate', '$service','$bookingTime');";
        if($conn->query($sql)===true){
            echo "<script>alert('Booking Sent');
            window.location.href = 'patient-booking-details.php';
            </script>";
        }else{
            echo "<script>alert('$conn->error');
            window.location.href = 'patient-booking.php';
            </script>";
        }
        }catch(mysqli_sql_exception $e){
            echo "$e";
        }
        
       
    
}
$conn->close();
?>
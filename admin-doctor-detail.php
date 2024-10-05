<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 1200px;
           margin: 20px;
        }

        .card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: calc(20% - 20px);
          box-sizing: border-box;
            padding: 10px;
             
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card p {
            margin: 0;
            padding: 0px;
            font-size: 16px;
            color: #333;
        }

        .delete {
            float: right;
        }
    </style>
</head>

<body>
    <?php
    include("admin-header.php");
    ?>
    <section class="home" id="home">
        <h1 class="heading">Doctor <span> details</span></h1>
        <div class="container">
            <?php
            include("connection.php");
            $sql = "select * from doctor";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $img = $row['photo'];
                $name = $row['fullname'];
                $speciality = $row['speciality'];
                $contact = $row['contact'];
                echo " <div class='card'>
               
                <img src='image/$img' alt='no image'>
                <p>$name</p><p>($speciality)</p>
                <p>$contact</p>
                <br>
                <div class='delete''>
                <form method='POST'>
                <input type='hidden' name='doctorId' value=" . $row['id'] . ">
                <button type='submit' name='delete' style='border-radius:20%;padding:3px;color:white;background-color:red;'>Delete</button>
                </form>
                </div>
                 
            </div>";
            }

            ?>




        </div>
    </section>


</body>

</html>
<?php
include("connection.php");

if(isset($_POST["delete"])) {
    $doctorId = $_POST['doctorId'];
  
    echo "<script>
            if(confirm('Are you sure you want to delete this doctor?')) {
                window.location.href = 'admin-doctor-detail.php?doctorId=$doctorId';
            }
          </script>";
}

if(isset($_GET["doctorId"])) {
    $doctorId = $_GET['doctorId'];
    $sql = "DELETE FROM doctor WHERE id = $doctorId";
    if($conn->query($sql) === true){
        echo "<script>alert('Doctor deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting doctor: " . $conn->error . "');</script>";
    }
    echo "<script>window.location.href = 'admin-doctor-detail.php';</script>";
}
?>
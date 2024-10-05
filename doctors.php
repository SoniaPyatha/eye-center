<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
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
    </style>
</head>

<body>
<?php
     include("header.php");
     ?>
    <section class="home" id="home">
    <h1 class="heading">Available  Doctors</h1>
        <div class="container">
            <?php 
            include("connection.php");
            $sql="select * from doctor";
            $result=$conn->query($sql);
            
            while($row=$result->fetch_assoc()){
                $img=$row['photo'];
                $name=$row['fullname'];
                $speciality=$row['speciality'];
                echo " <div class='card'>
                <img src='image/$img' alt='no image'>
                <p>$name</p><p>($speciality)</p>
            </div>";
            }
            
            ?>
            
            
            
          
        </div>
    </section>
    <?php
     include("footer.php");
     ?>

</body>

</html>
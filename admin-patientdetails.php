<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
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
            word-wrap: break-word; 
            max-width: 150px;

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
                <h1 class="heading">Patient <span> Details</span></h1>
                </div>
                <?php
                include("connection.php");
                
                $sql = "SELECT * FROM patient";
                $result = $conn->query($sql);
                if ($result) {
                    echo "<table style='border-collapse:collapse; width:100%;'><tr><th>Id</th><th>Full Name</th><th style='width:ma'>Email</th><th>DOB</th><th>Gender</th><th>Contact</th></tr>";
                    while ($rows = mysqli_fetch_assoc($result)) {
                        
                       
                        echo "<tr><td>" . $rows['id'] . "</td><td>" . $rows['fullname'] . "</td><td>" . $rows['email'] . "</td><td>" . $rows['dob'] . "</td><td>" . $rows['gender'] . "</td><td>" . $rows['contact'] . "</td>
            
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
    include("admin-footer.php");
    ?>

</body>

</html>
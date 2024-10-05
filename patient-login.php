<?php
session_start();
$error_msg = "";
include('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    $sql = "SELECT * FROM patient WHERE email='$email';";
    $result = $conn->query($sql);
    if($result -> num_rows > 0){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password,$row['password'])){
                // $row=$result->fetch_assoc();
                $_SESSION['patientName']=$row['fullname'];
                $_SESSION['patientId']=$row['id'];
                header("Location:patient-dashboard.php");
                exit();
            }else{
                $error_msg = "Username and password donot match";
            }
        }
    }else{
        $error_msg = "Username and password donot match";
    }

    
    
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
            font-size: large;
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include("header.php");
    ?>
    <section class="home" id="home" style="height:100vh;">
        <div class="content">
            <div class="form-container">
            <h1 class="heading">Patient <span> Login</span></h1>
                <form action="" method="POST">

                    <div class="form-group mb-3">
                        <label for="emailInput">Email:</label>

                        <input type="text" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>


                    </div>

                    <div class="form-group mb-3">
                        <label for="passwordInput">Password:</label>

                        <input type="password" name="password" required>


                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <?php
                if (isset($error_msg)) {
                    echo "<p id='error-msg' style='color: red;font-size: small'>$error_msg</p>";
                }
                ?>
                <script>
                    setTimeout(function(){
                        document.getElementById("error-msg").style.display="none";
                    },4000);                   
                </script>
                <p style="font-size: small;"></p>

            </div>
        </div>

    </section>


</body>

</html>
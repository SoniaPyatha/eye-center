<?php
include("connection.php");
 $fullname = $email = $gender = $dob = $contact = "";
 $passwordError = "";
 $duplicateEmailError= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $contact = $_POST["contact"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    if ($password == $confirmPassword) {
        $hashPassword=password_hash($confirmPassword,PASSWORD_DEFAULT);
        try{
            $sql="INSERT INTO `patient` (`fullname`, `email`, `contact`, `dob`, `gender`, `password`) VALUES ( '$fullname', '$email', '$contact', '$dob', '$gender', '$hashPassword');";
        if($conn->query($sql)===true){
            echo "<script>alert('Successfully registered');
            window.location.href = 'index.php';
            </script>";
        }else{
            echo "<script>alert('$conn->error');
            window.location.href = 'register-patient.php';
            </script>";
        }
        }catch(mysqli_sql_exception $e){
            if ($e->getCode() == 1062) {
                if (strpos($e->getMessage(), 'email') !== false) {
                    $duplicateEmailError = "Email already registered. Please use a different email.";
                }
            }
        
        }
        
       
    } else {
        $passwordError = "Password and confirm password donot match";
        echo $passwordError;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .gender-labels {
            display: flex;
            align-items: center;
            /* Align items vertically */
        }

        .gender-labels label {
            margin-right: 30px;
            /* Add space between labels */
            display: inline-flex;
            /* Display labels inline */
            align-items: center;
            /* Align items horizontally */
        }

        .gender-labels input[type="radio"] {
            margin-right: 5px;
            /* Add space between radio buttons and labels */
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include("header.php");
    ?>
    <section class="home" id="home">
        <!-- <div class="registration-container">
        <div class="registration-form">
            <h2 style="font-size: large;">Member Registration</h2>
            <form action="register.php" method="POST">
                <div class="form-group">
                    <label for="fullname">Full Name:</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Gender:</label>
                    <div class="gender-labels">
                        <label><input type="radio" id="male" name="gender" value="male"> Male</label>
                        <label><input type="radio" id="female" name="gender" value="female"> Female</label>
                        <label><input type="radio" id="other" name="gender" value="other"> Other</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact Number:</label>
                    <input type="text" id="contact" name="contact" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Confirm Password:</label>
                    <input type="password" id="confirmpassword" name="confirmpassword" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div> -->
        <div class="content">
            <div class="form-container">
            <h1 class="heading">Register <span>Here</span></h1>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" id="fullname" name="fullname"  pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s\-']{5,}" 
                        title="please enter a valid full name"
                        value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>" required>
                       

                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                    </div>
                    <p id="duplicateEmailError" style="font-size: small;color:red"> <?php if (isset($duplicateEmailError)) {
                            echo "$duplicateEmailError";
                        } ?>
                    </p>
                    <script>
                    setTimeout(function(){
                        document.getElementById("duplicateEmailError").style.display="none";
                    },3000);
                    // Function to hide the content
                    
                </script>
                    <div class="form-group">
                        <label>Gender:</label>
                        <div class="gender-labels">
                            <label><input type="radio" id="male" name="gender" value="male" <?php echo ($gender == 'male') ? 'checked' : ''; ?>> Male</label>
                            <label><input type="radio" id="female" name="gender" value="female" <?php echo ($gender == 'female') ? 'checked' : ''; ?>> Female</label>
                            <label><input type="radio" id="other" name="gender" value="other" <?php echo ($gender == 'other') ? 'checked' : ''; ?>> Other</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob">DOB:</label>
                        <input type="date" id="dob" name="dob" max="<?php echo date('Y-m-d'); ?>" value="<?php echo isset($_POST['dob']) ? htmlspecialchars($_POST['dob']) : ''; ?>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact Number:</label>
                        <input type="text" id="contact" name="contact"  pattern="[0-9]{10}" title="Please enter a 10-digit contact number" 
                         value="<?php echo isset($_POST['contact']) ? htmlspecialchars($_POST['contact']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password"   required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password:</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <p id="passworderror" style="font-size: small;color:red"> <?php if (isset($passwordError)) {
                            echo "$passwordError";
                        } ?>
                    </p>
                    <script>
                    setTimeout(function(){
                        document.getElementById("passworderror").style.display="none";
                    },4000);
                    // Function to hide the content
                    
                </script>
                    <div class="form-group">
                        <input type="submit" value="Register">
                    </div>

                </form>


            </div>
        </div>
    </section>
    <?php include("footer.php"); ?>
</body>

</html>
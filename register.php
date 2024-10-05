<?php
// Start session
session_start();

// Database connection parameters
$servername = "localhost";
$dbname = "user_database";
$dbusername = "root"; // Change this to your database username
$dbpassword = ""; // Change this to your database password

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>

<h2>Login</h2>

<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Dummy username and password for demonstration
    $dummy_username = "user";
    $dummy_password = "password";

    if($username === $dummy_username && $password === $dummy_password){
        session_start();
        $_SESSION["loggedin"] = true;
        header("location: welcome.php");
    } else{
        echo "Invalid username or password.";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Login">
</form>

</body>
</html>

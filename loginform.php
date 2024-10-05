<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="styles_form.css">
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="#" method="POST" class="login-form">
      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
<?php
include('connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
      
        $_SESSION["un"] = $username;
            header("Location: admin-dashboard.php");
        } else {
            echo "<script>alert('wrong password or username');
            window.location.href = 'loginform.php';
            </script>";
        }
}

$conn->close();
?>
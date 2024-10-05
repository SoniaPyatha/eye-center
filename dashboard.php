<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Eye Clinic Appointment Booking System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
        }
        .logout-btn {
            float: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Panel - Eye Clinic Appointment Booking System</h2>
        <p>Hello, <?php echo $_SESSION['admin']; ?>! You are logged in.</p>
        <a href="?logout" class="logout-btn">Logout</a>

        <!-- Display appointment list -->
        <h3>Appointments</h3>
        <table>
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Patient Name</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample appointment data -->
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>2024-06-01</td>
                    <td>10:00 AM</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>2024-06-02</td>
                    <td>02:30 PM</td>
                </tr>
                <!-- Add PHP code here to fetch and display appointment data from the database -->
            </tbody>
        </table>
    </div>
</body>
</html>
ss
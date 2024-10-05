<?php
// Establish database connection
include('connection.php');



// Check connection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $date = $_POST['date'];
    $time = $_POST['time'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    // Prepare SQL statement
    $sql = "INSERT INTO booking (date, time, name, address, contact, email)
            VALUES ('$date', '$time', '$name', '$address', '$contact', '$email')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully');
        window.location.href = 'index.php';
        </script>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>temp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header class="header">
        <a href="index.php" class="logo"> <i class="fas fa-eye"></i> DristiEye </a>
        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="service.php">services</a>
            <a href="about.php">about</a>
            <a href="doctors.php">doctors</a>
            <a href="booking.php">bookings</a>
            <a href="loginform.php">login</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>
    <section class="home" id="home"></section>
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>quick links</h3>
                <a href="index.php"> <i class="fas fa-chevron-right"></i>home</a>
                <a href="service.php"> <i class="fas fa-chevron-right"></i>Services</a>
                <a href="about.php"> <i class="fas fa-chevron-right"></i>about</a>
                <a href="doctors.php"> <i class="fas fa-chevron-right"></i>doctors</a>
                <a href="booking.php"> <i class="fas fa-chevron-right"></i>bookings</a>
            </div>
            <div class="box">
                <h3>our services</h3>
                <a href="#"> <i class="fas fa-chevron-right"></i>Bed facility</a>
                <a href="#"> <i class="fas fa-chevron-right"></i>Massage therapy</a>
                <a href="#"> <i class="fas fa-chevron-right"></i>ambulance service</a>
            </div>
            <div class="box">
                <h3>our services</h3>
                <a href="#"> <i class="fas fa-phone"></i>01-6632568</a>
                <a href="#"> <i class="fas fa-phone"></i>+977 9863215725</a>
                <a href="#"> <i class="fas fa-envelope"></i>Dristinepal@gmail.com</a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i>Bhaktapur, Nepal</a>
            </div>
    </section>
    <link rel="stylesheet" href="script.js">
</body>

</html>


booking form..
<div class="form-container">
        <form action="process_form.php" method="POST">
            <div class="mb-3">
                <label for="dateInput" class="form-label">Date:</label>
                <input type="date" class="form-control" id="dateInput" name="date">
            </div>
            <div class="mb-3">
                <label for="timeInput" class="form-label">Time:</label>
                <input type="time" class="form-control" id="timeInput" name="time">
            </div>
            <div class="mb-3">
                <label for="nameInput" class="form-label">Name:</label>
                <input type="text" class="form-control" id="nameInput" name="name">
            </div>
            <div class="mb-3">
                <label for="addressInput" class="form-label">Address:</label>
                <input type="text" class="form-control" id="addressInput" name="address">
            </div>
            <div class="mb-3">
                <label for="contactInput" class="form-label">Contact:</label>
                <input type="text" class="form-control" id="contactInput" name="contact">
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email address:</label>
                <input type="email" class="form-control" id="emailInput" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
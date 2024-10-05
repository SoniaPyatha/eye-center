<?php
session_start();
if(!isset($_SESSION['patientName'])){
  header("location:patient-login.php");
}
?>
<header class="header">
        <a href="patient-dashboard.php" class="logo"> <i class="fas fa-eye"></i>  Visionary Eye Center</a>
        <nav class="navbar">
            <a href="patient-dashboard.php">Home</a>
            <a href="patient-booking.php">Book Service</a>
            <a href="patient-booking-details.php">Booking details</a>
            <a href="index.php" >Logout</a>
            
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>
    

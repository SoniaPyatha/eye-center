<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>

<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:admin-login.php");
}
?>
<header class="header">
    <a href="admin-dashboard.php" class="logo"> <i class="fas fa-eye"></i> Visionary Eye Center</a>
    <nav class="navbar">
        <a href="admin-dashboard.php">Home</a>
        <a href="admin-booking.php">Bookings</a>
        <a href="admin-patientdetails.php">Patient details</a>
        
        <div class="dropdown">
            <span><a href="">Doctor &#9660;</a></span>
            <div class="dropdown-content">
                <a href="admin-add-doctor.php">Add Doctor</a>
                <a href="admin-doctor-detail.php">Doctor Detail</a>
            </div>
        </div>
        <a href="index.php">Logout</a>

    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
</header>
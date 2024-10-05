<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include("admin-header.php");
     ?>
     <section class="home" id="home" style="height: 100vh;">
     <h1 class="heading">Welcome <span><?php echo $_SESSION['username'];?></span></h1>
     
     </section>
     <?php
    include("admin-footer.php");
     ?>
</body>
</html>
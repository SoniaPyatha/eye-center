<?Php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <title>Add Doctor</title>
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
</head>

<body>
    <?php
    include("admin-header.php");
    ?>
<section class="home" id="home" style="height:100vh">
    <div class="content">
    
        <div class="form-container">
        <h1 class="heading">Add  Doctors</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="nameInput" class="form-label">Full Name:</label>
                    <input type="text" class="form-control" id="nameInput" name="fullname" required>
                </div>
                <div class="form-group mb-3">
                    <label for="specialityInput" class="form-label">Speciality:</label>
                    <input type="text" class="form-control" id="specialityInput" name="speciality" required>
                </div>
                <div class="form-group">
                        <label for="contact">Contact Number:</label>
                        <input type="text" id="contact" name="contact" required>
                </div>
                <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" id="doctor_photo" name="doctor_photo" accept="image/*" required>
                    </div>
                
               
            
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </section>
    
    <link rel="stylesheet" href="script.js">
</body>

</html>
<?php
include("connection.php");

 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname=$_POST['fullname'];
    $speciality=$_POST['speciality'];
    $contact=$_POST['contact'];
    $image_path='';
    

    if(isset($_FILES['doctor_photo'])&&$_FILES['doctor_photo']['error']==UPLOAD_ERR_OK){
        $upload_dir='image/';
        $image_path=basename($_FILES['doctor_photo']['name']);
        if(!move_uploaded_file($_FILES['doctor_photo']['tmp_name'],$upload_dir.$image_path)){
            die("Error uploading image");
        }
    }
    
        try{
            $sql="INSERT INTO `doctor` (`fullname`, `speciality`, `contact`,`photo`) VALUES ( '$fullname', '$speciality', '$contact','$image_path');";
        if($conn->query($sql)===true){
            echo "<script>alert('Doctor Added');
            window.location.href = 'admin-doctor-detail.php';
            </script>";
        }else{
            echo "<script>alert('$conn->error');
            window.location.href = 'admin-add-doctor.php';
            </script>";
        }
        }catch(mysqli_sql_exception $e){
            echo "$e";
        }
        
       
    
}
$conn->close();
?>
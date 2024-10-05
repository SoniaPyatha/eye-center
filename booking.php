<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <title>Booking</title>
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
    include("header.php");
    ?>
<section class="home" id="home">
    <div class="content">
        <div class="form-container">
            <h2>Registration Form</h2>
            <form action="process_form.php" method="POST">
                <div class="form-group mb-3">
                    <label for="dateInput" class="form-label">Date:</label>
                    <input type="date" class="form-control" id="dateInput" name="date" min="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="timeInput" class="form-label">Time:</label>
                    <input type="time" class="form-control" id="timeInput" name="time" required>
                </div>
                <div class="form-group mb-3">
                    <label for="nameInput" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="nameInput" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="addressInput" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="addressInput" name="address" required>
                </div>
                <div class="form-group mb-3">
                    <label for="contactInput" class="form-label">Contact:</label>
                    <input type="text" class="form-control" id="contactInput" name="contact" required>
                </div>
                <div class="form-group mb-3">
                    <label for="emailInput" class="form-label">Email address:</label>
                    <input type="email" class="form-control" id="emailInput" name="email" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </section>
    <?php
    include("footer.php");
    ?>

    <link rel="stylesheet" href="script.js">
</body>

</html>
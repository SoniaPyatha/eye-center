<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device=width,initial-scale=.0">
    <title>Services</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="style.css">

</head>

</html>

<body>

    <?php
    include("header.php");
    ?>
 <section class="home" id="home">
    <section class="services" id="services">
        
        <h1 class="heading">our services</h1>

        <div class="box-container">
            <div class="box">
                <i class="fas fa-notes-medical"></i>
                <h3> Cataract Surgery</h3>
                
                <a href="cataract-surgery.php" class="btn">learn more<span class="fas-fa-chavron-right"></span></a>

            </div>

            <div class="box">
                <i class="fas fa-eye"></i>
                <h3> Retina Service</h3>
                
                <a href="retina-service.php" class="btn">learn more<span class="fas-fa-chavron-right"></span></a>

            </div>

            <div class="box">
                <i class="fas fa-pills"></i>
                <h3>Contact Lens Fitting and Evaluation</h3>
                
                <a href="contact-lens-fitting-and-evaluation.php" class="btn">learn more<span class="fas-fa-chavron-right"></span></a>

            </div>

            <div class="box">
                <i class="fas fa-procedures"></i>
                <h3>Pedriatic Eye Care</h3>
                
                <a href="pedriatic-eye-care.php" class="btn">learn more<span class="fas-fa-chavron-right"></span></a>

            </div>

        </div>
    </section>
    </section>
    <?php
    include("footer.php");
    ?>
    <link rel="stylesheet" href="script.js">
</body>
</html>
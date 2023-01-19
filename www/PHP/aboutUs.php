<!DOCTYPE html>
<html lang="en">

<head>
    <!-- REQUIRE -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TITLE -->
    <title>Desktop Builder</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/nav.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/aboutUs.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&family=Oleo+Script&display=swap" rel="stylesheet">
</head>

<body>
    <!-- NAVBAR -->
    <?php
    require './generalPartPage/navbar.php';
    ?>



    <!-- PAGE -->
    <h2>About us</h2>
    <div id="about-us-text">
        <p class="about-text-p">We are a young company selling computers for both individuals and professionals. You will be able to get with us as well
            a computer of office automation with a low price but a good quality-price ratio, as a computer made especially for the
            last generation games requires a lot of resource, or as well a computer used for graphics and which needs a very great
            computing power. Our computers are assembled by us and are covered by a 1 year warranty. </p>
        <p class="about-text-p">Our priority is your satisfaction so do not hesitate to contact us : </p>
    </div>
    <div id="about-us-logo">
        <div class="about-logo-section">
            <i class="fa-solid fa-house logo-page"></i>
            <p class="about-logo-p"> Västra Långgatan 14 Kiruna SWEDEN</p>
        </div>
        <div class="about-logo-section">
            <i class="fa-solid fa-phone logo-page"></i>
            <p class="about-logo-p"> +46 0980-3370267</p>
        </div>
        <div id="separate"></div>
        <div class="about-logo-section">
            <i class="fa-regular fa-clock logo-page"></i>
            <p class="about-logo-p">Mon-Sat 8.00 - 18.00</p>
        </div>
        <div class="about-logo-section">
            <i class="fa-regular fa-envelope logo-page"></i>
            <p class="about-logo-p"><a href="mailto:desktopbuilder@gmail.com" class="mailto">desktopbuilder@gmail.com</a></p>
        </div>
    </div>


    <!-- FOOTER -->
    <?php
    require './generalPartPage/footerGeneral.php';
    ?>
    <!-- SCRIPT -->
    <script src="../JS/fonctionsSite.js"></script>
    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/9e3559e954.js" crossorigin="anonymous"></script>
</body>

</html>
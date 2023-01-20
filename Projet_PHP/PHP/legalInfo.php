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
    <h2>LEGAL NOTICES</h2>
    <div id="about-us-text">
        <div class="part">
            <p class="info-text-p">Director of publication : THOMAS DENEUX</p>
            <p class="info-text-p">Company name : DESCKTOP BUILDER</p>
            <p class="info-text-p">Address : Västra Långgatan 14 Kiruna SWEDEN</p>
            <p class="info-text-p">Phone number : +46 0980-3370267</p>
            <p class="info-text-p">E-mail : thomas.deneuxrahil@gmail.com</p>
            <p class="info-text-p">SIRET NUMBER : 111 111 111 11111</p>
        </div>
        <div class="part">
            <p class="info-text-p">Hosting :</p>
            <p class="info-text-p">Company name: OVH</p>
            <p class="info-text-p">SAS with a capital of 500 K</p>
            <p class="info-text-p">RCS Roubaix - Tourcoing 424 761 419 00011</p>
            <p class="info-text-p">Code APE 6202A</p>
            <p class="info-text-p">VAT NUMBER : FR 22 424 761 419</p>
            <p class="info-text-p">Head office : 2 rue Kellermann - 59100 Roubaix - France</p>
        </div>
        <div class="part">
            <p class="info-text-p">Website creation : THOMAS DENEUX</p>
        </div>
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
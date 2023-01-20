<?php
session_start();

?>

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
    <link rel="stylesheet" href="../CSS/index.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&family=Oleo+Script&family=Roboto:wght@100;400;500;900&display=swap" rel="stylesheet">
</head>

<body>
    <!-- NAV BAR -->
    <nav class="navbar show-nav">
        <a class="logo" href="index.php">Desktop Builder</a>
        <div class="div-nav-links">
            <ul class="nav-links">
                <li class="nav-link li-nav-link">
                    <a href="index.php" id="nav-first-a"><i class="fa-solid fa-house" id="home-icone"></i>
                        <p class="nav-p">Home</p>
                    </a>
                </li>
                <li class="nav-link li-nav-link">
                    <?php 
               if (!isset($_SESSION['username'])) {
                $option = "../PHP/signIn.php";
                $optionName = "Sign In";
            } else {
                $option = "?signout=true";
                $optionName = "Sign Out";
            }
            if (isset($_GET['signout'])) {
                session_destroy();
                header("Location: index.php");
                exit();
            }
                    ?>
                    <a href="<?php echo $option; ?>"><i class="fa-solid fa-arrow-right-to-bracket"  id="signIn-icone"></i>
                        <p class="nav-p"><?php echo $optionName ?></p>
                    </a>
                </li>
                <li class="nav-link li-nav-link">
                    <a href="../PHP/aboutUs.php"><i class="fa-solid fa-circle-exclamation" id="contact-icone"></i>
                        <p class="nav-p">About</p>
                    </a>
                </li>
                <li class="nav-link li-nav-link" id="last-nav-link">
                    <a href="../PHP/bag.php"><i class="fa-solid fa-cart-shopping" id="bag-icone"></i>
                        <p class="nav-p" id="nav-last-p">Your Cart <i class="fa-solid fa-cart-shopping" id="bag-icone-small-device"></i></p>
                    </a>
                </li>
            </ul>
        </div>
        <button class="burger">
            <span class="bar"></span>
        </button>
    </nav>
 



    <!-- PAGE -->
    <div class="container">
        <video class="container-img" autoplay loop muted plays-inline>
            <source src="../images/Presentation.webm" type = "video/webm">
        </video>
        </video>
        <h3 class="slogan-txt">
            Let yourself be carried away by
        </h3>
        <h3 class="slogan2-txt">
            the latest computer game
        </h3>
    </div>
    <div class="row">
        <div class="column">
            <a href="../PHP/gamerCat.php">
                <img src="../images/gaming.jpg" alt="gaming">
                <h3 class="first-txt">
                    Gamer
                </h3>
            </a>
        </div>
        <div class="column">
            <a href="../PHP/casualCat.php">
                <img src="../images/trad.jpg" alt="trad">
                <h3 class="second-txt">
                    Casual
                </h3>
            </a>
        </div>
        <div class="column">
            <a href="../PHP/appleCat.php">
                <img src="../images/mac.jpg" alt="mac">
                <h3 class="third-txt">
                    Apple
                </h3>
            </a>
        </div>
    </div>



    <div class="prefooter"></div>
    <footer>
        <p class="footer-p">
            Copyright © 2022 . All rights reserved. - <a href="../PHP/legalInfo.php">Legal information</a>
        </p>
    </footer>
    <!-- SCRIPT -->
    <script src="../JS/fonctionsSite.js"></script>
    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/9e3559e954.js" crossorigin="anonymous"></script>
</body>

</html>
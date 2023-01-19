<!-- NAV BAR -->
<nav class="navbar show-nav">
    <a class="logo" href="../index.php">Desktop Builder</a>
    <div class="div-nav-links">
        <ul class="nav-links">
            <li class="nav-link li-nav-link">

                <a href="../index.php" id="nav-first-a"><i class="fa-solid fa-house" id="home-icone"></i>
                    <p class="nav-p">Home</p>
                </a>
            </li>

            <li class="nav-link li-nav-link">
                <?php
                if (!isset($_SESSION['username'])) {
                    $option = "signIn.php";
                    $optionName = "Sign In";
                } else {
                    $option = "?signout=true";
                    $optionName = "Sign Out";
                }
                if (isset($_GET['signout'])) {
                    session_destroy();
                    header("Location: ../index.php");
                    exit();
                }
                ?>
                <a href="<?php echo $option; ?>"><i class="fa-solid fa-arrow-right-to-bracket" id="signIn-icone"></i>
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
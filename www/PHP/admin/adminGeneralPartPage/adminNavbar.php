<!-- NAV BAR -->
<nav class="navbar show-nav">
    <a class="logo" href="./indexAdmin.php">Desktop Builder<span id="logo-span">ADMIN PART</span></a>
    <div class="div-nav-links">
        <ul class="nav-links">
            <li class="nav-link li-nav-link">
                <a href="addItem.php" id="nav-first-a"><i class="fa-solid fa-plus" id="home-icone"></i>
                    <p class="nav-p">Add item</p>
                </a>
            </li>
            <li class="nav-link li-nav-link">
                <a href="adminListItem.php"><i class="fa-solid fa-list-ol" id="signIn-icone"></i>
                    <p class="nav-p">List item</p>
                </a>
            </li>
            <li class="nav-link li-nav-link">
                <a href="order.php"><i class="fa-solid fa-truck-fast" id="contact-icone"></i>
                    <p class="nav-p">Order</p>
                </a>
            </li>
            <li class="nav-link li-nav-link" id="last-nav-link">
                <?php

                if (isset($_SESSION['username'])) {
                    $option = "?signout=true";
                }
                if (isset($_GET['signout'])) {
                    session_destroy();
                    unset($_SESSION['username']);
                    header("Location: ../signIn.php");
                    exit();
                }
                ?>
                <a href="<?php echo $option; ?>"><i class="fa-solid fa-right-from-bracket" id="bag-icone"></i>
                    <p class="nav-p" id="nav-last-p">Logout <i class="fa-solid fa-right-from-bracket" id="bag-icone-small-device"></i></p>
                </a>
            </li>
        </ul>
    </div>
    <button class="burger">
        <span class="bar"></span>
    </button>
</nav>
<?php
ob_start();
require './../includeDB.php';
$DB = new DB();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- REQUIRE -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TITLE -->
    <title>Desktop Builder ADMIN</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/adminListItem.css">
    <link rel="stylesheet" href="../../CSS/navAdmin.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&family=Oleo+Script&family=Roboto:wght@100;400;500;900&display=swap" rel="stylesheet">
</head>

<body>
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
                    <a href="fournisseurAdding.php"><i class="fa-solid fa-truck-fast" id="contact-icone"></i>
                        <p class="nav-p">Add Fournisseur</p>
                    </a>
                </li>
                <li class="nav-link li-nav-link">
                    <a href="contactFournisseur.php"><i class="fa-solid fa-truck-fast" id="contact-icone"></i>
                        <p class="nav-p">Contact a Fournisseur</p>
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
                    <a href="contactFournisseur.php?signout=true>"><i class="fa-solid fa-right-from-bracket" id="bag-icone"></i>
                        <p class="nav-p" id="nav-last-p">Logout <i class="fa-solid fa-right-from-bracket" id="bag-icone-small-device"></i></p>
                    </a>
                </li>
            </ul>
        </div>
        <button class="burger">
            <span class="bar"></span>
        </button>
    </nav>

    <div class="container">
        <div class="list-title">Fournisseur LIST</div>
        <?php
        $products = $DB->query('SELECT * FROM fournisseur ORDER BY pays_fournisseur, id_fournisseur');
        foreach ($products as $product) : ?>
            <div class="div-complet-item">
                <div class="div-item">
                    <div class="div-img">
                        <img src="<?php echo $product->img; ?>" alt="item">
                    </div>
                    <div class="div-desc">
                        <div class="div-name-available">
                            <div class="name"><a class="a-name" href="../item.php?id_fournisseur=<?php echo $product->id_fournisseur ?>"><?php echo $product->nom_fournisseur; ?></a></div>
                            <div class="available"><?php echo $product->pays_fournisseur; ?></div>
                        </div>
                        <div class="div-edit-remove">
                            <div class="div-edit">
                                <form method="post">
                                    <input type="hidden" name="id_fournisseur" value="<?php echo $product->id_fournisseur; ?>">
                                    <input type="submit" name="button1" class="fa-regular fa-pen-to-square" value="Contact" />

                            </div>
                            <a class="a-trash-can" href="#">
                                <div class="div-remove"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bottom-line"></div>
            </div>
        <?php endforeach ?>

        <?php
        if (isset($_POST['button1'])) {
            echo "Message to renew stock has been sent";
            $id_fournisseur = htmlspecialchars(strip_tags($_POST['id_fournisseur']));

            $product = $DB->query("SELECT email_fournisseur FROM fournisseur WHERE id_fournisseur = '$id_fournisseur'");
            $email = $product[0]->email_fournisseur;
            $to = $email;
            $subject = "Stock renew";
            $message = "I contact you to renew my stock";
            $headers = "From: heidman06@desktopbuilder06.store" . "\r\n" .
                "heidman06@desktopbuilder06.store";
            mail($to, $subject, $message, $headers);
        }

        ?>

        <div class="add-item">
            <form method="post">
                <button type="submit" name="testo">ADD Fournisseur</button>
            </form>
        </div>
        <?php
        if (isset($_POST['testo'])) {
            header('Location: ./fournisseurAdding.php');
        }
        ?>

    </div>




    <?php
    require './../generalPartPage/footerGeneral.php';
    ?>
    <!-- SCRIPT -->
    <script src="../../JS/fonctionsSite.js"></script>

    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/9e3559e954.js" crossorigin="anonymous"></script>
</body>

</html>
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
    <!-- NAV ADMIN -->
    <?php
    require './adminGeneralPartPage/adminNavbar.php';
    ?>

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
                                <a class="a-trash-can" href="delItemProcess.php?id_fournisseur=<?php echo $product->id_fournisseur ?>">
                                    <div class="div-remove"><i class="fa-solid fa-trash-can"></i></div>
                                </a>
                        </div>
                    </div>
                </div>
                <div class="bottom-line"></div>
            </div>
        <?php endforeach ?>

        <?php
          if(isset($_POST['button1'])) {
            echo "Message to renew stock has been sent";
            $id_fournisseur = htmlspecialchars(strip_tags($_POST['id_fournisseur']));
        
            $product = $DB->query("SELECT email_fournisseur FROM fournisseur WHERE id_fournisseur = '$id_fournisseur'");
            $email = $product[0]->email_fournisseur;
            $to = $email;
            $subject = "Stock renew";
            $message = "I contact you to renew my stock";
            $headers = "From: heidman06@desktopbuilder06.store" . "\r\n" .
                "heidman06@desktopbuilder06.store";
                mail($to,$subject, $message, $headers);
        }

        ?>

        <div class="add-item">
            <form method="post">
                <button type="submit" name="testo">ADD Fournisseur</button>
            </form>
        </div>
        <?php
        if(isset($_POST['testo'])) {
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
<?php require './includeDB.php';
require './includeBag.php';
$DB = new DB();
$bag = new bag($DB);
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
    <link rel="stylesheet" href="../CSS/cat.css">
    <link rel="stylesheet" href="../CSS/smallNav.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&family=Oleo+Script&family=Roboto:wght@100;400;500;900&display=swap" rel="stylesheet">
</head>

<body>
    <!-- NAVBAR -->
    <?php
    require './generalPartPage/navbar.php';
    ?>

    <!-- SMALL NAVBAR FOR CATEGORY-->
    <?php
    require './generalPartPage/smallNavbar.php';
    ?>



    <!-- PAGE -->
    <div class="row">
        <?php $products = $DB->query('SELECT * FROM products WHERE cat_product = "pcApple"');
        foreach ($products as $product) : ?>
            <div class="col">
                <a href="../PHP/item.php?id_product=<?php echo $product->id_product ?>">
                    <div class="div-less-btn">
                        <div class="div-img">
                            <img src="<?php echo $product->img_product; ?>" alt="item">
                        </div>
                        <div class="div-desc">
                            <p><?php echo $product->name_product; ?></p>
                            <p id="test"> <?php $descrition = $product->desc_product;
                                            echo substr($descrition, 0, 120) . '...'; ?> </p>
                        </div>
                    </div>
                </a>
                <div class="div-btn">
                    <p class="price"><?php echo number_format($product->price_tax_product, 2, ',', ' '); ?> €</p>
                    <a href="addBag.php?id_product=<?php $product->id_product ?>"><button class="btn btn-buy" id="change-btnA1"><i class="fa-solid fa-cart-plus"></i></button></a>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <?php
    require './generalPartPage/footerGeneral.php';
    ?>
    <!-- SCRIPT -->
    <script src="../JS/fonctionsSite.js"></script>

    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/9e3559e954.js" crossorigin="anonymous"></script>
</body>

</html>

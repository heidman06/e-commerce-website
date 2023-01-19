<?php
session_start();
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
        <div class="list-title">ITEM LIST</div>
        <?php
        $products = $DB->query('SELECT * FROM products ORDER BY cat_product, id_product');
        foreach ($products as $product) : ?>
            <div class="div-complet-item">
                <div class="div-item">
                    <div class="div-img">
                        <img src="<?php echo $product->img_product; ?>" alt="item">
                    </div>
                    <div class="div-desc">
                        <div class="div-name-available">
                            <div class="name"><a class="a-name" href="../item.php?id_product=<?php echo $product->id_product ?>"><?php echo $product->name_product; ?></a></div>
                            <div class="available"> <?php echo $product->quantitie; ?></div>
                        </div>
                        <div class="div-edit-remove">
                            <div class="div-edit"><a href="editItem.php?id_product=<?php echo $product->id_product ?>"><i class="fa-regular fa-pen-to-square"></i></a></div>
                            <form action="./delItemProcess.php" method="post">
                                <input type="hidden" name="id_product" value="<?php echo $product->id_product; ?>">
                                <div class="div-remove">
                                    <button type="submit" name="del_item" value="yes"><i class="fa-solid fa-trash-can"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bottom-line"></div>
            </div>
        <?php endforeach ?>

        <div class="add-item">
            <form action="./addItem.php" method="post">
                <button type="submit" name="add_item">ADD ITEM</button>
            </form>
        </div>

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
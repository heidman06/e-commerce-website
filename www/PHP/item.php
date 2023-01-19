<?php require 'includeDB.php';
require 'includeBag.php';
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
    <link rel="stylesheet" href="../CSS/item.css">
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


    <!-- CONTENT -->
    <?php
    if (isset($_GET['id_product'])) {
        $temp = $_GET['id_product'];
        $products = $DB->query('SELECT * FROM products WHERE id_product = ' . $temp);
    }
    foreach ($products as $product) :
    ?>
        <div class="container">
            <div class="l-side">
                <div class="l-img img-zoom-container">
                    <img src="<?php echo $product->img_product; ?>" alt="item-exemple" id="myimage">
                    <div id="myresult" class="img-zoom-result"></div>
                </div>
                <div class="l-div-price">
                    <p><?php echo number_format($product->price_tax_product, 2, ',', ' '); ?> € </p><span>- Including TAX</span>
                </div>
                <div class="l-btn">
                    <a href="addBag.php?id_product=<?php echo $product->id_product ?>"><button class="btn btn-buy">Add in Your Cart</button></a>
                    <a href="../PHP/bag.php"><button class="btn btn-see-bag">See Your Cart</button></a>
                </div>
            </div>
            <div class="m-bar"></div>
            <div class="r-side">
                <div class="r-div-title">
                    <h2><?php echo $product->name_product; ?></h2>
                </div>
                <div>
                    <h3>Description</h3>
                    <p class="p-desc"><?php echo $product->desc_product; ?></p>
                </div>
                <div class="r-div-feature">
                    <h3>Feature</h3>
                    <table class="table-feature">
                        <tbody>
                            <tr>
                                <th scope="table-row">Processor</th>
                                <td><?php echo $product->processor_product; ?></td>
                            </tr>
                            <tr>
                                <th scope="table-row">Motherboard</th>
                                <td><?php echo $product->motherboard_product; ?></td>
                            </tr>
                            <tr>
                                <th scope="table-row">RAM</th>
                                <td><?php echo $product->ram_product; ?></td>
                            </tr>
                            <tr>
                                <th scope="table-row">Ventirad</th>
                                <td><?php echo $product->ventirad_product; ?></td>
                            </tr>
                            <tr>
                                <th scope="table-row">Graphic card</th>
                                <td><?php echo $product->gpu_product; ?></td>
                            </tr>
                            <tr>
                                <th scope="table-row">SSD</th>
                                <td><?php echo $product->ssd_product; ?></td>
                            </tr>
                            <tr>
                                <th scope="table-row">Case</th>
                                <td><?php echo $product->case_product; ?></td>
                            </tr>
                            <tr>
                                <th scope="table-row">Power supply</th>
                                <td><?php echo $product->power_product; ?></td>
                            </tr>
                            <tr>
                                <th scope="table-row">OS</th>
                                <td><?php echo $product->os_product; ?></td>
                            </tr>
                            <tr>
                                <th scope="table-row">Connectivity</th>
                                <td><?php echo $product->connetivity_product; ?></td>
                            </tr>
                            <tr>
                                <th scope="table-row">Dimensions</th>
                                <td><?php echo $product->dimention_product; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <?php
    require './generalPartPage/footerGeneral.php';
    ?>
    <!-- SCRIPT -->
    <script src="../JS/fonctionsSite.js"></script>
    <script src="../JS/zoomImg.js"></script>
    <script>
        imageZoom("myimage", "myresult");
    </script>

    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/9e3559e954.js" crossorigin="anonymous"></script>
</body>


</html>
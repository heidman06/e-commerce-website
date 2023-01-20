<?php
ob_start();
require './itemProcess.php';
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
    <link rel="stylesheet" href="../../CSS/addItem.css">
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

    <!-- CONTENT -->
    <div class="container">
        <div class="title-add-item">ADD AN ITEM</div>
        <form method="post">
            <div class="general part"><span class="span-title">General</span>
                <div class="div-cat-item form-group">
                    <label for="cat-item">Choose the item's category : </label>
                    <input type="text" id="cat-item" name="cat-item" class="form-control" required>
                </div>
                <div class="div-name-item form-group">
                    <label for="name-item">Choose the item's name : </label>
                    <input type="text" id="name-item" name="name-item" class="form-control" required>
                </div>
                <div class="div-price-item-noTAX form-group">
                    <div class="part1-price-item-noTAX">
                        <label for="purchase-price-item">Choose the item's purchase price : </label>
                    </div>
                    <div class="part2-price-item-noTAX">
                        <input type="text" id="purchase-price-item" name="purchase-price-item" class="form-control" required> €
                    </div>
                </div>
                <div class="div-price-item-noTAX form-group">
                    <div class="part1-price-item-noTAX">
                        <label for="price-item-noTAX">Choose the item's price (without TAX) : </label>
                    </div>
                    <div class="part2-price-item-noTAX">
                        <input type="text" id="price-item-noTAX" name="price-item-noTAX" class="form-control" required> €
                    </div>
                </div>
                <div class="div-desc-item form-group">
                    <label for="desc-item">Choose the item's decription : </label>
                    <textarea id="desc-item" name="desc-item" class="form-control" rows="10" cols="80" required></textarea>
                </div>
                <div class="div-img-item form-group">
                    <label for="img-item">Choose the item's picture : </label>
                    <input type="text" id="img-item" name="img-item">
                </div>
                <div class="div-quantity-item form-group">
                    <label for="quantity-item">Choose the item's quantity : </label>
                    <input type="number" id="quantity-item" name="quantity-item" class="form-control" min="0" max="10000" value="1" required>
                </div>
            </div>
            <div class="feature part"><span class="span-title">Feature</span>
                <div class="processor-item form-group">
                    <label for="processor-item">Choose the item's processor : </label>
                    <input type="text" id="processor-item" name="processor-item" class="form-control" required>
                </div>
                <div class="div-motherboard-item form-group">
                    <label for="motherboard-item">Choose the item's motherboard : </label>
                    <input type="text" id="motherboard-item" name="motherboard-item" class="form-control" required>
                </div>
                <div class="div-ram-item form-group">
                    <label for="ram-item">Choose the item's RAM : </label>
                    <input type="text" id="ram-item" name="ram-item" class="form-control" required>
                </div>
                <div class="div-ventirad-item form-group">
                    <label for="ventirad-item">Choose the item's ventirad : </label>
                    <input type="text" id="ventirad-item" name="ventirad-item" class="form-control" required>
                </div>
                <div class="div-gpu-item form-group">
                    <label for="gpu-item">Choose the item's graphic card : </label>
                    <input type="text" id="gpu-item" name="gpu-item" class="form-control" required>
                </div>
                <div class="div-ssd-item form-group">
                    <label for="ssd-item">Choose the item's SSD : </label>
                    <input type="text" id="ssd-item" name="ssd-item" class="form-control" required>
                </div>
                <div class="div-case-item form-group">
                    <label for="case-item">Choose the item's case : </label>
                    <input type="text" id="case-item" name="case-item" class="form-control" required>
                </div>
                <div class="div-power-item form-group">
                    <label for="power-item">Choose the item's power supply : </label>
                    <input type="text" id="power-item" name="power-item" class="form-control" required>
                </div>
                <div class="div-os-item form-group">
                    <label for="os-item">Choose the item's OS : </label>
                    <input type="text" id="os-item" name="os-item" class="form-control" required>
                </div>
                <div class="div-connectivity-item form-group">
                    <label for="connectivity-item">Choose the item's connectivity : </label>
                    <textarea id="connectivity-item" name="connectivity-item" class="form-control" rows="10" cols="80" required></textarea>
                </div>
                <div class="div-dimention-item form-group">
                    <label for="dimention-item">Choose the item's dimention : </label>
                    <input type="text" id="dimention-item" name="dimention-item" class="form-control" required>
                </div>
            </div>
            <div class="form-group add-item" id="last-form-group">
                <button type="submit" name="submit-form" class="btn btn-primary btn-block">SUBMIT</button>
            </div>
    </div>
    </form>
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

<?php

function createProductReference($name, $id)
{
    return $name . "-" . $id;
}

if (isset($_POST['submit-form'])) {
    if ((!empty($_POST['cat-item'])) && (!empty($_POST['name-item'])) && (!empty($_POST['desc-item'])) && (!empty($_POST['price-item-noTAX'])) && (!empty($_POST['img-item'])) && (!empty($_POST['processor-item'])) && (!empty($_POST['motherboard-item'])) && (!empty($_POST['ram-item'])) && (!empty($_POST['ventirad-item'])) && (!empty($_POST['gpu-item'])) && (!empty($_POST['ssd-item'])) && (!empty($_POST['case-item'])) && (!empty($_POST['power-item'])) && (!empty($_POST['os-item'])) && (!empty($_POST['connectivity-item'])) && (!empty($_POST['dimention-item']) && !empty($_POST['quantity-item']) && !empty($_POST['purchase-price-item']))) {

        $qr = rand(1, 1000);
        $cat_product = htmlspecialchars(strip_tags($_POST['cat-item']));
        $name_product = htmlspecialchars(strip_tags($_POST['name-item']));
        $reference = createProductReference($name_product, $qr);
        $desc_product = htmlspecialchars(strip_tags($_POST['desc-item']));
        $price_notax_product = htmlspecialchars(strip_tags($_POST['price-item-noTAX']));
        $price_tax_product = htmlspecialchars(strip_tags($_POST['price-item-noTAX'])) * 1.2;
        $purchase_price_product = htmlspecialchars(strip_tags($_POST['purchase-price-item']));
        $img_product = htmlspecialchars(strip_tags($_POST['img-item']));
        $processor_product = htmlspecialchars(strip_tags($_POST['processor-item']));
        $motherboard_product = htmlspecialchars(strip_tags($_POST['motherboard-item']));
        $ram_product = htmlspecialchars(strip_tags($_POST['ram-item']));
        $ventirad_product = htmlspecialchars(strip_tags($_POST['ventirad-item']));
        $gpu_product = htmlspecialchars(strip_tags($_POST['gpu-item']));
        $ssd_product = htmlspecialchars(strip_tags($_POST['ssd-item']));
        $case_product = htmlspecialchars(strip_tags($_POST['case-item']));
        $power_product = htmlspecialchars(strip_tags($_POST['power-item']));
        $os_product = htmlspecialchars(strip_tags($_POST['os-item']));
        $connetivity_product = htmlspecialchars(strip_tags($_POST['connectivity-item']));
        $dimention_product = htmlspecialchars(strip_tags($_POST['dimention-item']));
        $quantitie = htmlspecialchars(strip_tags($_POST['quantity-item']));
        $montant_achat = $purchase_price_product * $quantitie;
        $seuil_critique = 1;


  
        try {

            $conn = connectTODB();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->beginTransaction();
            echo $cat_product;
            $stmt = $conn->prepare("INSERT INTO products (reference,name_product,quantitie,cat_product,desc_product,price_notax_product,price_tax_product,purchase_price_product,img_product,seuil_critique,processor_product,motherboard_product,ram_product,ventirad_product,gpu_product,ssd_product,case_product,power_product,os_product,connetivity_product,dimention_product) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute(array($reference, $name_product, $quantitie, $cat_product, $desc_product, $price_notax_product, $price_tax_product, $purchase_price_product, $img_product, $seuil_critique, $processor_product, $motherboard_product, $ram_product, $ventirad_product, $gpu_product, $ssd_product, $case_product, $power_product, $os_product, $connetivity_product, $dimention_product));
            $last_product_id = $conn->lastInsertId();
            $stmt = $conn->prepare("INSERT INTO gestion_stock (id,reference,stock,montant_achats,seuil_critique,achats) VALUES (?,?,?,?,?,?)");
            $stmt->execute([$last_product_id,$last_product_id, $quantitie, $montant_achat, $seuil_critique ,200]);
            $conn->commit();
            echo "The request was created successfully";
        } catch (Exception $e) {
            $conn->rollback();
            $e->getMessage();
        }
        header('Location: adminListItem.php');
    }
    
    
}

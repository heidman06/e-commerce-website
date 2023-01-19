<?php
ob_start();
require './itemProcess.php';
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
    <link rel="stylesheet" href="../../CSS/editItem.css">
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
    <?php
    $id_current = $_GET['id_product'];
    $products = $DB->query("SELECT * FROM products WHERE id_product = $id_current");
    foreach ($products as $product): ?>
            <div class="container">
                <div class="title-edit-item">EDIT AN ITEM</div>
                <form method="post">
                    <div class="general part"><span class="span-title">General</span>
                        <div class="div-form-group">
                            <div class="new-cat-item form-group">
                                <label for="cat-item">Choose the new item's category : </label>
                                <input type="text" id="cat-item" name="cat-item" class="form-control" value="<?php echo $product->cat_product; ?>" required>
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="new-name-item form-group">
                                <label for="name-item">Choose the new item's name : </label>
                                <input type="text" id="name-item" name="name-item" class="form-control" value="<?php echo $product->name_product; ?>" required>
                            </div>
                        </div>
                        <div class=" div-form-group">
                            <div class="new-desc-item form-group">
                                <label for="desc-item">Choose the new item's decription : </label>
                                <textarea id="desc-item" name="desc-item" class="form-control" rows="10" cols="75" required><?php echo $product->desc_product; ?></textarea>
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="new-price-item-noTAX form-group">
                                <label for="price-item-noTAX">Choose the new item's price (without TAX) : </label>
                                <input type="text" id="price-item-noTAX" name="price-item-noTAX" class="form-control" value="<?php echo $product->price_notax_product; ?>" required> €
                                <div class="price-item-TAX">Price with TAX at 20% : <span><?php echo $product->price_tax_product; ?> €</span></div>
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="new-purchase-price-item form-group">
                                <label for="purchase-price-item">Choose the new item's purchase price : </label>
                                <input type="text" id="purchase-price-item" name="purchase-price-item" class="form-control" value="<?php echo $product->purchase_price_product; ?>" required> €
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="prev-img previous form-group"><span>Previous image : </span><img src="<?php echo $product->img_product; ?>" alt="prev-img"></div>
                            <div class="new-item new-img-item form-group">
                                <label for="img-item">Choose the new item's picture : </label>
                                <input type="text" class="form-control" id="img-item" name="img-item" value="<?php echo $product->img_product; ?>" require>
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="new-quantity-item form-group">
                                <label for="quantity-item">Choose the new item's quantity : </label>
                                <input type="number" id="quantity-item" name="quantity-item" class="form-control" required min="0" max="10000" value="<?php echo $product->quantitie; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="feature part"><span class="span-title">Feature</span>
                        <div class="div-form-group">
                            <div class="new-item new-processor-item form-group">
                                <label for="processor-item">Choose the new item's processor : </label>
                                <input type="text" id="processor-item" name="processor-item" class="form-control" value="<?php echo $product->processor_product; ?>" required>
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="new-item new-motherboard-item form-group">
                                <label for="motherboard-item">Choose the new item's motherboard : </label>
                                <input type="text" id="motherboard-item" name="motherboard-item" class="form-control" value="<?php echo $product->motherboard_product; ?>" required>
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="new-item new-ram-item form-group">
                                <label for="ram-item">Choose the new item's RAM : </label>
                                <input type="text" id="ram-item" name="ram-item" class="form-control" value="<?php echo $product->ram_product; ?>" required>
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="new-item new-ventirad-item form-group">
                                <label for="ventirad-item">Choose the new item's ventirad : </label>
                                <input type="text" id="ventirad-item" name="ventirad-item" class="form-control" value="<?php echo $product->ventirad_product; ?>" required>
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="new-item new-gpu-item form-group">
                                <label for="gpu-item">Choose the new item's graphic card : </label>
                                <input type="text" id="gpu-item" name="gpu-item" class="form-control" value="<?php echo $product->gpu_product; ?>" required>
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="new-item new-ssd-item form-group">
                                <label for="ssd-item">Choose the new item's SSD : </label>
                                <input type="text" id="ssd-item" name="ssd-item" class="form-control" value="<?php echo $product->ssd_product; ?>" required>
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="new-item new-case-item form-group">
                                <label for="case-item">Choose the new item's case : </label>
                                <input type="text" id="case-item" name="case-item" class="form-control" value="<?php echo $product->case_product; ?>" required>
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="new-item new-power-item form-group">
                                <label for="power-item">Choose the new item's power supply : </label>
                                <input type="text" id="power-item" name="power-item" class="form-control" value="<?php echo $product->power_product; ?>" required>
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="new-item new-os-item form-group">
                                <label for="os-item">Choose the new item's OS : </label>
                                <input type="text" id="os-item" name="os-item" class="form-control" value="<?php echo $product->os_product; ?>" required>
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="new-item new-connectivity-item form-group">
                                <label for="connectivity-item">Choose the new item's connectivity : </label>
                                <textarea id="connectivity-item" name="connectivity-item" class="form-control" rows="10" cols="75" required><?php echo $product->connetivity_product; ?></textarea>
                            </div>
                        </div>
                        <div class="div-form-group">
                            <div class="new-item new-dimention-item form-group">
                                <label for="dimention-item">Choose the new item's dimention : </label>
                                <input type="text" id="dimention-item" name="dimention-item" class="form-control" value="<?php echo $product->dimention_product; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group edit-item" id="last-form-group">
                        <button type="submit" name="submit-form" class="btn btn-primary btn-block">SUBMIT</button>
                    </div>
            </div>
            </form>
            </div>

    <?php endforeach ?>

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
    $DB = connectTODB();
    if ((!empty($_POST['cat-item'])) && (!empty($_POST['name-item'])) && (!empty($_POST['desc-item'])) && (!empty($_POST['price-item-noTAX'])) && (!empty($_POST['img-item'])) && (!empty($_POST['processor-item'])) && (!empty($_POST['motherboard-item'])) && (!empty($_POST['ram-item'])) && (!empty($_POST['ventirad-item'])) && (!empty($_POST['gpu-item'])) && (!empty($_POST['ssd-item'])) && (!empty($_POST['case-item'])) && (!empty($_POST['power-item'])) && (!empty($_POST['os-item'])) && (!empty($_POST['connectivity-item'])) && (!empty($_POST['dimention-item']) && (!empty($_POST['quantity-item'])) && !empty($_POST['purchase-price-item']))) {

        $qr = rand(1, 1000);
        $id_product = $_GET['id_product'];
        $cat_product = htmlspecialchars(strip_tags($_POST['cat-item']));
        $name_product = htmlspecialchars(strip_tags($_POST['name-item']));
        $reference = createProductReference($name_product, $qr);
        $desc_product = htmlspecialchars(strip_tags($_POST['desc-item']));
        $price_notax_product = htmlspecialchars(strip_tags($_POST['price-item-noTAX']));
        $price_tax_product = htmlspecialchars(strip_tags($_POST['price-item-noTAX'])) * 1.2;
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
        $stock = htmlspecialchars(strip_tags($_POST['quantity-item']));
        $quantitie = htmlspecialchars(strip_tags($_POST['quantity-item']));
        $purchase_price_product = htmlspecialchars(strip_tags($_POST['purchase-price-item']));
        $montant_achat = $purchase_price_product * $quantitie;
        $seuil_critique = 1;

        try {
            $conn = connectTODB();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->beginTransaction();
            $stmt = $conn->prepare("UPDATE products SET reference=?,name_product=?,quantitie=?,cat_product=?,desc_product=?,price_notax_product=?,price_tax_product=?,purchase_price_product=?,img_product=?,seuil_critique=?,processor_product=?,motherboard_product=?,ram_product=?,ventirad_product=?,gpu_product=?,ssd_product=?,case_product=?,power_product=?,os_product=?,connetivity_product=?,dimention_product=? WHERE id_product=?");
            $stmt->execute(array($reference, $name_product, $quantitie, $cat_product, $desc_product, $price_notax_product, $price_tax_product, 
            $purchase_price_product, $img_product, $seuil_critique, $processor_product, $motherboard_product, $ram_product, $ventirad_product,
            $gpu_product, $ssd_product, $case_product, $power_product, $os_product, $connetivity_product, $dimention_product, $id_product));
            $stmt = $conn->prepare("UPDATE gestion_stock SET stock=?,montant_achats=?,seuil_critique=? WHERE id=?");
            $stmt->execute([$stock, $montant_achat, $seuil_critique, $id_product]);
            $conn->commit();
            echo "The request was updated successfully";
        } catch (Exception $e) { 
            $conn->rollback();
            $e->getMessage();
        }
        header('Location: adminListItem.php');
    }
}
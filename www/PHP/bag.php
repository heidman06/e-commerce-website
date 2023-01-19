<?php

session_start();
require 'includeDB.php';
require 'includeBag.php';

$DB = new DB();
$bag = new bag($DB);
if (isset($_GET['del'])) {
    $bag->del($_GET['del']);
}
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
    <link rel="stylesheet" href="../CSS/bag.css">
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



    <!-- CONTENT -->
    <form method="post" action="bag.php">
        <div class="container">
            <div class="l-side">
                <div class="your-bag">YOUR CART</div>
                <?php $id_products = array_keys($_SESSION['bag']);
                if (empty($id_products)) {
                    $products = array();
                    echo '<p id="p_empty">The cart is empty</p>';
                } else {
                    $products = $DB->query('SELECT * FROM products WHERE id_product IN (' . implode(', ', $id_products) . ')');
                }
                foreach ($products as $product) :
                ?>
                    <div class="div-item">
                        <div class="div-img">
                            <img src="<?php echo $product->img_product; ?>" alt="item-exemple">
                        </div>
                        <div class="div-desc">
                            <div class="div-name-available">
                                <div class="name"><a class="a-name" href="./item.php?id_product=<?php echo $product->id_product ?>"><?php echo $product->name_product; ?></a></div>
                                <div class="available"><?php echo "there remains " . $product->quantitie . " item(s)"; ?></div>
                            </div>
                            <div class="div-quantity">
                                <input type="number" name="bag[quantity][<?php echo $product->id_product; ?>]" class="table-div-quantity" min="1" max="10" value="<?php echo $_SESSION['bag'][$product->id_product]; ?>">
                                <div class="price"><?php echo number_format($product->price_tax_product, 2, ',', ' '); ?> €</div>
                            </div>
                        </div>
                        <a href="bag.php?del=<?php echo $product->id_product; ?>">
                            <div class="div-action"><i class="fa-solid fa-trash-can"></i></div>
                        </a>
                    </div>
                <?php endforeach; ?>
                <input class="sumbit-form" type="submit" value="Reload quantity">
            </div>
            <div class="r-side">
                <div class="r-overview">
                    <div class="r-top">
                        <div class="r-title">
                            <h2>OVERVIEW</h2>
                        </div>
                    </div>
                    <div class="r-bottom">
                        <div class="r-nb-item">
                            <span class="nb-item"><?php echo $bag->countItem() ?></span> item(s) in Your Cart
                        </div>
                        <div class="r-price-noTAX">
                            <div class="text-price-noTAX">Price without TAX</div>
                            <div class="price-price-noTAX"><?php echo number_format($bag->total() * 0.80, 2, ',', ' ') ?> €</div>
                        </div>
                        <div class="r-price-TAX">
                            <div class="text-price-TAX">Price
                                including TAX (+20%)</div>
                            <div class="price-price-TAX"><?php echo number_format($bag->total(), 2, ',', ' ') ?> €</div>
                        </div>
                        <div class="r-delivery">
                            <div class="text-delivery">Delivery</div>
                            <div class="price-delivery">OFFERT</div>
                        </div>
                        <div class="r-discount">
                            <div class="text-discount">Discount</div>
                            <div class="price-discount">-0,00 €</div>
                        </div>
                    </div>
                    <div class="r-middle"></div>
                    <div class="r-bottom">
                        <div class="r-TT">
                            <div class="text-TT">TOTAL</div>
                            <div class="price-TT"><?php echo number_format($bag->total(), 2, ',', ' ') ?> €</div>
                        </div>
                        <div class="r-btn-buy">
                            <input type="submit" name="buttonValidate" class="btn btn-buy" value="Validate Your Cart" />
                        </div>
                    </div>
                    <?php

                    if (isset($_POST['buttonValidate']) && !empty($id_products) && isset($_SESSION["username"])) {

                        $errorOrder = FALSE;

                        foreach ($products as $product) {
                            $checkstock = $DB->query("SELECT stock FROM gestion_stock WHERE id = $product->id_product");
                            if ($checkstock < 1) {
                                $errorOrder = TRUE;
                            }
                        }

                        $produits = array();
                        if ($errorOrder === FALSE) {
                            foreach ($products as $product) {
                                $productInfo = $DB->query("SELECT * FROM products WHERE id_product = $product->id_product");
                                if ($product) {
                                    $date = date('Y-m-d H:i:s');
                                    $number = $_SESSION['bag'][$product->id_product];
                                    $priceProductObject = $DB->query("SELECT price_tax_product FROM products WHERE id_product = $product->id_product");
                                    $priceProduct = $priceProductObject[0]->price_tax_product;
                                  
                                    $referenceProduitObject = $DB->query("SELECT reference FROM products WHERE id_product = $product->id_product");
                                    $referenceProduit = $referenceProduitObject[0]->reference;
                                  
                                    $DB->query("UPDATE gestion_stock SET stock = stock - $number WHERE id = $product->id_product");
                                    $DB->query("UPDATE products SET quantitie = quantitie - $number WHERE id_product = $product->id_product");
                                    $DB->query("UPDATE gestion_stock SET date_vente ='" . $date . "' WHERE id = $product->id_product");
                                    $verifNullVentes = $DB->query("SELECT ventes FROM gestion_stock WHERE id = $product->id_product");
                                    if ($verifNullVentes == 0) {
                                        $DB->query("INSERT INTO gestion_stock (ventes) VALUES ($number)");
                                    } else {
                                        $DB->query("UPDATE gestion_stock SET ventes = ventes + $number WHERE id = $product->id_product");
                                    }
                                    $produits = array("reference" => $referenceProduit, "quantite" => $number, "prix" => $priceProduct);
                                    
                                }
                            }
                            $email =  $_SESSION["username"];
                            $date_creation = date('Y-m-d H:i:s');
                            $prenomObjet = $DB->query("SELECT firstName FROM registerclient WHERE email = '$email'");
                            $prenom = $prenomObjet[0]->firstName;
                            $nomObjet = $DB->query("SELECT surName FROM registerclient WHERE email = '$email'");
                            $nom = $nomObjet[0]->surName;
                            $produits = json_encode($produits);
                            $DB->query("INSERT INTO facturation (date_creation, nom, prenom, email, produits) VALUES ('$date_creation', '$nom', '$prenom', '$email', '$produits')");
                          
                            echo "Your order has been created!<br>";
                            $to = $_SESSION["username"];
                            $subject = "Thanks for your order in Desktop Builder !";
                            $message = "Your order has been created! Thank you for your purchase there is the order details : " .
                                "Name : " . $nom . " " . $prenom . "\r\n" .
                                "Email : " . $to . "\r\n" .
                                "Date : " . $date_creation . "\r\n" .
                                "Products : " . $produits . "\r\n" .
                                "Total : " . number_format($bag->total(), 2, ',', ' ') . " EUR";
                            $headers = "From: no-reply@desktopbuilder06.store" . "\r\n" .
                                "Reply-to: no-reply@desktopbuilder06.store";
                            mail($to, $subject, $message, $headers);
                            echo "An email has been sent to you.";


                            if (mail($to, $subject, $message, $headers)) {
                                $date = date('d-m-y h:i:s');
                                $to2 = "heidman06@desktopbuilder06.store";
                                $subject2 = "New order in Desktop Builder " . $date . " !";
                                $message2 = "User : " . $_SESSION['username'] . " has ordered " . $bag->countItem() . " item(s) for a total of " . number_format($bag->total(), 2, ',', ' ') . " EUR";
                                $headers2 = "From: no-reply@desktopbuilder06.store" . "\r\n" .
                                    "Reply-to: no-reply@desktopbuilder06.store";
                                mail($to2, $subject2, $message2, $headers2);
                            }
                            //verifier dans la table facturation
                            foreach ($products as $product) {
                                $priceAchatObject = $DB->query("SELECT montant_achats FROM gestion_stock WHERE id = $product->id_product");
                                $priceAchat = $priceAchatObject[0]->montant_achats;
                                $DB->query("UPDATE gestion_stock SET chiffre_affaire = ventes * $priceProduct WHERE id = $product->id_product");
                                $DB->query("UPDATE gestion_stock SET benefice_deficit = chiffre_affaire - $priceAchat WHERE id = $product->id_product");
                            }

                        } else {
                            echo "Sorry there is no stock left of one of the items... Try later.";
                        }
                        if (!$product) {
                            echo "product not found";
                        }
                    } else if (isset($_POST['buttonValidate']) && empty($id_products) && isset($_SESSION["username"])) {
                        echo "Please first add a new order";
                    } else if (isset($_POST['buttonValidate']) && !empty($id_products) && !isset($_SESSION["username"])) {
                        echo "Please first create an account or sign in";
                    } else if (isset($_POST['buttonValidate']) && empty($id_products) && !isset($_SESSION["username"])) {
                        echo "Please first create an account or sign in";
                    }
                    ?>
                </div>
            </div>
        </div>
    </form>

    <?php
    require './generalPartPage/footerGeneral.php';
    ?>
    <!-- SCRIPT -->
    <script src="../JS/fonctionsSite.js"></script>
    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/9e3559e954.js" crossorigin="anonymous"></script>
</body>



</html>
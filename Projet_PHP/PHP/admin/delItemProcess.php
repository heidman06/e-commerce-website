<?php
ob_start();
require('../../includeConnect.php');
$conn = connectTODB();

if (isset($_GET['id_product'])) {
    $id_current = $_GET['id_product'];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();
    $product = $conn->prepare("SELECT id_product FROM products WHERE id_product = $id_current");
    $product->execute();
    $conn->commit();

    if (empty($product)) {
        echo "this item doesn't exist";
    } else {
        connectTODB()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        connectTODB()->beginTransaction();
        $take = connectTODB()->prepare("DELETE FROM gestion_stock WHERE id = $id_current");
        $take2 = connectTODB()->prepare("DELETE FROM products WHERE id_product = $id_current");

        $take->execute();
        $take2->execute();

        echo "the item has been deleted";

        header('Location: adminListItem.php');
    }
} else {
    die('you have not selected a product');
}

$conn = null;

<?php

session_start();
require './../../includeConnect.php';

if (isset($_GET['id_product'])) {
    $id_current = $_GET['id_product'];
    $product = connectTODB()->prepare("SELECT id_product FROM products WHERE id_product = $id_current");
    if (empty($product)) {
        die("this item doesn't exist");
    } else {
        $take = connectTODB()->prepare("DELETE FROM products WHERE id_product = $id_current");

        $take->execute();

        $take->closeCursor();

        die(header("location:" .  $_SERVER['HTTP_REFERER']));
    }
} else {
    die('you have not selected a product');
}

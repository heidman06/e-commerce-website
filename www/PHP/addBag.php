<?php

require './includeDB.php';
require './includeBag.php';
$DB = new DB();
$bag = new bag($DB);
if (isset($_GET['id_product'])) {
    $product = $DB->query('SELECT id_product FROM products WHERE id_product=:id_product', array('id_product' => $_GET['id_product']));
    if (empty($product)) {
        die("this item doesn't exist");
    }
    if (isset($_SESSION['bag'][$product[0]->id_product])) {
        $_SESSION['bag'][$product[0]->id_product]++;
    } else {
        $_SESSION['bag'][$product[0]->id_product] = 1;
    }
    die(header("location:" .  $_SERVER['HTTP_REFERER']));
} else {
    die('you have not selected a product');
}

<?php
session_start();
require('../../includeConnect.php');

function addItem($reference, $cat_product, $name_product, $desc_product, $price_notax_product, $price_tax_product, $img_product, $quantitie, $seuil_critique, $processor_product, $motherboard_product, $ram_product, $ventirad_product, $gpu_product, $ssd_product, $case_product, $power_product, $os_product, $connetivity_product, $dimention_product)
{
    $conn = connectTODB();
    try {
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // begin the transaction
        $conn->beginTransaction();
        // insert into products table
        $stmt = $conn->prepare("INSERT INTO products (reference, cat_product, name_product, desc_product, price_notax_product, price_tax_product, img_product, quantitie, seuil_critique, processor_product, motherboard_product, ram_product, ventirad_product, gpu_product, ssd_product, case_product, power_product, os_product, connetivity_product, dimention_product) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($reference, $cat_product, $name_product, $desc_product, $price_notax_product, $price_tax_product, $img_product, $quantitie, $seuil_critique, $processor_product, $motherboard_product, $ram_product, $ventirad_product, $gpu_product, $ssd_product, $case_product, $power_product, $os_product, $connetivity_product, $dimention_product));
        $last_product_id = $conn->lastInsertId();
        // insert into gestion_stock table
        $stmt = $conn->prepare("INSERT INTO gestion_stock (product_id, stock_quantity, stock_alert) VALUES (?,?,?)");
        $stmt->execute([$last_product_id, $quantitie, $seuil_critique]);
        // commit the transaction
        $conn->commit();
        echo "New items created successfully";
    } catch (PDOException $e) {
        // roll back the transaction if something failed
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
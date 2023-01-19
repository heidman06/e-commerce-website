<?php
session_start();
function addItem($cat_product, $name_product, $desc_product, $price_notax_product, $price_tax_product, $img_product, $processor_product, $motherboard_product, $ram_product, $ventirad_product, $gpu_product, $ssd_product, $case_product, $power_product, $os_product, $connetivity_product, $dimention_product)
{
    if (require('includeConnect.php')) {
        $take = $db->prepare("INSERT INTO products (cat_product, name_product, desc_product, price_notax_product, price_tax_product, img_product, processor_product, motherboard_product, ram_product, ventirad_product, gpu_product, ssd_product, case_product, power_product, os_product, connetivity_product, dimention_product) VALUES ($cat_product, $name_product, $desc_product, $price_notax_product, $price_tax_product, $img_product, $processor_product, $motherboard_product, $ram_product, $ventirad_product, $gpu_product, $ssd_product, $case_product, $power_product, $os_product, $connetivity_product, $dimention_product)");

        $take->execute(array($cat_product, $name_product, $desc_product, $price_notax_product, $price_tax_product, $img_product, $processor_product, $motherboard_product, $ram_product, $ventirad_product, $gpu_product, $ssd_product, $case_product, $power_product, $os_product, $connetivity_product, $dimention_product));

        $take->closeCursor();
    }
}

function printItem()
{
    if (require('includeConnect.php')) {
        $take = $db->prepare("SELECT * FROM products ORDER BY id_product");

        $take->execute();

        $data = $take->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $take->closeCursor();
    }
}

function delItem($id_product)
{
    if (require('includeConnect.php')) {
        $take = $db->prepare('DELETE * FROM products WHERE id_product = ?');

        $take->execute(array($id_product));

        $take->closeCursor();
    }
}

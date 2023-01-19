<?php
class bag
{
    private $DB;

    public function __construct($DB)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['bag']) && isset($_COOKIE['bag'])) {
            $_SESSION['bag'] = json_decode($_COOKIE['bag'], true);
            setcookie('bag', json_encode($_SESSION['bag']), time() + 60 * 60 * 24 * 30);
        }
        $this->DB = $DB;
        if (isset($_POST['bag']['quantity'])) {
            $this->recalc();
        }
    }

    public function recalc()
    {
        $_SESSION['bag'] = $_POST['bag']['quantity'];
        setcookie('bag', json_encode($_SESSION['bag']), time() + 60 * 60 * 24 * 30);
    }

    public function del($product_id)
    {
        unset($_SESSION['bag'][$product_id]);
    }

    public function total()
    {
        $total = 0;
        $id_products = array_keys($_SESSION['bag']);
        if (empty($id_products)) {
            $products = array();
        } else {
            $products = $this->DB->query('SELECT id_product, price_tax_product FROM products WHERE id_product IN (' . implode(', ', $id_products) . ')');
        }
        foreach ($products as $product) {
            $total += $product->price_tax_product * $_SESSION['bag'][$product->id_product];
        }
        return $total;
    }

    public function countItem()
    {
        return array_sum($_SESSION['bag']);
    }
}

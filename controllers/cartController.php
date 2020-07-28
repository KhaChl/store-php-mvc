<?php

require_once 'models/product.php';

class CartController
{

    public function index()
    {
        if (isset($_SESSION['cart'])) {
            $products = $_SESSION['cart'];
        }
        require_once 'views/cart/index.php';
    }
    public function addItemCart()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        if ($id) {
            if (isset($_SESSION['cart'])) {
                $exist = false;
                foreach ($_SESSION['cart'] as $index => $value) {
                    if ($value['idProduct'] == $id) {
                        $_SESSION['cart'][$index]['units']++;
                        $exist = true;
                    }
                }
            }
            if (!isset($exist) || !$exist) {
                $product = new Product();
                $product->setId($id);
                $prod = $product->getProduct();
                $_SESSION['cart'][] = array(
                    "idProduct" => $prod->id,
                    "price" => $prod->price,
                    "units" => 1,
                    "product" => $prod
                );
            }
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            header("Location:" . baseUrl . "cart/index");
        }
    }

    public function minusItemCart()
    {
        $index = isset($_GET['index']) ? $_GET['index'] : false;
        if (isset($index) && isset($_SESSION['cart']) && $_SESSION['cart'][$index]['units'] > 1) {
            $_SESSION['cart'][$index]['units']--;
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            header("Location:" . baseUrl . "cart/index");
        }
    }

    public function removeItemCart()
    {
        $index = isset($_GET['index']) ? $_GET['index'] : false;
        if (isset($index)) {
            unset($_SESSION['cart'][$index]);
            if (empty($_SESSION['cart'])) {
                $this->deleteCart();
            }
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            header("Location:" . baseUrl . "cart/index");
        }
    }

    public function deleteCart()
    {
        unset($_SESSION['cart']);
        header("Location:" . baseUrl . "cart/index");
    }
}

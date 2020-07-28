<?php

class Utils
{

    public static function deleteSession($name)
    {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }

    public static function isAdmin()
    {
        if (!isset($_SESSION['admin']) && $_SESSION['admin'] != true) {
            header('Location:' . baseUrl);
        }
    }

    public static function isUser()
    {
        if (!isset($_SESSION['identity'])) {
            header('Location:' . baseUrl . 'user/signIn');
        }
    }

    public static function showCategories()
    {
        require_once 'models/category.php';
        $category = new Category();
        $categories = $category->getCategories();
        return $categories;
    }

    public static function statsCart()
    {
        $stats = array(
            "count" => 0,
            "total" => 0
        );
        if (isset($_SESSION['cart'])) {
            $stats['count'] = count($_SESSION['cart']);
            foreach ($_SESSION['cart'] as $index => $product) {
                $stats['total'] += $product['price'] * $product['units'];
            }
        }
        return $stats;
    }

    public static function showStatus($status)
    {
        $value = "Pendiente";
        if ($status == "pending") {
            $value = "Pendiente";
        } elseif ($status == "ready") {
            $value = "Listo para envio";
        } elseif ($status == "send") {
            $value = "Enviado";
        }
        return $value;
    }
}

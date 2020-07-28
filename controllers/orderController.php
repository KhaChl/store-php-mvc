<?php

require_once 'models/order.php';

class orderController
{

    public function index()
    {
        Utils::isUser();
        require_once 'views/order/index.php';
    }

    public function purchase()
    {
        Utils::isUser();
        $region = isset($_POST['region']) ? $_POST['region'] : false;
        $city = isset($_POST['city']) ? $_POST['city'] : false;
        $address = isset($_POST['address']) ? $_POST['address'] : false;
        $stats = Utils::statsCart();
        $totalPurchase = $stats['total'];
        if ($region && $city && $address) {
            $order =  new Order();
            $order->setUserId($_SESSION['identity']->id);
            $order->setRegion($region);
            $order->setCity($city);
            $order->setAddress($address);
            $order->setTotalPurchase($totalPurchase);
            $saveOrder = $order->addOrder();
            if ($saveOrder) {
                Utils::deleteSession('cart');
                header("Location:" . baseUrl . "");
            }
            header("Location:" . baseUrl . "order/mylistorders");
        } else {
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }

    public function myListOrders()
    {
        Utils::isUser();
        $order =  new Order();
        $order->setUserId($_SESSION['identity']->id);
        $orders = $order->getOrdersUser();
        require_once 'views/order/mylistorders.php';
    }

    public function orderDetail()
    {
        Utils::isUser();
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        if ($id) {
            $order =  new Order();
            $order->setId($id);
            $orderStatus = $order->getStatusOrder();
            $productOrder = $order->getProductOrderUser();
            require_once 'views/order/orderdetail.php';
        } else {
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }

    public function orderManagement()
    {
        Utils::isAdmin();
        $order =  new Order();
        $orders = $order->getOrders();
        require_once 'views/order/mylistorders.php';
    }

    public function changeStateOrder()
    {
        Utils::isAdmin();
        $id = isset($_POST['idpedido']) ? $_POST['idpedido'] : false;
        $state = isset($_POST['state']) ? $_POST['state'] : false;
        if ($id && $state) {
            $order =  new Order();
            $order->setId($id);
            $order->setState($state);
            $productOrder = $order->editStateOrder();
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            header("Location:" . baseUrl . "order/mylistorders");
        }
    }
}

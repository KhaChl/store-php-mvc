<?php

require_once 'models/product.php';

class Order
{
    private $id;
    private $userId;
    private $region;
    private $city;
    private $address;
    private $totalPurchase;
    private $state;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);
    }

    function setUserId($userId)
    {
        $this->userId = $this->db->real_escape_string($userId);
    }

    function setRegion($region)
    {
        $this->region = $this->db->real_escape_string($region);
    }

    function setCity($city)
    {
        $this->city = $this->db->real_escape_string($city);
    }

    function setAddress($address)
    {
        $this->address = $this->db->real_escape_string($address);
    }

    function setTotalPurchase($totalPurchase)
    {
        $this->totalPurchase = $this->db->real_escape_string($totalPurchase);
    }

    function setState($state)
    {
        $this->state = $this->db->real_escape_string($state);
    }

    public function getStatusOrder()
    {
        $sql = "SELECT state FROM `order` WHERE id = $this->id";
        $order = $this->db->query($sql);
        return $order->fetch_object();
    }

    public function getOrders()
    {
        $sql = "SELECT * FROM `order`";
        $order = $this->db->query($sql);
        return $order;
    }

    public function getOrdersUser()
    {
        $sql = "SELECT * FROM `order` WHERE user_Id = $this->userId ORDER BY date_Purchase ASC";
        $order = $this->db->query($sql);
        return $order;
    }

    public function getProductOrderUser()
    {
        $sql = "SELECT p.*, ol.units FROM product p INNER JOIN orderlist ol ON p.id = ol.product_Id WHERE ol.order_Id = $this->id";
        $order = $this->db->query($sql);
        return $order;
    }

    public function addOrder()
    {
        $result = false;
        $sql = "INSERT INTO `order` VALUES(NULL, $this->userId, '$this->region',"
            . " '$this->city', '$this->address', $this->totalPurchase, 'pendiente', CURDATE(), CURTIME())";
        $addOrder = $this->db->query($sql);
        $idOrder = $this->db->insert_id;
        foreach ($_SESSION['cart'] as $product) {
            $idProduct = $product['idProduct'];
            $units = $product['units'];
            $sqlOrderList = "INSERT INTO `orderlist` VALUES(NULL, $idOrder, $idProduct, $units)";
            $addOrderList = $this->db->query($sqlOrderList);
            $product = new Product();
            $product->setId($idProduct);
            $minusStock = $product->minusStock($units);
        }
        if ($addOrder && $addOrderList && $minusStock) {
            $result = true;
        }
        return $result;
    }

    public function editStateOrder()
    {
        $result = false;
        $sql = "UPDATE `order` SET state = '$this->state' WHERE id = $this->id";
        $edit = $this->db->query($sql);
        if ($edit) {
            $result = true;
        }
        return $result;
    }
}

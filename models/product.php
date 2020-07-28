<?php

class Product
{
    private $id;
    private $categoryId;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $image;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }


    public function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $this->db->real_escape_string($categoryId);
    }

    public function setName($name)
    {
        $this->name = $this->db->real_escape_string($name);
    }

    public function setDescription($description)
    {
        $this->description = $this->db->real_escape_string($description);
    }

    public function setPrice($price)
    {
        $this->price = $this->db->real_escape_string($price);
    }

    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }

    public function setImage($image)
    {
        $this->image = $this->db->real_escape_string($image);
    }

    public function getProductsFavorite()
    {
        $sql = "SELECT * FROM product ORDER BY favorite DESC LIMIT 10";
        $products = $this->db->query($sql);
        return $products;
    }

    public function getProducts()
    {
        $sql = "SELECT * FROM product";
        $product = $this->db->query($sql);
        return $product;
    }

    public function getProduct()
    {
        $sql = "SELECT * FROM product WHERE id = $this->id";
        $product = $this->db->query($sql);
        return $product->fetch_object();
    }

    public function getProductsCategory()
    {
        $sql = "SELECT * FROM product WHERE category_Id = $this->categoryId";
        $product = $this->db->query($sql);
        return $product;
    }

    public function addProduct()
    {
        $result = false;
        $sql = "INSERT INTO product VALUES(NULL, $this->categoryId, '$this->name', '$this->description'," .
            " $this->price, $this->stock, 0, '$this->image')";
        $edit = $this->db->query($sql);
        if ($edit) {
            $result = true;
        }
        return $result;
    }

    public function editProduct()
    {
        $result = false;
        $sql = "UPDATE product SET category_Id = $this->categoryId," .
            "name = '$this->name', description = '$this->description', price = $this->price, " .
            "stock = $this->stock";
        if ($this->image != null) {
            $sql .= ", image = '$this->image'";
        }
        $sql .= " WHERE id = $this->id";
        $edit = $this->db->query($sql);
        if ($edit) {
            $result = true;
        }
        return $result;
    }

    public function deleteProduct()
    {
        $result = false;
        $sql = "DELETE FROM product WHERE id = $this->id";
        $delete = $this->db->query($sql);
        if ($delete) {
            $result = true;
        }
        return $result;
    }

    public function favoriteProduct()
    {
        $result = false;
        $sql = "UPDATE product SET favorite = favorite + 1 WHERE id = $this->id";
        $edit = $this->db->query($sql);
        if ($edit) {
            $result = true;
        }
        return $result;
    }

    public function minusStock($units)
    {
        $result = false;
        $sql = "UPDATE product SET stock = stock - $units WHERE id = $this->id";
        $edit = $this->db->query($sql);
        if ($edit) {
            $result = true;
        }
        return $result;
    }
}

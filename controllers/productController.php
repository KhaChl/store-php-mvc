<?php

require_once 'models/product.php';

class productController
{

    public function index()
    {
        $product = new Product();
        $products = $product->getProductsFavorite();
        require_once 'views/product/products.php';
    }

    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        if ($id) {
            $product = new Product();
            $product->setId($id);
            $product = $product->getProduct();
            require_once 'views/product/detail.php';
        } else {
            header("Location:" . baseUrl . "product/index");
        }
    }

    public function productCategory()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        if ($id) {
            $product = new Product();
            $product->setCategoryId($id);
            $products = $product->getProductsCategory();
            require_once 'views/product/products.php';
        } else {
            header("Location:" . baseUrl . "product/index");
        }
    }

    public function management()
    {
        Utils::isAdmin();
        $product = new Product();
        $products = $product->getProducts();
        require_once 'views/product/management.php';
    }

    public function createProduct()
    {
        Utils::isAdmin();
        require_once 'views/product/formproduct.php';
    }

    public function editProduct()
    {
        Utils::isAdmin();
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        if ($id) {
            $product = new Product();
            $product->setId($id);
            $product = $product->getProduct();
            require_once 'views/product/formproduct.php';
        } else {
            header("Location:" . baseUrl . "product/management");
        }
    }

    public function createOrUpdate()
    {
        Utils::isAdmin();
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        $categoryId = isset($_POST['category']) ? $_POST['category'] : false;
        $name = isset($_POST['name']) ? $_POST['name'] : false;
        $description = isset($_POST['description']) ? $_POST['description'] : false;
        $price = isset($_POST['price']) ? $_POST['price'] : false;
        $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
        $image = isset($_FILES['image']) ? $_FILES['image'] : false;
        if ($categoryId && $name && $description && $price && $stock && $image) {
            $product = new Product();
            $product->setCategoryId($categoryId);
            $product->setName($name);
            $product->setDescription($description);
            $product->setPrice($price);
            $product->setStock($stock);
            if ($id) {
                if ($image) {
                    $saveImage = $this->saveImage($image);
                    $product->setImage($image['name']);
                }
                $product->setId($id);
                $product->editProduct();
                header("Location:" . baseUrl . "product/management");
            } else {
                if ($image) {
                    $saveImage = $this->saveImage($image);
                    $product->setImage($image['name']);
                }
                $product->addProduct();
                header("Location:" . baseUrl . "product/management");
            }
        }
    }

    public function deleteProduct()
    {
        Utils::isAdmin();
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        if ($id) {
            $product = new Product();
            $product->setId($id);
            $product->deleteProduct();
            header("Location:" . baseUrl . "product/management");
        }
        header("Location:" . baseUrl . "product/management");
    }

    public function saveImage($image)
    {
        Utils::isAdmin();
        $file = $image;
        $fileName = $file['name'];
        $fileType = $file['type'];
        if ($fileType == "image/jpg" || $fileType == "image/jpeg" || $fileType == "image/png") {
            move_uploaded_file($file['tmp_name'], "uploads/images/" . $fileName);
        }
    }
}

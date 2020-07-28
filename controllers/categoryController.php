<?php

require_once 'models/category.php';

class categoryController
{
    public function index()
    {
        Utils::isAdmin();
        $category = new Category;
        $categories = $category->getCategories();
        require_once 'views/category/index.php';
    }

    public function add()
    {
        Utils::isAdmin();
        $name = isset($_POST['name']) ? $_POST['name'] : false;
        if ($name) {
            $category = new Category();
            $category->setName($name);
            $save = $category->addCategory();
            header("Location:" . baseUrl . "category/index");
        }
    }

    public function addOrUpdate()
    {
        Utils::isAdmin();
        $form = isset($_GET['form']) ? $_GET['form'] : false;
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        switch ($form) {
            case "create":
                $_SESSION['form'] = 'true';
                $_SESSION['create'] = 'true';
                header("Location:" . baseUrl . "category/index");
                break;
            case "edit":
                $_SESSION['form'] = 'true';
                $_SESSION['edit'] = 'true';
                $category = new Category();
                $category->setId($id);
                $category = $category->getCategory();
                header("Location:" . baseUrl . "category/index&name=$category->name&id=$category->id");
                break;
        }
    }

    public function update()
    {
        Utils::isAdmin();
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        $name = isset($_POST['name']) ? $_POST['name'] : false;
        if ($id && $name) {
            $category = new Category();
            $category->setName($name);
            $category->setId($id);
            $edit = $category->editCategory();
            header("Location:" . baseUrl . "category/index");
        } else {
            header("Location:" . baseUrl . "category/index");
        }
    }

    public function deleteCategory()
    {
        Utils::isAdmin();
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        if ($id) {
            $category = new Category();
            $category->setId($id);
            $delete = $category->deleteCategory();
            header("Location:" . baseUrl . "category/index");
        }
        header("Location:" . baseUrl . "category/index");
    }
}

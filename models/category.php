<?php

class Category
{
    private $id;
    private $name;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function setId($name)
    {
        $this->id = $this->db->real_escape_string($name);
    }

    public function setName($name)
    {
        $this->name = $this->db->real_escape_string($name);
    }

    public function getCategories()
    {
        $sql = "SELECT * FROM category";
        $categories = $this->db->query($sql);
        return $categories;
    }

    public function getCategory()
    {
        $sql = "SELECT * FROM category WHERE id = $this->id";
        $category = $this->db->query($sql);
        return $category->fetch_object();
    }

    public function addCategory()
    {
        $result = false;
        $sql = "INSERT INTO category VALUES(NULL, '$this->name')";
        $add = $this->db->query($sql);
        if ($add) {
            $result = true;
        }
        return $result;
    }

    public function editCategory()
    {
        $result = false;
        $sql = "UPDATE category SET name = '$this->name' WHERE id = $this->id";
        $edit = $this->db->query($sql);
        if ($edit) {
            $result = true;
        }
        return $result;
    }

    public function deleteCategory()
    {
        $result = false;
        $sql = "DELETE FROM category WHERE id = $this->id";
        $delete = $this->db->query($sql);
        if ($delete) {
            $result = true;
        }
        return $result;
    }
}

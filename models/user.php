<?php

class User
{
    private $name;
    private $surname;
    private $email;
    private $password;
    private $region;
    private $city;
    private $address;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function setName($name)
    {
        $this->name = $this->db->real_escape_string($name);
    }
    public function setSurname($surname)
    {
        $this->surname = $this->db->real_escape_string($surname);
    }
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }
    public function setPassword($password)
    {
        $this->password = $this->db->real_escape_string($password);
    }
    public function setRegion($region)
    {
        $this->region = $this->db->real_escape_string($region);
    }

    public function setCity($city)
    {
        $this->city = $this->db->real_escape_string($city);
    }

    public function setAddress($address)
    {
        $this->address = $this->db->real_escape_string($address);
    }

    public function addUser()
    {
        $result = false;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user VALUES(NULL, '$this->name', '$this->surname', '$this->email', '$this->password', 'user', NULL)";
        $add = $this->db->query($sql);
        if ($add) {
            $result = true;
        }
        return $result;
    }

    public function login()
    {
        $result = false;
        $sql = "SELECT * FROM user WHERE email = '$this->email'";
        $login = $this->db->query($sql);
        if ($login->num_rows == 1) {
            $user = $login->fetch_object();
            $verify = password_verify($this->password, $user->password);
            if ($verify) {
                return $user;
            }
        }
        return $result;
    }

    public function getUser()
    {
        $result = false;
        $sql = "SELECT * FROM user WHERE email = '$this->email'";
        $user = $this->db->query($sql);
        if ($user->num_rows != 0) {
            $user = $user->fetch_object();
            return $user;
        }
        return $result;
    }

    public function updateDataUser()
    {
        $result = false;
        $sql = "UPDATE user SET region = '$this->region', city = '$this->city', address = '$this->address' WHERE email = '$this->email'";
        $user = $this->db->query($sql);
        if ($user) {
            $result = true;
        }
        return $result;
    }
}

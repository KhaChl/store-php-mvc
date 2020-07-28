<?php
require_once 'models/user.php';

class userController
{

    public function signIn()
    {
        require_once 'views/user/signin.php';
    }

    public function signUp()
    {
        require_once 'views/user/signup.php';
    }

    public function addUser()
    {
        $name = isset($_POST['name']) ? $_POST['name'] : false;
        $surname = isset($_POST['surname']) ? $_POST['surname'] : false;
        $email = isset($_POST['email']) ? $_POST['email'] : false;
        $password = isset($_POST['password']) ? $_POST['password'] : false;
        if ($name && $surname && $email && $password) {
            $user = new User();
            $user->setName($name);
            $user->setSurname($surname);
            $user->setEmail($email);
            $user->setPassword($password);
            $save = $user->addUser();
            if ($save) {
                $identity = $user->getUser();
                $_SESSION['identity'] = $identity;
                if ($identity->role == 'admin') {
                    $_SESSION['admin'] = true;
                }
                header('Location:' . baseUrl . 'product/index');
            } else {
                $_SESSION['user'] = "failed";
                header('Location:' . baseUrl . 'user/signup');
            }
        } else {
            if (empty($name)) {
                $_SESSION['name'] = "failed";
            }
            if (empty($surname)) {
                $_SESSION['surname'] = "failed";
            }
            if (empty($email)) {
                $_SESSION['email'] = "failed";
            }
            if (empty($password)) {
                $_SESSION['password'] = "failed";
            }
            header('Location:' . baseUrl . 'user/signup');
        }
    }

    public function login()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : false;
        $password = isset($_POST['password']) ? $_POST['password'] : false;

        if ($email && $password) {
            $user = new User;
            $user->setEmail($email);
            $user->setPassword($password);
            $identity = $user->login();
            if (is_object($identity)) {
                $_SESSION['identity'] = $identity;
                if ($identity->role == 'admin') {
                    $_SESSION['admin'] = true;
                }
                header('Location:' . baseUrl . 'product/index');
            } else {
                $_SESSION['user'] = 'failed';
                header('Location:' . baseUrl . 'user/signin');
            }
        } else {
            if (empty($email)) {
                $_SESSION['email'] = "failed";
            }
            if (empty($password)) {
                $_SESSION['password'] = "failed";
            }
            header('Location:' . baseUrl . 'user/signin');
        }
    }

    public function signOut()
    {
        Utils::deleteSession('identity');
        Utils::deleteSession('admin');
        header('Location:' . baseUrl);
    }

    public function myData()
    {
        Utils::isUser();
        require_once 'views/user/mydata.php';
    }

    public function updateDataUser()
    {
        $region = isset($_POST['region']) ? $_POST['region'] : false;
        $city = isset($_POST['city']) ? $_POST['city'] : false;
        $address = isset($_POST['address']) ? $_POST['address'] : false;
        $emailUser = isset($_SESSION['identity']->email) ? $_SESSION['identity']->email : false;
        if ($region && $city && $address && $emailUser) {
            $user = new User();
            $user->setRegion($region);
            $user->setCity($city);
            $user->setAddress($address);
            $user->setEmail($emailUser);
            $save = $user->updateDataUser();
            if ($save) {
                $identity = $user->getUser();
                $_SESSION['identity'] = $identity;
                header("Location:" . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['user'] = 'failed';
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}

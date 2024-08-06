<?php

declare(strict_types=1);

class User
{
    public function isUserExists(): bool
    {
        if(isset($_POST['email']))
        {
            $email = $_POST['email'];
            $db = DB::connect();
            $stmt = $db->prepare("select *  from users where email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return (bool) $stmt->fetch();
        }
        return false;
    }
    public function register()
    {
        if($this->isUserExists())
        {
            echo "User already exists";
            return;
        }
        $user = $this->create();

        $_SESSION['user'] = $user['email'];
        header("Location /");
    }
    public function create()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email    = $_POST['email'];
            $password = $_POST['password'];

            $db   = DB::connect();
            $stmt = $db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $stmt = $db->prepare("SELECT * FROM users where email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
//            echo $result ? 'New record created successfully' : 'Something went wrong';
        }
        return print_r( "NImadur");
    }
    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['password']))
        {
            $email    = $_POST['email'];
            $password = $_POST['password'];
            $db   = DB::connect();
            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $row = $stmt->fetch();
            echo $row ? header("Location: /") : 'Something went wrong';

        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
    }
}

<?php

declare(strict_types=1);

class User
{
    public function create()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email    = $_POST['email'];
            $password = $_POST['password'];

            $db   = DB::connect();
            $stmt = $db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $result = $stmt->execute();

            echo $result ? 'New record created successfully' : 'Something went wrong';
        }
    }

}
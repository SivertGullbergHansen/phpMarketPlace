<?php
require_once "database.php";
class User extends Database
{
    function __construct($username, $password, $email = '', $register = false)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->register = $register;

        if ($register) {
            $newUser = $this->checkNewUser();
            if ($newUser) {
                $this->createUser();
            } else {
                echo "username already exists!";
            }
        } else {
            $this->loginUser();
        }
    }

    protected function checkNewUser()
    {
        $bool = true;
        $userArr = $this->readFromTable("users");

        foreach ($userArr as $user) {
            if ($this->username == $user['username']) {
                $bool = false;
                break;
            }
        }

        return $bool;
    }

    protected function createUser()
    {
        $connection = $this->connect();

        //query the database
        $query = "INSERT INTO users(username,password)";
        $query .= "VALUES ('$this->username','$this->password')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('Failed: ' . mysqli_error($connection));
        } else {
            header('Location: login.php');
        }

        $this->disconnect($connection);
    }

    protected function loginUser()
    {
        $connection = $this->connect();

        $query = "SELECT password FROM users WHERE username = '$this->username'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);

        if (!$result) {
            die('Failed: ' . mysqli_error($connection));
        } else if ($row != null && password_verify($this->password, $row[0])) {
            $userInfo = mysqli_fetch_array(mysqli_query($connection, "SELECT userID,currency,username FROM users WHERE username = '$this->username'"));
            $_SESSION['user_id'] = $userInfo[0];
            $_SESSION['username'] = $userInfo[2];
            $_SESSION['userCurrency'] = $userInfo[1];
            $sessionHash = hash('sha256', $userInfo[2]);
            $_SESSION['sessionHash'] = $sessionHash;

            mysqli_query($connection, "UPDATE users SET session_hash = '$sessionHash' WHERE username = '$this->username'");
            header('Location: browse.php');
        } else {
            echo 'Failed!';
        }

        $this->disconnect($connection);
    }
}

<?php

class Teacher extends model
{

    public function verifyLogin()
    {

        if (!isset($_SESSION['logged']) || (isset($_SESSION['logged']) && empty($_SESSION['logged']))) {
            header("Location: " . BASE_URL . "login");
            exit;
        }

    }

    public function login($email, $password)
    {

        $sql = "SELECT * FROM teacher WHERE email = '$email' AND password = '$password'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();

            $_SESSION['logged'] = $sql['id'];

            header("Location: " . BASE_URL);
            exit;
        } else {
            return "E-mail e/ou senha errados!";
        }

    }

    public function addUser($name, $email, $subject, $registration, $password, $isAdmin)
    {

        $sql = "SELECT * FROM teacher WHERE email = '$email'";
        $sql = $this->db->query($sql);

        if ($isAdmin == '') {
            $isAdmin = 0;
        } else {
            $isAdmin = 1;
        }

        if ($sql->rowCount() == 0) {
            $sql = "INSERT INTO teacher SET name = '$name', email = '$email', password = MD5('$password'), subject = '$subject', registration = '$registration', admin = '$isAdmin'";
            $sql = $this->db->query($sql);

            $id = $this->db->lastInsertId();
            $_SESSION['logged'] = $id;

            header("Location: " . BASE_URL);

        } else {
            return "E-mail já está cadastrado!";
        }

    }

    public function getUser($id)
    {
        $sql = "SELECT user FROM users WHERE id = '$id'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();

            return $sql['user'];
        } else {
            return '';
        }
    }

    public function getUserById($id)
    {
        $sql = "SELECT id FROM users WHERE id = '$id'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();

            return $sql['id'];
        } else {
            return '';
        }
    }

    public function getUsers()
    {
        $array = array();

        $sql = "SELECT * FROM users";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

}
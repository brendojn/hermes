<?php

class Trail extends model
{
    public function verifyLogin()
    {

        if (!isset($_SESSION['logged']) || (isset($_SESSION['logged']) && empty($_SESSION['logged']))) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
    }

    public function getTrails()
    {
        $array = array();

        $sql = "SELECT id, name_trail, description FROM trail";

        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();

        }

        return $array;
    }

    public function createTrail($name, $description)
    {
        $sql = "SELECT * FROM trail WHERE name_trail = '$name'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() == 0) {
            $sql = "INSERT INTO trail SET name_trail = '$name', description = '$description'";
            $sql = $this->db->query($sql);

            header("Location: " . BASE_URL . "trails");
        } else {
            return "Trilha já se encontra cadastrada";
        }
    }

    public function getNumberTrails()
    {

        $sql = "SELECT COUNT(*) as qtd FROM trail";

        $sql = $this->db->query($sql);

        $result = $sql->fetch();

        return $result['qtd'];
    }
}
<?php

class Student extends model
{
    public function verifyLogin()
    {

        if (!isset($_SESSION['logged']) || (isset($_SESSION['logged']) && empty($_SESSION['logged']))) {
            header("Location: " . BASE_URL . "login");
            exit;
        }

    }

    public function addStudent($name, $email, $period, $registration, $password, $group)
    {

        $sql = "SELECT * FROM student WHERE email = '$email'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() == 0) {
            $sql = "INSERT INTO student SET name_student = '$name', email = '$email', password = MD5('$password'), period = '$period', registration = '$registration', fk_group_id = '$group'";
            $sql = $this->db->query($sql);

            header("Location: " . BASE_URL . "students");

        } else {
            return "E-mail já está cadastrado!";
        }
    }

    public function getStudents()
    {
        $array = array();

        $sql = "SELECT s.name_student, s.email, s.password, s.period, s.registration, s.fk_group_id, g.name_group FROM hermes.student s
                JOIN hermes.group g
                ON g.id = s.fk_group_id
                ";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getName($id)
    {
        $sql = "SELECT name FROM student WHERE id = '$id'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql['name'];
        } else {
            return '';
        }
    }

    public function getGroupStudent() {

    }

}
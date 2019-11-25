<?php

class Group extends model
{
    public function createGroup($name, $description, $teacher)
    {
        $sql = "SELECT * FROM hermes.group WHERE name_group = '$name'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() == 0) {
            $sql = "INSERT INTO hermes.group SET name_group = '$name', description = '$description', fk_teacher_id = '$teacher'";
            $sql = $this->db->query($sql);

            header("Location: " . BASE_URL . "groups");
        } else {
            return "Turma já se encontra cadastrada";
        }
    }

    public function getGroups()
    {
        $array = array();

        $sql = "SELECT g.id, g.name_group, t.name_teacher, g.description, g.fk_teacher_id FROM hermes.group g
                JOIN teacher t 
                ON g.fk_teacher_id = t.id";

        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();

        }

        return $array;
    }

    public function getTeacherGroup($id)
    {
        $array = array();

        $sql = "SELECT t.id FROM hermes.group g
                JOIN teacher t 
                ON g.fk_teacher_id = t.id
                WHERE g.id = '$id'";

        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function getGroup($id)
    {
        $array = array();

        $sql = "SELECT g.name_group, t.name_teacher, g.description, g.fk_teacher_id FROM hermes.group g
                JOIN teacher t 
                ON g.fk_teacher_id = t.id
                WHERE g.id = '$id'";

        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function editGroup($id, $name, $description, $teacher, $trail = null)
    {
        $array = array();

        $sql = "SELECT id FROM hermes.group WHERE id = '$id'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        $sql = "UPDATE hermes.group SET name_group = '$name', description = '$description', fk_trail_id = '$trail', fk_teacher_id = '$teacher' WHERE id = '$id'";
        $sql = $this->db->query($sql);


        header("Location: " . BASE_URL . "groups");
    }

    public function deleteGroup($id)
    {

        $sql = "DELETE FROM hermes.group WHERE id = '$id'";
        $sql = $this->db->query($sql);
    }

    public function getNumberStudent()
    {
        $sql = "SELECT COUNT(*) as qtd FROM hermes.`group` g
                JOIN student s
                ON s.fk_group_id = g.id
                ";

        $sql = $this->db->query($sql);

        $result = $sql->fetchAll();

        return $result['qtd'];
    }
}
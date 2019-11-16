<?php

class Group extends model
{
    public function createGroup($name, $description, $teacher)
    {

        $sql = "SELECT * FROM group WHERE name = '$name'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() == 0) {
            $sql = "INSERT INTO group SET name = '$name', description = '$description', fk_teacher_id = '$teacher'";

            $sql = $this->db->query($sql);

            header("Location: " . BASE_URL . "groups");
        } else {
            return "Turma já se encontra cadastrada";
        }
    }

    public function getGroups()
    {
        $array = array();

        $sql = "SELECT g.name_group, t.name_teacher, g.description, g.fk_teacher_id FROM hermes.group g
                JOIN teacher t 
                ON g.fk_teacher_id = t.id";

        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();

        }

        return $array;
    }

}
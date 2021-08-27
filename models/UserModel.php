<?php
class UserModel extends BaseModel
{
    public function getIdUser($id)
    {
        $sql = "SELECT * FROM " . Table . " WHERE id = ${id}";
        return $this->getByQuery($sql);
    }
    public function insertUser($data)
    {
        return $this->create(Table, $data);
    }
}

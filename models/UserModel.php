<?php
class UserModel extends BaseModel {
    const TABLE = 'user';
    public function getIdUser($id) {
        $sql = "SELECT * FROM ".self::TABLE." WHERE id = ${id}";
        return $this->getByQuery($sql);
    }
}
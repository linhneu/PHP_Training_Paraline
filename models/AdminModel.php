
<?php
class AdminModel extends BaseModel
{
    const TABLE = 'admin';

    public function getAllAdmin($select = ['*'], $limit = 15) {
        return $this->getAll(self::TABLE, $select, $limit);
        
    }
    public function createAdmin($data) {
        return $this->create(self::TABLE, $data);
    }
    public function updateAdmin($id, $data) {
        return $this->update(self::TABLE, $id, $data);
        return this->update($sql);
    }
    public function deleteAdmin($id) {
        return $this->delete(self::TABLE, $id);
    }
    public function findAdmin($search, $condition) {
        return $this->find(self::TABLE, $search, $condition);
    }
    public function getIdAdmin($id) {
        $sql = "SELECT * FROM ".self::TABLE." WHERE id = ${id}";
        return $this->getByQuery($sql);
    }
    public function getAdmin() {
        $sql = "SELECT * FROM ".self::TABLE."  ";
        return $this->getByQuery($sql);
    }
    public function getLogin( $email, $password ) {
        $sql = "SELECT * FROM ".self::TABLE." WHERE email=${email} and password = ${password} ";
        return $this->getQuery($sql);
        $num_row = mysqli_num_rows($query);

    }

    const Table = 'user';
    public function editUser($id, $data) {
        return $this->update(self::Table, $id, $data);
    }
    public function findUser($search, $condition) {
        return $this->find(self::Table, $search, $condition);
    }
    public function deleteUser($id) {
        return $this->delete(self::Table, $id);
    }
    public function getIdUser($id) {
        $sql = "SELECT * FROM ".self::Table." WHERE id = ${id}";
        return $this->getByQuery($sql);
    }
}
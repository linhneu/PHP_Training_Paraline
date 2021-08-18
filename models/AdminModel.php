
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
}
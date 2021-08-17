<h1>Adminmodel</h1>
<?php
class AdminModel extends BaseModel
{
    const TABLE = 'admin';

    public function getAllAdmin($select = ['*']) {
        return $this->getAll(self::TABLE, $select);
    }
    public function createAdmin($data) {
        return $this->create(self::TABLE, $data);
    }
    public function updateAdmin($id, $data) {
        return $this->update(self::TABLE, $id, $data);
    }
    public function deleteAdmin($id) {
        return $this->delete(self::TABLE, $id);
    }
    public function findAdmin($id) {
        echo __METHOD__;
        return $this->find(self::TABLE, $id);
    }

}
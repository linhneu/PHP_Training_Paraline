
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
        return $this->update($sql);
    }
    public function deleteAdmin($id) {
        return $this->delete(self::TABLE, $id);
    }
    public function findAdmin($search, $condition) {
        //$sqls = $this->find(self::TABLE, $search, $condition);
        $sql = "SELECT * FROM ".self::TABLE." WHERE email LIKE '%${search}%' and name LIKE '%${search}%' and
        del_flag = ${condition}  LIMIT 10";
        return mysqli_query($this->connect, $sql);

    }
    public function getIdAdmin($id) {
        $sql = "SELECT * FROM ".self::TABLE." WHERE id = ${id}";
        return $this->getByQuery($sql);
    }
    public function getAdmin() {
        $sql = "SELECT * FROM ".self::TABLE." ORDER BY id ";
        return mysqli_query($this->connect, $sql);
    }
    public function getRow() {
        $sql = "SELECT COUNT(*) FROM ".self::TABLE."";
        return $this->getQuery($sql);       
    }
    public function login($email, $password, $role_type) {
        $sql = "SELECT * FROM ".self::TABLE." WHERE email = '{$email}' and password = '{$password}' and role_type= '{$role_type}'";
        return mysqli_query($this->connect, $sql);

    } 

    const Table = 'user';
    public function editUser($id, $data) {
        return $this->update(self::Table, $id, $data);
    }
    public function findUser($search, $condition) {
        $sql = "SELECT * FROM ".self::Table." WHERE email LIKE '%${search}%' and name LIKE '%${search}%' and
        del_flag = ${condition}  LIMIT 10";
        return mysqli_query($this->connect, $sql);

    }
    public function deleteUser($id) {
        return $this->delete(self::Table, $id);
    }
    public function getIdUser($id) {
        $sql = "SELECT * FROM ".self::Table." WHERE id = ${id}";
        return $this->getByQuery($sql);
    }
    public function getUser() {
        $sql = "SELECT * FROM ".self::Table." ORDER BY id ";
        return mysqli_query($this->connect, $sql);
    }

}
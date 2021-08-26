
<?php
class AdminModel extends BaseModel
{
    const TABLE = 'admin';

    public function getAllAdmin($select = ['*'], $limit = 15)
    {
        return $this->getAll(self::TABLE, $select, $limit);
    }
    public function createAdmin($data)
    {
        return $this->create(self::TABLE, $data);
    }
    public function updateAdmin($id, $data)
    {
        return $this->update(self::TABLE, $id, $data);
      
    }
    public function deleteAdmin($id, $del_flag)
    {
        return $this->delete(self::TABLE, $id, $del_flag);
    }
    public function findAdmin($search, $del_flag, $start, $rowsPerPage)
    {
        $sql = "SELECT * FROM " . self::TABLE . " WHERE email LIKE '%${search}%' and name LIKE '%${search}%' and
        del_flag = ${del_flag}  LIMIT ${start}, ${rowsPerPage}";
        return mysqli_query($this->connect, $sql);

    }
    public function getIdAdmin($id)
    {
        $sql = "SELECT * FROM " . self::TABLE . " WHERE id = ${id}";
        return $this->getByQuery($sql);
    }
    public function getAdmin()
    {
        $sql = "SELECT * FROM " . self::TABLE . " ORDER BY id ";
        return mysqli_query($this->connect, $sql);
    }
    public function login($email, $password)
    {
        $sql = "SELECT * FROM " . self::TABLE . " WHERE email = '{$email}' and password = '{$password}'";
        return mysqli_query($this->connect, $sql);
    }

    const Table = 'user';
    public function editUser($id, $data)
    {
        return $this->update(self::Table, $id, $data);
    }
    public function findUser($search,$del_flag, $start, $rowsPerPage)
    {
        $sql = "SELECT * FROM " . self::Table . " WHERE email LIKE '%${search}%' and name LIKE '%${search}%' and
        del_flag = ${del_flag}  LIMIT ${start}, ${rowsPerPage} ";
        return mysqli_query($this->connect, $sql);
    }
    public function listFindUser($search,$del_flag)
    {
        $sql = "SELECT * FROM " . self::Table . " WHERE email LIKE '%${search}%' and name LIKE '%${search}%' and
        del_flag = ${del_flag}";
        return mysqli_query($this->connect, $sql);
    }
    public function deleteUser($id, $del_flag)
    {
        return $this->delete(self::Table, $id, $del_flag);
    }
    public function getIdUser($id)
    {
        $sql = "SELECT * FROM " . self::Table . " WHERE id = ${id}";
        return $this->getByQuery($sql);
    }
    public function getUser()
    {
        $sql = "SELECT * FROM " . self::Table . " ORDER BY id ";
        return mysqli_query($this->connect, $sql);
    }
}

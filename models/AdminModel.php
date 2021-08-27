
<?php
class AdminModel extends BaseModel
{
    //admin
    public function createAdmin($data)
    {
        return $this->create(TABLE, $data);
    }
    public function updateAdmin($id, $data)
    {
        return $this->update(TABLE, $id, $data);
    }
    public function deleteAdmin($id, $del_flag)
    {
        return $this->delete(TABLE, $id, $del_flag);
    }
    public function findAdmin($search, $del_flag, $start, $rowsPerPage)
    {
        $sql = "SELECT * FROM " . TABLE . " WHERE email LIKE '%${search}%' and name LIKE '%${search}%' and
        del_flag = ${del_flag}  LIMIT ${start}, ${rowsPerPage}";
        return mysqli_query($this->connect, $sql);
    }
    public function listFindAdmin($search, $del_flag)
    {
        $sql = "SELECT * FROM " . TABLE . " WHERE email LIKE '%${search}%' and name LIKE '%${search}%' and
        del_flag = ${del_flag}";
        return $this->_query($sql);
    }
    public function getIdAdmin($id)
    {
        $sql = "SELECT * FROM " . TABLE . " WHERE id = ${id}";
        return $this->getByQuery($sql);
    }
    public function getAdmin()
    {
        $sql = "SELECT * FROM " . TABLE . " ORDER BY id ";
        return $this->_query($sql);
    }
    public function login($email, $password)
    {
        $sql = "SELECT * FROM " . TABLE . " WHERE email = '{$email}' and password = '{$password}'";
        return $this->_query($sql);
    }

    //user

    public function editUser($id, $data)
    {
        return $this->update(Table, $id, $data);
    }
    public function findUser($search, $del_flag, $start, $rowsPerPage)
    {
        $sql = "SELECT * FROM " . Table . " WHERE email LIKE '%${search}%' and name LIKE '%${search}%' and
        del_flag = ${del_flag}  LIMIT ${start}, ${rowsPerPage} ";
        return mysqli_query($this->connect, $sql);
    }
    public function listFindUser($search, $del_flag)
    {
        $sql = "SELECT * FROM " . Table . " WHERE email LIKE '%${search}%' and name LIKE '%${search}%' and
        del_flag = ${del_flag}";
        return $this->_query($sql);
    }
    public function deleteUser($id, $del_flag)
    {
        return $this->delete(Table, $id, $del_flag);
    }
    public function getIdUser($id)
    {
        $sql = "SELECT * FROM " . Table . " WHERE id = ${id}";
        return $this->getByQuery($sql);
    }
    public function getUser()
    {
        $sql = "SELECT * FROM " . Table . " ORDER BY id ";
        return $this->_query($sql);
    }
}

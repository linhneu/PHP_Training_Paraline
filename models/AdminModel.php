
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
    public function findAdmin($search, $condition, $rowsPerPage)
    {
        //return $this->find(self::TABLE, $search, $condition);
        $sql = "SELECT * FROM " . self::TABLE . " WHERE email LIKE '%${search}%' and name LIKE '%${search}%' and
        del_flag = ${condition}  LIMIT ${rowsPerPage}";
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
    //public function getPageAdmin($currentPage, $totalPages) {
        //return $this->getPage(self::TABLE, $currentPage, $totalPages);
    //}
    public function getPageAdmin($del_flag = DEL_FLAG_ACTIVE) {
        $rowsPerPage = ROW_PER_PAGE;
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $totalRows = (int)"SELECT COUNT (*) FROM ". self::TABLE ." WHERE del_flag = ${del_flag} ";
        $totalPages = ceil($totalRows / $rowsPerPage);

        if($currentPage < 1) {
            $currentPage = 1;
        }
        if($currentPage > $totalPages) {
            $currentPage = $totalPages;
        }
        $perRow = $currentPage * $rowsPerPage - $rowsPerPage;
        $sql = "SELECT * FROM ". self::TABLE ." WHERE del_flag = ${del_flag} ORDER BY id LIMIT ${perRow}, ${rowsPerPage} ";
        return $this->_query($sql);
    }


    const Table = 'user';
    public function editUser($id, $data)
    {
        return $this->update(self::Table, $id, $data);
    }
    public function findUser($search, $condition)
    {
        $sql = "SELECT * FROM " . self::Table . " WHERE email LIKE '%${search}%' and name LIKE '%${search}%' and
        del_flag = ${condition}  LIMIT 10";
        return mysqli_query($this->connect, $sql);
    }
    public function deleteUser($id, $condition)
    {
        return $this->delete(self::Table, $id, $condition);
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

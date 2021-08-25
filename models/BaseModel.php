<?php
abstract class BaseModel implements Database
{
    protected $connect;
    
    protected function connect()
    {
        $connect = new mysqli(HOST, USERNAME, PASSWORD, DB_NAME);
        mysqli_set_charset($connect, "uft8");
        if (mysqli_connect_error() == 0) {
            return $connect;
        }
        return false;
    }
    public function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    public function __construct()
    {
        $this->connect = $this->connect();
    }
    public function getAll($table, $select = ['*'])
    {
        $columns = implode(',', $select);
        $sql = "SELECT ${columns}  FROM ${table} ";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    public function create($table, $data = [])
    {
        $data['ins_id'] = isset($_SESSION['id']) ? $_SESSION['id']: null;
        $data['ins_datetime'] = date('Y-m-d H:s:i');
        $data['del_flag'] = DEL_FLAG_ACTIVE;
        $columns = implode(',', array_keys($data));
        $newValues = array_map(
            function ($value) {
                return "'" . $value . "'";
            },
            array_values($data)
        );
        $newValues = implode(',', $newValues);
        $sql = "INSERT INTO ${table}(${columns}) VALUES(${newValues})";        
        $this->_query($sql);
    }
    public function update($table, $id, $data = [])
    {
        $data['upd_id'] = isset($_SESSION['id']) ? $_SESSION['id']: null;
        $data['upd_datetime'] = date('Y-m-d H:s:i');
        $data['del_flag'] = DEL_FLAG_ACTIVE;
        $dataSets = [];
        foreach ($data as $key => $val) {
            array_push($dataSets, "${key} = '" . $val . "'");
        }
        $dataSetString = implode(',', $dataSets);
        $sql = "UPDATE ${table} SET ${dataSetString}
        WHERE id = ${id}";
        $this->_query($sql);
    }
    public function delete($table, $id, $del_flag)
    {
        $sql = "DELETE FROM ${table} WHERE id = ${id} and del_flag = ${del_flag}";
        $this->_query($sql);
    }
    public function find($table, $search, $del_flag, $rowsPerPage)
    {
        $sql = "SELECT * FROM ${table} WHERE email LIKE '%${search}%' and name LIKE '%${search}%' and
        del_flag = ${del_flag} LIMIT ${rowsPerPage}  ";
        $this->_query($sql);
    }
    public function getByQuery($sql)
    {
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }
    public function getQuery($sql)
    {
        $query = $this->_query($sql);
        $data = [];
    }
    public function getPage($table, $currentPage, $totalPages, $del_flag = DEL_FLAG_ACTIVE) {
        $rowsPerPage = ROW_PER_PAGE;
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $totalRows = (int)"SELECT COUNT (*) FROM ${table} WHERE del_flag = ${del_flag} ";
        $totalPages = ceil($totalRows / $rowsPerPage);

        if($currentPage < 1) {
            $currentPage = 1;
        }
        if($currentPage > $totalPages) {
            $currentPage = $totalPages;
        }
        $perRow = $currentPage * $rowsPerPage - $rowsPerPage;
        $sql = "SELECT * FROM ${table} WHERE del_flag = ${del_flag} ORDER BY id LIMIT ${perRow}, ${rowsPerPage} ";
        return $this->_query($sql);
    }
}

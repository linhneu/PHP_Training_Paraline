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
    public function create($table, $data = [])
    {
        $data['ins_id'] = isset($_SESSION['admin']['id']) ? $_SESSION['admin']['id']: null;
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
        $data['upd_id'] = isset($_SESSION['admin']['id']) ? $_SESSION['admin']['id']: null;
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
        $sql = "UPDATE ${table} SET del_flag = ${del_flag} WHERE id = ${id}";
        $this->_query($sql);
    }
    public function getByQuery($sql)
    {
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }
}

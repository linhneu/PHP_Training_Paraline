<?php
class BaseModel extends Database {
    protected $connect;
    private function _query($sql) {
        return mysqli_query($this->connect, $sql);
    }
    public function __construct() {
        $this->connect = $this->connect();

    }
    public function getAll($table, $select = ['*']){
       // echo '<pre>';
       // print_r ($select);
        //echo implode(',', $select);
        $columns = implode(',', $select);
        $sql = "SELECT ${columns}  FROM ${table}";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    public function findID($id) {

    }
    public function store() {

    }
    public function update() {

    }
    public function delete() {

    }

}
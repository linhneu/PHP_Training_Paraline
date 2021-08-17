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
    public function create($table, $data = []) {
        $columns = implode (',',array_keys($data));
        //$values = implode(',', array_values($data));
    
        $newValues = array_map(function($value){
            return "'" . $value . "'";
        }
        , array_values($data));
        print_r($newValues);
        $newValues = implode(',', $newValues);
        $sql = "INSERT INTO ${table}(${columns}) VALUES(${newValues})";
        $this->_query($sql);
    }
    public function update($table, $id, $data) {
        $dataSets = [];
        foreach ($data as $key => $val) {
            array_push($dataSets, "${key} = '". $val ."'");
        }
        $dataSetString = implode(',', $dataSets);
        $sql = "UPDATE ${table} SET ${dataSetString}
        WHERE id = ${id}";
        $this->_query($sql);

    }
    public function delete($table, $id) {
        $sql = "DELETE FROM ${table} WHERE id = ${id}";
        $this->_query($sql);
    }
    public function find($table, $id) {
        $sql = "SELECT * FROM ${table} WHERE id = ${id} LIMIT 1";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
        }

}
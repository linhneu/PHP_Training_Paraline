<?php
/*class DB
{
    private $__conn;

    function connectDB(){
        if(!this->__conn){
            $this->__conn = mysqli_connect('localhost', 'root', '','php_training_paraline') 
            or die ('Lỗi kết nối với cơ sở dữ liệu');
            mysqli_query($this->__conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }
    }

    function dis_connectDB(){
        if($this->__conn){
            mysqli_close($this->__conn);
        }
    }

    function insertDB($table, $data) {
        $this->connectDB();
        $field_list=''; // lưu trữ danh sách field
        $value_list=''; // lưu trữ danh sách giá trị tương ứng với field
        foreach ($data as $key => $value) {
        $field_list .= ",$key";
        $value_list .= ",'".mysql_escape_string($value)."'";
        }
        $sql = 'INSERT INTO'.$table.'('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
        // vì sau vòng lặp các biến $field_list và $value_list sẽ thừa một dấu , nên dùng hàm trim để xóa
        return mysqli_query($this->__conn, $sql);
    }

    function updateDB($table, $data) {
        $this->connectDB();
        $sql = '';
        foreach ($data as $key => $value){
        $sql .= "$key = '".mysql_escape_string($value)."',";
        }
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
        return mysqli_query($this->__conn, $sql);
    }

    function removeDB($table, $where) {
        $this->connectDB();
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->__conn, $sql);
    }

    function get_listDB($table, $select, $where) {
        $this->connectDB();
        $result = mysqli_query($this->__conn, $sql);
        if(!$result){
            die('Câu truy vấn bị sai');

        }
        $return = array();
        while($row = mysqli_fetch_assoc($result)) { // lặp kết quả để đưa vào mảng
            $return[] = $row;

        }
        mysqli_free_result($result);
        return $return;
    }
}*/
class DB {
    public $con;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "php_training_paraline";

    function __construct(){
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }

}
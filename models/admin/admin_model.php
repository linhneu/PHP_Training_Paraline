<?php 
class AdminModel extends DB 
{
    protected $admin='';
    protected $id='';
    function __construct()
	{
		parent::__connectDB();
	}
    function __destruct() {
        parent::dis_connectDB();
    }
    function login($email, $password) {
        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 0,1";
        $query = mysql_query($sql) or die(mysql_error());
        if (mysql_num_rows($query)>0) {
            $_SESSION['admin'] = mysql_fetch_assoc($query);
            return true;
        }
        return false;
    }

}
<h1>kết nối database</h1>
<?php
 class Database {
    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DB_NAME = 'example-mvc';

    private $connect;

public function connect() {
    $connect = mysqli_connect(self::HOST, self::USERNAME, self::PASSWORD, self::DB_NAME);

    mysqli_set_charset($connect, "uft8");
    if(mysqli_connect_error() == 0) {
        return $connect;
    }
    return false;
}
}
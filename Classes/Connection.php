 <?php
class Connection {
    
    private static $connect = NULL;
    private static $host = "localhost";
    private static $database = "registration";
    private static $username = "root";
    private static $password = "game";

    public static function getInstance() {
        if (Connection::$connect === NULL) {
            Connection::$connect =   mysqli_connect( Connection::$host,Connection::$username,Connection::$password,Connection::$database); 
            if (!Connection::$connect || mysqli_connect_errno() ) {
                die("Could not connect to database");
            }
        }
        
        return Connection::$connect;
    }
    
    public static function getMySQLDate($date) {
        $date_arr  = explode('-', $date);
        return $date_arr[2] . '-' . $date_arr[1] . '-' . $date_arr[0];
    }
}

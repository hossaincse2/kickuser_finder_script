<?php //

//session_start();
//
//$DB_host = "localhost";
//$DB_user = "root";
//$DB_pass = "triadpass";
//$DB_name = "countdown";
//
//try
//{
//     $dbCon = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
//     $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//}
//catch(PDOException $e)
//{
//     echo $e->getMessage();
//}
//
//
//include_once 'class.user.php';
//$user = new USER($dbCon);
//include_once 'class.setting.php';
//$setting = new SETTINGS($dbCon);
//include_once 'class.joint.php';
//$joint = new JOINT($dbCon);
//include_once 'class.social.php';
//$social = new SOCIAL($dbCon);

class DbCon {
private $_connection;
private static $_instance; //The single instance
private $_host = "localhost";
private $_username = "root";
private $_password = "triadpass";
private $_database = "countdown";
/*
Get an instance of the Database
@return Instance
*/
public static function getInstance() {
if(!self::$_instance) { // If no instance then make one
self::$_instance = new self();
}
return self::$_instance;
}
// Constructor
private function __construct() {
$this->_connection = new mysqli($this->_host, $this->_username,
$this->_password, $this->_database);
// Error handling
if(mysqli_connect_error()) {
trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
E_USER_ERROR);
}
}
// Magic method clone is empty to prevent duplication of connection
private function __clone() { }
// Get mysqli connection
public function getConnection() {
return $this->_connection;
}
}
?>
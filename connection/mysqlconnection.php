<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

require_once(__DIR__ . '../../config/env.php');
loadEnv(__DIR__ . '/../.env');

abstract class mySQL
{
    var $host;
    var $username;
    var $password;
    var $database;

    public $dbc;

    public function connect($set_host, $set_username, $set_password, $set_database)
    {
        $this->host = $set_host;
        $this->username = $set_username;
        $this->password = $set_password;
        $this->database = $set_database;
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database) or die('Error connecting to DB');
        return $conn;
    }

    public function query($sql)
    {
        return mysqli_query($this->dbc, $sql) or die('Error querying the Database');
    }

    // public function fetch($sql)
    // {
    //     $array = mysqli_fetch_array($this->query($sql));
    //     return $array;
    // }

    public function close()
    {
        return mysqli_close($this->dbc);
    }
}

class Tested extends mySQL {}

$connection = new Tested();
$conn = $connection->connect(getenv('DB_HOST'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), getenv('DB_NAME'));
// if($con_src){
//     print_r("connection successfully");
// }
?>
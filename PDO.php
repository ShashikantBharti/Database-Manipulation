<?php
/**
 * PDO To manipulate Database Tables.
 * 
 * PHP Version 7
 * 
 * @category   PHP
 * @package    CEDCOSS
 * @subpackage Database
 * @author     Shashikant Bharti <surya.indian321@gmail.com>
 * @license    https://cedcoss.com/ <CEDCOSS 2020>
 * @link       http://127.0.0.1/training/task-3/PDO.php
 */

/**
 * Connection with database.
 * 
 * @category   PHP
 * @package    CEDCOSS
 * @subpackage Database
 * @author     Shashikant Bharti <surya.indian321@gmail.com>
 * @license    https://cedcoss.com/ <CEDCOSS 2020>
 * @link       http://127.0.0.1/training/task-3/PDO.php
 */
class Database
{
    private $_host;
    private $_user;
    private $_password;
    private $_dbname;
    private $_dsn;

    /**
     * Constructor for database connection.
     * 
     * @param $dbname Database Name.
     * 
     * @return $conn
     */
    protected function connect($dbname = '')
    {
        $this->_host = "localhost";
        $this->_user = "root";
        $this->_password = "";
        $this->_dbname = $dbname;
        try {
            // Set DSN
            $this->_dsn = "mysql:host=$this->_host;dbname=$this->_dbname";
            $conn = new PDO($this->_dsn, $this->_user, $this->_password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (!$conn) {
                echo "Connected Failed!";
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }
}

/**
 * Database Queries.
 * 
 * @category   PHP
 * @package    CEDCOSS
 * @subpackage Database
 * @author     Shashikant Bharti <surya.indian321@gmail.com>
 * @license    https://cedcoss.com/ <CEDCOSS 2020>
 * @link       http://127.0.0.1/training/task-3/PDO.php
 */
class Query extends Database
{


    /**
     * Function to list all tables.
     * 
     * @return Databases.
     */
    public function databases()
    {
        $sql = "SHOW DATABASES";
        $data = array();
        $result = $this->connect()->query($sql);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
    /**
     * Function to list all tables.
     * 
     * @param $dbname Name of Database.
     * 
     * @return Table.
     */
    public function tables($dbname = 'dailyshop')
    {
        $sql = "SHOW TABLES";
        $data = array();
        $result = $this->connect($dbname)->query($sql);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * Function to list all tables.
     * 
     * @param $dbname Database Name.
     * @param $table  Table name of database.
     * 
     * @return Table.
     */
    public function select( $dbname = '', $table = '' )
    {
        $sql = "SELECT * FROM `$table`";
        $data = array();
        $result = $this->connect($dbname)->query($sql);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    

}

?>
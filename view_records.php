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

require 'PDO.php';

if (isset($_REQUEST['tbl_name']) and $_REQUEST['tbl_name'] != '') {
    $tbl_name = $_REQUEST['tbl_name'];
    $dbname = $_REQUEST['dbname'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Manipulate Database Using PDO</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand fw-bold" href="./">PDO</a>
        </div>
    </nav>
    <!-- //Navbar -->
    <div class="container">
        <h1> 
            <a href="view_tables.php?dbname=<?php echo $dbname; ?>" 
            class="btn btn-primary">Back</a> 
            Database : <?php echo ucfirst($dbname); ?> 
        </h1>
        <h3>Table Name : 
            <?php 
                $table = str_replace('_', ' ', $tbl_name);
                echo ucwords($table);
            ?>
        </h3>
        <table class="table table-responsive">
            <thead>
                <tr>
                <?php
                $query = new Query;
                $result = $query->select($dbname, $tbl_name);
                if (count($result) != 0) {
                    $keys = array();
                    foreach ($result as $key=>$value) {
                        foreach ($value as $k=>$v) {
                            $keys[] = $k;
                        }
                        if ($key >= 0) {
                            break;
                        }
                    }
                } else {
                    echo 'No Record Found';
                    die;
                }
                foreach ($keys as $k) {
                    $k = ucfirst(str_replace('_', ' ', $k));
                    echo "<th>$k</th>";
                }
                echo "<th>action</th>";
                ?>
                    
                </tr>
            </thead>
            <tbody>
            <?php 
            $query = new Query;
            $result = $query->select($dbname, $tbl_name);
            $count = count($result);
            if ($count != 0) {
                $sr = 1;
                foreach ($result as $key=>$value) {
                    echo '<tr>';
                    echo "<td>$sr</td>";
                    foreach ($keys as $k=>$v) {
                        if ($v != 'id') {
                            echo "<td>$value[$v]</td>";
                        }
                    }
                    $id = $value['id'];
                    echo "<td>
                            <a href='?delete=1&id=$id' 
                            class='btn btn-sm btn-danger'>Delete</a>
                        </td>";
                    echo '</tr>';
                    $sr++;
                }
            } else {
                echo 'No Records Found!';
            }

            ?>
                
            </tbody>
        </table>

    </div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/myscript.js"></script>
</body>

</html>
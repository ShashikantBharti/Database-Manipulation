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

if (isset($_REQUEST['dbname']) and $_REQUEST['dbname'] != '') {
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
        <h1> <a href="./" class="btn btn-primary">Back</a> 
            Database : <?php echo ucfirst($dbname); ?> 
        </h1>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Table Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $query = new Query;
            $result = $query->tables($dbname);
            if (count($result) != 0) {
                foreach ($result as $key=>$value) {
                    ?>
                <tr>
                    <td><?php echo ++$key; ?></td>
                    <td><?php echo $value["Tables_in_$dbname"]; ?></td>
                    <td>
                        <a href="view_records.php?tbl_name=<?php echo $value["Tables_in_$dbname"]; ?>&dbname=<?php echo $dbname; ?>" 
                            class="btn btn-sm btn-info">View</a>
                        <a href="?delete=1&dbname=<?php echo $value["Tables_in_$dbname"]; ?>" 
                            class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>

                    <?php
                }
            } else {
                echo 'No Databases Found!';
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
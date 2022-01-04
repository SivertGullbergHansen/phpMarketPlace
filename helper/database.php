<?php // superclass definition : Database
// contains Database related methods. 
class Database
{
    protected static function connect()
    {
        // Written by Sivert Gullberg Hansen
        // echo "Database : connect<br>";

        include('./config/database_info.php');

        $connection = mysqli_connect($host, $username, $password, $database);

        if ($connection) {
            // echo "We are connected!<br>";
        } else {
            die("Database connection failed");
        }
        return $connection;
    }

    protected static function disconnect($connection)
    {
        mysqli_close($connection);
    }

    protected static function readFromTable($tableName) // reads table from database
    {
        // echo "Database:readFromTable<br>";
        $connection = Database::connect();
        $resArray = array();
        //query the database
        $query = "SELECT * FROM $tableName";

        $result = mysqli_query($connection, $query);

        // printing error message in case of query failure
        if (!$result) {
            die('Query failed: ' . mysqli_error($connection));
        } else {
            //echo "Entries Retrieved!<br>";
        }

        //read 1 row at a time
        $idx = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            //print_r($row);echo "<br>";
            $resArray[$idx] = $row;
            $idx++;
        }

        Database::disconnect($connection);
        return $resArray;
    }

    // sanitize input
    protected static function cleanInput($entry)
    {
        // Written by Sivert Gullberg Hansen
        $returnData = $entry;
        $returnData = htmlentities($returnData);
        $returnData = stripslashes($returnData);
        $returnData = strip_tags($returnData);
        return $returnData;
    }

    public function printTable($tableName) // prints data from database table into a html-table
    {
        // Written by Sivert Gullberg Hansen
        $data = $this->readFromTable($tableName);

        $printString = '';
        foreach ($data as $entry) {
            $printString .= "<tr>";

            foreach ($entry as $value) {
                $printString .= "<td>" . $value . "</td>";
            }

            $printString .= "</tr>";
        }

        echo $printString;
    }
}

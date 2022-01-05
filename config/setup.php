<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Setup</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="centerForm">
        <form method="post">
            <h1>Database Setup</h1>
            <h2>Database information</h2>
            <input value="<?php if (isset($_POST['host'])) echo $_POST['host'] ?>" type="text" placeholder="Hostname"
                name="host" id="host">
            <input value="<?php if (isset($_POST['username'])) echo $_POST['username'] ?>" type="text"
                placeholder="Username" name="username" id="username">
            <input value="<?php if (isset($_POST['password'])) echo $_POST['password'] ?>" type="password"
                placeholder="Password" name="password" id="password">
            <input value="<?php if (isset($_POST['database'])) echo $_POST['database'] ?>" type="text"
                placeholder="Database name" name="database" id="database">
            <input type="submit" value="Setup project">
        </form>
        <p style="line-height: 2em;">
            <?php
            // Open this file to setup your database.
            if (!empty($_POST)) {
                $host       = $_POST['host'];
                $username   = $_POST['username'];
                $password   = $_POST['password'];
                $database   = $_POST['database'];

                echo 'Connecting to server ...<br/>';
                $connection = new mysqli($host, $username, $password);

                // Queries
                $selectDatabase = mysqli_query($connection, 'use ' . $database . ';');
                $createDatabase = mysqli_query($connection, "create database " . $database . ";");

                $sqlFile = file_get_contents('marketplace.sql');

                if ($connection->connect_error) {
                    echo '<b>Failed to connect 👎🏼</b><br/>' . $connection->connect_error;
                } else {
                    echo '<b>Connected successfully 👍🏼!</b><br/>';
                    echo 'Selecting database with name "' . $database . '" ...<br/>';

                    if ($selectDatabase) { // if database exists
                        echo '<b>Database selected 👍🏼!</b></br>';

                        // Create tables
                        echo 'Creating tables ...<br/>';

                        if ($connection->multi_query($sqlFile)) {
                            echo '<b>Successfully configured database 👍🏼!</b><br/>';
                            echo '<a href="../index.php"><h2>You may now use the project as intended</h2><a/>';
                        } else {
                            echo '<b>Failed to configure tables 👎🏼!</b><br/>' . mysqli_error($connection);
                        }
                    } else { // if database doesnt exist
                        echo '<b>Database does not exist 👎🏼</b><br/>';

                        echo 'Creating database with name ' . $database . ' ...<br/>';

                        if ($createDatabase) { // if new database created
                            echo '<b>Database created 👍🏼.</b><br/>';

                            if ($selectDatabase) { // if database exists
                                echo '<b>Database with name "' . $database . '" selected 👍🏼!</b><br/>';
                            } else {
                                echo '<b>Database with name "' . $database . '" could not be selected 👎🏼</b><br/>';
                                echo '<h2>Press "Setup Project" again</h2>';
                            }
                        } else {
                            echo '<b>Failed to create database 👎🏼</b><br/> ' . mysqli_error($connection) . '<br/>';
                        }
                    }
                }
            }
            ?>
        </p>
    </div>
</body>

</html>
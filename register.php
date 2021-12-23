<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <?php include_once('helper/user.php'); ?>
</head>

<body>
    <?php
    include 'helper/header.php';
    ?>

    <div class="centerForm">
        <form method="post">
            <h1>Register</h1>
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="password" name="password" id="password" placeholder="Password">
            <input type="password" name="repeatPassword" id="repeatPassword" placeholder="Repeat password">
            <input type="submit" value="Register">
            <p>
                <?php
                if (!empty($_POST)) {
                    if (!empty($_POST['username'])) {
                        $username = htmlspecialchars($_POST['username']);

                        if (!empty($_POST['password']) && !empty($_POST['repeatPassword'])) {
                            if ($_POST['password'] == $_POST['repeatPassword']) {
                                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                                $user = new User($username, $password, '', true);
                            } else {
                                echo 'Password does not match.';
                            }
                        } else {
                            echo 'Password cannot be empty.';
                        }
                    } else {
                        echo 'Username cannot be empty.';
                    }
                }
                ?></p>
        </form>
    </div>
</body>

</html>
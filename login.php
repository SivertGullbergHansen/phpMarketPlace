<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include_once('helper/external.php'); ?>
    <?php include_once('helper/user.php'); ?>
</head>

<body>
    <?php
    include 'helper/header.php';
    ?>

    <div class="centerForm">
        <form method="post">
            <h1>Login</h1>
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="password" name="password" id="password" placeholder="Password">
            <input type="submit" value="Login">
            <a href="forgotPassword.php">Forgot password?</a>
            <p>
                <?php
                if (!empty($_POST)) {
                    if (!empty($_POST['username']))
                        $username = htmlspecialchars($_POST['username']);
                    if (!empty($_POST['password'])) {
                        $user = new User($username, $_POST['password']);
                    }
                }
                ?></p>
        </form>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <?php include_once('helper/external.php'); ?>
</head>

<body>
    <?php
    include 'helper/header.php';
    ?>
    <div class="centerForm">
        <form method="post">
            <h1>Forgot your password?</h1>
            <p>Insert your e-mail below to reset your password.</p>
            <input type="text" name="email" id="email" placeholder="Your E-mail">
            <input type="button" value="Request password reset">
        </form>
    </div>
</body>

</html>
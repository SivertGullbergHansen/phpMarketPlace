<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse</title>
    <?php include_once('helper/external.php'); ?>
</head>

<body>
    <?php
    include 'helper/header.php';
    ?>
    <?php
    if (!isset($_SESSION["user_id"])) {
        Header('Location: login.php');
    }
    ?>

    <div class="myAccount">
        <nav>
            <h1>Welcome, <span><?php echo $_SESSION['username']; ?></span>!</h1>
            <div>
                <button class="active">Profile</button>
                <button>Inventory</button>
                <button>History</button>
            </div>
        </nav>
        <div>
            <h2>Profile</h2>
        </div>
    </div>
</body>

</html>
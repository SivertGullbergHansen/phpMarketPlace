<header>
    <!-- <a href="index.php"><img src="img/logo.png" alt="Logo of the website"></a> -->
    <a class="logoTitle" href="index.php">Marketplace</a>
    <a href="browse.php">Browse</a>
    <input type="text" name="search" id="search" placeholder="Search">
    <?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION["user_id"]))
        echo "<div id='logBtn'><p id='playerCurrency'>0</p><a href='account.php' id='playerName'>" . $_SESSION['username'] . "</a><a href='logout.php'>Logout</a></div>";
    else
        echo "<div id='logBtn'><a href='login.php'>Login</a><a href='register.php'>Register</a></div>";
    ?>
</header>
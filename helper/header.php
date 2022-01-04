<header>
    <!-- <a href="index.php"><img src="img/logo.png" alt="Logo of the website"></a> -->
    <a class="logoTitle" href="index.php">Marketplace</a>
    <a href="browse.php">Browse</a>
    <?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION["user_id"])) {
        echo "<input type='text' name='search' id='search' placeholder='Search'><div id='logBtn'><p id='playerCurrency'>" . $_SESSION['userCurrency'] . "</p><a href='account.php' id='playerName'>" . $_SESSION['username'] . "</a><a href='logout.php'>Logout</a></div>";
        echo "<div class='alert'><p>This is a <b>demo</b>.</p></div>";
    } else
        echo "<div id='logBtn'><a href='login.php'>Login</a><a href='register.php'>Register</a></div>";
    ?>

    <script>
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        if (document.getElementById('playerCurrency'))
            document.getElementById('playerCurrency').innerHTML = numberWithCommas(document.getElementById('playerCurrency').innerHTML);
    </script>
</header>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="js/scrollToTop.js" defer></script>
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

    <div class="sideBar">
        <form method="post">
            <h1>Filters</h1>
            <div class="minMaxPrice">
                <h2>Price</h2>
                <input min="0" type="number" name="minPrice" id="minPrice" placeholder="Minimum">
                <span>~</span>
                <input min="0" type="number" name="maxPrice" id="maxPrice" placeholder="Maximum">
            </div>
            <div class="resultAmount">
                <h2>Item count</h2>
                <select name="itemCount" id="itemCount">
                    <option value="24" selected>24</option>
                    <option value="48">48</option>
                    <option value="96">96</option>
                    <option value="inf">Infinite scrolling</option>
                </select>
            </div>
            <input type="submit" value="Apply">
        </form>
    </div>

    <div id="itemBrowser">
        <?php
        function createItem($itemID, $imageURL, $itemRarity, $itemName, $price)
        {
            echo ("
            <article itemid=$itemID onclick='viewItem(this)'>
            <img src='$imageURL' alt='An image of the item called $itemName'>
            <h1>$itemName</h1>
            <h2 rarity=$itemRarity></h2>
            <h3>$price</h3>
            <button>Purchase</button>
            </article>");
        }

        // Generate random data
        for ($i = 0; $i < 24; $i++) {
            $randomID = random_int(0, 9);
            $randomRarity = random_int(1, 8);
            $randomName = random_int(0, 19);
            switch ($randomName) {
                case 0:
                    $randomName = 'Nell Mason';
                    break;
                case 1:
                    $randomName = 'Eugene Stevenson';
                    break;
                case 2:
                    $randomName = 'May Soto';
                    break;
                case 3:
                    $randomName = 'Hannah Lambert';
                    break;
                case 4:
                    $randomName = 'Darrell Roy';
                    break;
                case 5:
                    $randomName = 'Luke Nunez';
                    break;
                case 6:
                    $randomName = 'Susie Lynch';
                    break;
                case 7:
                    $randomName = 'Hallie Becker';
                    break;
                case 8:
                    $randomName = 'Jon Richardson';
                    break;
                case 9:
                    $randomName = 'Wesley Huff';
                    break;
                case 10:
                    $randomName = 'Elizabeth Swanson';
                    break;
                case 11:
                    $randomName = 'Clyde Fitzgerald';
                    break;
                case 12:
                    $randomName = 'Harry French';
                    break;
                case 13:
                    $randomName = 'Eleanor Valdez';
                    break;
                case 14:
                    $randomName = 'Lenora Holloway';
                    break;
                case 15:
                    $randomName = 'Darrell Lopez';
                    break;
                case 16:
                    $randomName = 'Cornelia Campbell';
                    break;
                case 17:
                    $randomName = 'Dean Lopez';
                    break;
                case 18:
                    $randomName = 'Elmer Massey';
                    break;
                case 19:
                    $randomName = 'Ricky Waters';
                    break;

                default:
                    $randomName = '';
                    break;
            }
            createItem($randomID, 'img/items/' . $randomID . '.png', $randomRarity, $randomName, random_int(300, 12000));
        }

        ?>
    </div>

    <div class="pagination"><button class="hidden">&lt;</button><button>&gt;</button></div>
</body>

</html>
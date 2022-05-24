<html>
<?php
session_start();
header("Cache-Control", "no-cache, no-store, must-revalidate");

if (!isset($_SESSION['sessionId'])) {
    header("Location: login.php");
}

?>

<head>
    <link rel="stylesheet" href="./styleUsers.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/dc3c949304.js" crossorigin="anonymous"></script>
</head>

<body>

    <h2>Add Item</h2>

    <div class="formContainer">
        <form method="POST">

            <label>Item Name : </label>
            <input type="text" name="itemName" class="MedName" required />

            <label>Item Price : </label>
            <input type="text" name="itemPrice" class="MedName" required />
            <br />

            <button type="submit" name="add" class="button-7">Add</button>

        </form>

    </div>

    <?php
    require '../connection.php';

    if (isset($_POST['add'])) {
        $name = $_POST['itemName'];
        $price = $_POST['itemPrice'];

        $result = $con->query("INSERT INTO `items`(`name`, `price`) VALUES ('$name','$price')");

        header("Location: /lenovo-shop/admin/ViewItems.php");
    }
    ?>

    <nav class="main-menu">
        <ul>

            <li>
                <a href="./ViewUsers.php">
                    <i class="fa fa-solid fa-users fa-2x"></i>
                    <span class="nav-text">
                        Users
                    </span>
                </a>


            </li>
            <li class="has-subnav">
                <a href="./ViewRequests.php">
                    <i class="fa fa-solid fa-paper-plane fa-2x"></i>
                    <span class="nav-text">
                        Requests
                    </span>
                </a>

            </li>

            <li>
                <a href="./ViewItems.php">
                    <i class="fa fa-info fa-2x"></i>
                    <span class="nav-text">
                        Items
                    </span>
                </a>
            </li>
        </ul>

        <ul class="logout">
            <li>
                <a href="./logout.php">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </nav>

</body>

</html>
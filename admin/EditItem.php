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
    <h2>Edit Item</h2>

    <?php
    require '../connection.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM items WHERE id=" . $id;
    $users_result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $no_of_users = mysqli_num_rows($users_result);

    while ($row = $users_result->fetch_assoc()) {

    ?>

        <div class="formContainer">
            <form method="POST">

                <label>id : </label>
                <input disabled type="text" name="id" class="firstname" value="<?= $row['id'] ?>" />
                <br><br>

                <label>Name : </label>
                <input type="text" name="name" class="firstname" value="<?= $row['name'] ?>" />
                <br><br>

                <label>Price : </label>
                <input type="text" name="price" class="firstname" value="<?= $row['price'] ?>" />
                <br><br>

                <button type="submit" name="edit" class="button-7">Edit</button>

            </form>

        </div>



    <?php
    }

    if (isset($_POST['edit'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];

        $result = $con->query("UPDATE `items` SET `name`='$name',`price`='$price' WHERE id=$id ;");

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
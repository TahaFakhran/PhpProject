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
    <h2>Edit Users</h2>

    <?php
    require '../connection.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id=" . $id;
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

                <label>Email : </label>
                <input type="text" name="email" class="firstname" value="<?= $row['email'] ?>" />
                <br><br>

                <label>Password : </label>
                <input disabled type="text" name="password" class="firstname" value="<?= $row['password'] ?>" />
                <br><br>

                <label>Contact : </label>
                <input type="text" name="contact" class="firstname" value="<?= $row['contact'] ?>" />
                <br><br>

                <label>City : </label>
                <input type="text" name="city" class="firstname" value="<?= $row['city'] ?>" />
                <br><br>

                <label>Address : </label>
                <input type="text" name="address" class="firstname" value="<?= $row['address'] ?>" />
                <br><br>

                <button type="submit" name="edit" class="button-7">Edit</button>

            </form>

        </div>



    <?php
    }

    if (isset($_POST['edit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $city = $_POST['city'];
        $address = $_POST['address'];

        $result = $con->query("UPDATE `users` SET `name`='$name',`email`='$email',`contact`='$contact',`city`='$city',`address`='$address' WHERE id= $id ;");

        header("Location: /lenovo-shop/admin/ViewUsers.php");
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
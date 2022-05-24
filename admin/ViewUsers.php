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
    <div class="area">

        <h2>Users</h2>
        <div class="table-wrapper">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Contact</th>
                        <th scope="col">City</th>
                        <th scope="col">Address</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    require '../connection.php';

                    $sql = "SELECT * FROM users";
                    $users_result = mysqli_query($con, $sql) or die(mysqli_error($con));
                    $no_of_users = mysqli_num_rows($users_result);



                    while ($row = mysqli_fetch_array($users_result)) {

                    ?>
                        <tr>
                            <th scope="col"><?php echo $row["id"] ?></th>
                            <th scope="row"><?php echo $row["name"] ?></th>
                            <th scope="row"><?php echo $row["email"] ?></th>
                            <th scope="row"><?php echo $row["password"] ?></th>
                            <td scope="row"><?php echo $row["contact"] ?></td>
                            <td scope="row"><?php echo $row["city"] ?></td>
                            <td scope="row"><?php echo $row["address"] ?></td>
                            <td>
                                <?php $path = "/lenovo-shop/admin/EditUser.php?id=" .  $row['id'] ?>
                                <a href='<?= $path ?>'><button type="button" class="btn btn-outline-primary">edit</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                <tbody>
            </table>
        </div>
    </div>

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
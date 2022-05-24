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

        <h2>Requests</h2>
        <div class="table-wrapper">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User name</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    require '../connection.php';

                    $sql = "SELECT ui.id , u.name as 'username', i.name as 'item_name', ui.status FROM `users_items` ui INNER JOIN users u on u.id=ui.user_id INNER JOIN items i on i.id=ui.item_id;";
                    $users_result = mysqli_query($con, $sql) or die(mysqli_error($con));
                    $no_of_users = mysqli_num_rows($users_result);



                    while ($row = mysqli_fetch_array($users_result)) {

                    ?>
                        <tr>
                            <th scope="col"><?php echo $row["id"] ?></th>
                            <th scope="row"><?php echo $row["username"] ?></th>
                            <th scope="row"><?php echo $row["item_name"] ?></th>
                            <th scope="row"><?php echo $row["status"] ?></th>
                            <th scope="row">
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                                    <input type="submit" value="Delete" name="delete" />
                                </form>
                            </th>
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

<?php
if (isset($_POST['delete'])) {
    $did = $_POST['id'];
    $result = $con->query("DELETE FROM `users_items` WHERE id=$did ;");

    echo ("<meta http-equiv='refresh' content='1'>");
}
?>

</html>
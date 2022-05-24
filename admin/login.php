<?php

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once 'functions.php';

    if (emptyInputLogin($username, $password) !== false) {
        header(("location: /lenovo-shop/admin/loginForm.php?error=emptyinput"));
        exit();
    }

    loginUser($conn, $username, $password);
} else {

    header("location: /lenovo-shop/admin/loginForm.php");
}

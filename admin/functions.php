<?php

function emptyInputLogin($username, $password)
{

  if (empty($username) || empty($password)) {
    $result = true;
  } else {

    $result = false;
  }

  return $result;
}

function loginUser($conn, $username, $password)
{

  session_start();
  if ($username == "admin" && $password == "admin") {

    $_SESSION['sessionId'] = session_id();

    header("location: /lenovo-shop/admin/ViewUsers.php");
  } else {

    header("location: /lenovo-shop/admin/loginForm.php?error=wronglogin");
    exit();
  }
}

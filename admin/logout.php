<?php

session_start();
session_unset();
session_destroy();
header("location: /lenovo-shop/admin/login.php");
exit();

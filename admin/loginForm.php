<!DOCTYPE html>
<?php

header("Cache-Control", "no-cache, no-store, must-revalidate");
?>
<html>

<head>

  <title>Dawini | Login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./styleLogin.css">

</head>

<body>

  <div class="center">
    <h1>Lenovo Store</h1>
    <form action="login.php" method="POST" autocomplete="off">
      <div class="inputbox">
        <input type="text" name="username" id="username" required="required">
        <span>Username</span>
      </div>
      <div class="inputbox">
        <input type="password" name="password" id="password" required="required">
        <span>Password</span>
      </div>
      <div class="inputbox">
        <input type="submit" name="submit" id="login" value="Submit">
      </div>
    </form>
  </div>


  <?php

  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<p> Fill in all fields </p>";
    } elseif ($_GET["error"] == "wronglogin") {
      echo  "<p>Incorrect login information </p>";
    }
  }


  ?>


</body>


</html>
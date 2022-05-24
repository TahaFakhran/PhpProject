<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/LenovoLogl.png" />
        <title>Lenovo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
           <?php
            require 'header.php';
           ?>
           <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1>Find a laptop that's perfect for you.</h1>
                       <p>Stylish outside. Savage Inside</p>
                       <a href="products.php" class="btn btn-warning">Shop Now</a>
                   </div>
                   </center>
               </div>
           </div>
           <div class="container">
               <div class="row">
                   <div class="col-xs-4">
                       <div  class="thumbnail">
                           <a href="products.php">
                                <img src="img/LenovoGaming.jpg" alt="LenovoGaming">
                           </a>
                           <center>
                                <div class="caption">
                                        <p id="autoResize">For Gaming</p>
                                        <p>Giving you the best gaming experience.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php">
                               <img src="img/LenovoHome.jpg" alt="LenovoHome">
                           </a>
                           <center>
                                <div class="caption">
                                    <p id="autoResize">For Home</p>
                                    <p>Best personal laptops available here.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php">
                               <img src="img/LenovoWork.jpg" alt="LenovoWork">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">For Work</p>
                                   <p>Helping you work remotely.</p>
                               </div>
                           </center>
                       </div>
                   </div>
               </div>
           </div>
            <br><br> <br><br><br><br>
           <footer class="footer"> 
               <div class="container">
               <center>
                   <p>Copyright &copy Lenovo Store. All Rights Reserved.</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
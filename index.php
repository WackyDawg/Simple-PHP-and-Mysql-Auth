<?php
session_start();

include("database/connection.php");
include("functions/functions.php");
$user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles.css" />
  </head>
  <body>
    <nav>
      <h1><a href="/">Ninja Smoothies</a></h1>
      <ul>
      <?php if(isset($_SESSION['user_id'])): ?>
        <li>Welcome, <?php echo $user_data['user_name']; ?></li>
        <li><a href="functions/logout.php">Log out</a></li>
      <?php else: ?>
        <li><a href="login.php">Log in</a></li>
        <li><a href="signup.php" class="btn">Sign up</a></li>
      <?php endif; ?>
      </ul>
    </nav>

    <header>
      <div class="smoothie">
        <img src="assets/img/smoothies/smoothie.png" alt="" />
      </div>
      <div class="headings">
        <h2>Smoothie Recipes</h2>
        <h3>By Ninjas For Ninjas</h3>
        <a href="smoothies.php" class="btn">View Recipes</a>
      </div>
    </header>

    <footer>Copyright 2020 Ninja Smoothies</footer>
  </body>
</html>

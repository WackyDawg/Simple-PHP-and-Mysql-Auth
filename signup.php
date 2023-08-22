<?php
session_start();

include("database/connection.php");
include("functions/functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  /**
   * 
   Data was Posted
   */
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];

  if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
   /**
    * Save To Database
    */
    $user_id = random_num(20);
    $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

    mysqli_query($con, $query);

    header("Location: index.php");
    die;
  }else{
        echo "please enter some valid information";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles.css" />
  </head>
  <body style=" margin: 0; /* Remove default body margin */
  padding: 0; /* Remove default body padding */ width: 100%;
  height: 100vh;
  background-image: url('assets/img/914968.jpg'); background-repeat: no-repeat; 
  background-size: cover; 
  background-position: center center;">

    <nav>
      <h1><a href="index.php">Ninja Smoothies</a></h1>
      <ul>
        <li><a href="login.php">Log in</a></li>
        <li><a href="signup.php" class="btn">Sign up</a></li>
      </ul>
    </nav>

<form method="post">
    <h2>Sign up</h2>
    <label for="email">Email</label>
    <input type="text" name="user_name" required />
    <div class="email error"></div>
    <label for="password">Password</label>
    <input type="password" name="password" required />
    <div class="password error"></div>
    <button>Sign up</button>
  </form>

  <footer>Copyright 2020 Ninja Smoothies</footer>
</body>
</html>
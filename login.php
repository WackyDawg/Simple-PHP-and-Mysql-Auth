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
    * Read From  Database
    */
    $query = "select * from users where user_name = '$user_name' limit 1";

    $result = mysqli_query($con, $query);
   
    if($result){
      if($result && mysqli_num_rows($result) > 0){

        $user_data = mysqli_fetch_assoc($result);
        if($user_data['password'] === $password ){
          $_SESSION['user_id'] = $user_data['user_id'];
          header("Location: index.php");
          die;
        }

      }
    }
    echo "<div class=\"email error\">wrong Username or Password</div>";

  }else{
    echo "<div class=\"email error\">wrong Username or Password</div>";
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
        
        <li><a href="signup.php" class="btn">Sign up</a></li>
      </ul>
    </nav>

    <form  method="post">
      <h2>Login</h2>
      <label for="user_name">Email or Username</label>
      <input type="text" name="user_name" />
      <div class="email error"></div>
      <label for="password">Password</label>
      <input type="password" name="password" />
      <div class="password error"></div>
      <button>login</button>
    </form>

    <footer>Copyright 2020 Ninja Smoothies</footer>
  </body>
</html>


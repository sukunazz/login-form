<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login_form</title>
  <link rel="stylesheet" href="style.css">

</head>

<body class="body1">
  
  <div class="container">
    
    <?php
    include('config.php');
    if(isset($_POST['submit'])){
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']);
      $result =  mysqli_query($conn,"SELECT * from users1 WHERE Email='$email' AND Password='$password'")or die("Select Error");
      $row = mysqli_fetch_assoc($result);

    if(is_array($row) && !empty($row) ) {
      $_SESSION['valid'] = $row['Email'];
      $_SESSION['username' ] = $row['Username'];
      $_SESSION['age'] = $row['Age'];
      $_SESSION['id'] = $row['Id'];
    }
    else{
      echo "<div class=' '><p>Wrong Username or Password</p></div><br>";
      echo "<a href='index.php'><button class='button'>Go back</button></a>";
    }}
      if(isset($_SESSION['valid'])){
        header("Location: home.php");
        exit();
      }
     
      else{
        ?>
    <header>Login</header>
    <form action="" method="post">
      <div class="field-input">
        <input type="text" name="email" id="email">
        <label for="email">Email:</label>
      </div>
      <div class="field-input">
        <input type="password" name="password" id="password">
        <label for="password">Password:</label>
      </div>
      <div class="field-input">
        <input type="submit" class="button" name="submit" value="Login">
      </div>
    </div>
    <div class="links">
      <div>Don't have an account?
        <a href="signup.php">Sign up now</a>
      </div>
    </form>
    <?php }?>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="stylesheet" href="style.css">
</head>

<body class="body1">
  <div class="container">
  <header>Signup</header>
  
  
      <form action="" method="post">
      <?php
      include("config.php");
      if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $password = $_POST['password'];
        $verify_query = mysqli_query($conn,"SELECT Email from users1 WHERE Email='$email'");
        if(mysqli_num_rows($verify_query) != 0){
          echo "<div class='message'><p>This email is used try another one please</p></div><br>";
          echo "<a href='javascript:self.history.back()'><button class='button'>Go Back</button>";
        }
        else{
          mysqli_query($conn,"INSERT INTO users1(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')")or die('error occured');
          echo "<div class='message'><p>Registration Succesfull</p></div><br>";
          echo "<a href='index.php'><button class='button'>Login</button></a>";
        }
      }else{
      ?>
      <div class="field-input">
        <input type="text" name="username" id="username">
        <label for="username">Username:</label>

      </div>
      <div class="field-input">
        <input type="email" name="email" id="email">
        <label for="email">Email:</label>

      </div>
      <div class="field-input">
        <input type="age" name="age" id="age">
        <label for="age">Age:</label>

      </div>
      <div class="field-input">
        <input type="password" name="password" id="password">
        <label for="password">Password:</label>

      </div>
      <div>
        <input type="submit" class="button" name="submit" value="Sign up">
      </div>

    </form>
    <?php } ?>
  </div>
  <div class="links">
    Already a member?<a href="index.php">LogIn</a>
  </div>
  
</body>

</html>
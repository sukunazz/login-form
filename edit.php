<?php
session_start();
include("config.php");

// Debugging


if (!isset($_SESSION['valid'])) {
  
  header("Location: index.php");
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change profile</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style2.css">
</head>

<body class="body1">
  <div class="header--nav">
    <div class="header--pic">
      <a href="home.php"><img src="baken.png" alt="" srcset="" data-version-number='3' class="header--pic--logo"></a>
    </div>


    <div class="header--features">
      <ul class="header--link">
        <li class="link--items">
          <a href="#section--1" class="link">Features</a>
        </li>
        <li class="link--items">
          <a href="#section--2" class="link">Operations</a>

        </li>
        <li class="link--items">
          <a href="#section--3" class="link">Testimonials</a>
        </li>
        <div class="header--profile">
          <a href="#">Change profile</a>
          <a href="logout.php"><button class="header--features--btn">Log out</button></a>
        </div>

      </ul>


    </div>
  </div>
  <div class="container">
  <?php
      if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        
        $id = $_SESSION['id'];
        $edit_query = mysqli_query($conn,"UPDATE users1 SET Username='$email',Email='$email',Age='$age' WHERE Id='$id'")or die("error occured");
        if($edit_query){
          echo "<div class='message'><p>Profile Updated</p></div><br>";
          echo "<a href='home.php'><button class='button'>Go home</button></a>"; 
        }}else{
          $id = $_SESSION['id'];
          $query = mysqli_query($conn, "SELECT*FROM users1 WHERE Id=$id");
          while($result = mysqli_fetch_assoc($query) ){
            $res_Uname = $result['Username'];
            $res_Email = $result['Email'];
            $res_Age = $result['Age'];
        }
        ?>
    <header>Change Profile</header>

  <form action="" method="post">


      <div class="field-input">
        <input type="text" name="username" id="username" value="<?php echo $res_Uname ?>">
        <label for="username">Username:</label>

      </div>
      <div class="field-input">
        <input type="email" name="email" id="email" value="<?php echo $res_Email ?>">
        <label for="email">Email:</label>

      </div>
      <div class="field-input">
        <input type="age" name="age" id="age" value="<?php echo $res_Age ?>">
        <label for="age">Age:</label>

      </div>

      <div>
      <input type="submit" class="button" name="submit" value="Update">
      </div>
    </form>
    <?php } ?>
    </div>
</body>

</html>
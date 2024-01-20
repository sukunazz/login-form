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
  <title>Bankers</title>
  <link rel="stylesheet" href="style2.css">
  <script defer src="script.js"></script>
</head>

<body class="body2">

  <header class="header">
    <div class="header--nav">
      <div class="header--pic">
        <img src="baken.png" alt="" srcset="" data-version-number='3' class="header--pic--logo">
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
            </ul>
            
            <div class="themast">
            <?php
         $id = $_SESSION['id'];
         $query = mysqli_query($conn, "SELECT * FROM users1 WHERE Id=$id");
         
         while($result = mysqli_fetch_assoc($query)){
         $res_Uname = $result['Username'];
         $res_Email = $result['Email'];
         $res_Age = $result['Age'];
         $res_id = $result['Id'];
         }
        echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
         ?>
            
            <a href="logout.php"><button class="header--features--btn">Log out</button></a>
           
            </div>
            <form class="themast" action="delete.php" method="post"
            onsubmit="return confirm('Are you sure you want to delete your profile?');">
        <input type="hidden" name="user_id" value="<?php echo $res_id; ?>">
        <button type="submit" class=" header--features--btn">Delete Profile</button>
      </form>
          </div>
       


      </div>
      <div class="user">
        <input type="text" name="username" id="username" value="<?php echo $res_Uname ?>">
      </div>
    
    <div class="header--functionality">
      <div class="header--functionality--description">
        <div class="header--functionality--description-h1">
          <h1 class="h1">When <span class="h1--banking">banking</span> meets <br> <span
              class="h1--minimalist">minimalist</span>
          </h1>
        </div>
        <span class="header--functionality--description-h2">
          <h4> A simpler banking experience for a simple life</h4>
        </span>
        <div class="header--functionality--description--learnmore">
          <button class="scroll-btn">Learn more ↓</button>
        </div>
      </div>
      <div class="header--functionality--pictures">
        <img src="haha.png" alt="" class="pictures--hari">
      </div>

    </div>


  </header>


  <div class="section section--1 " id="section--1">
    <div class="section--1--head">
      <h2 class="section--1--head--features">Features</h2>
      <h3 class="section--1--head--description">Everything you need in a modern bank and more</h3>
    </div>
    <div class="section--1--in1">
      <div class="section--1--side1">
        <img src="lazy-computer.png" data-src="computer.jpg" alt="" class="section--1--in1--pic lazy--img">
      </div>
      <div class="section--1--side2">
        <img src="computer--logo.png" alt="" class="computer--logo">
        <p class="description--1">
        <h3 class="description--1--h3">
          100% digital bank
        </h3>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus fugit pariatur tempore modi. At optio,
        doloremque velit fuga omnis possimus earum molestiae est fugiat laborum ex similique consequuntur et sapiente!
        </p>

      </div>
    </div>
    <div class="section--1--in1">

      <div class="section--1--side2">
        <img src="money-logo.png" alt="" class="computer--logo">
        <p class="description--1">
        <h3 class="description--1--h3">
          Watch your money grow
        </h3>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus fugit pariatur tempore modi. At optio,
        doloremque velit fuga omnis possimus earum molestiae est fugiat laborum ex similique consequuntur et sapiente!
        </p>

      </div>
      <div class="section--1--side1">
        <img src="lazy--moneyplant.png" data-src="money-pant.jpg" alt="" class="section--1--in1--pic lazy--img">
      </div>
    </div>
    <div class="section--1--in1">
      <div class="section--1--side1">
        <img src="lazy--laptop.png" data-src="jj.jpg" alt="" class="section--1--in1--pic lazy--img">
      </div>

      <div class="section--1--side2">
        <img src="jj-1.png"" class=" computer--logo">
        <p class="description--1">
        <h3 class="description--1--h3">
          100% digital bank
        </h3>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus fugit pariatur tempore modi. At optio,
        doloremque velit fuga omnis possimus earum molestiae est fugiat laborum ex similique consequuntur et sapiente!
        </p>

      </div>
    </div>


  </div>
  <div class=" section section--2 " id="section--2">
    <div class="section--2--headers">
      <h3 class="section--2--h3">
        OPERATIONS
      </h3>
      <h1 class="section--2--h1">
        Everything as simple as possible, but no simpler.
      </h1>
    </div>
    <div class="section--2--btns">
      <button class="btn section--2--btn1  " data-tab="1">01 Instant Transfers</button>
      <button class="btn section--2--btn2 " data-tab="2"="">02 Instant Loans</button>
      <button class="btn section--2--btn3 " data-tab="3">03 Instant closing</button>
    </div>
    <div class="operations">


      <div class=" operation-contents section--2--descriptions--1 operation-content--active" data-tab="1">

        <img src="download.png" alt="" class="section--2--descriptions--img">
        <div class="section--2--descriptions--in">
          <h3 class="description--2--header">
            Tranfser money to anyone, instantly! No fees, no BS.
          </h3>
          <p class="section--2--lorem">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo
            consequat.
          </p>
        </div>
      </div>
      <div class="operation-contents section--2--descriptions--2 operation-content--active " data-tab="2">
        <img src="home.png" alt="" class="section--2--descriptions--img">
        <div class="section--2--descriptions--in">
          <h3 class="description--2--header">
            Buy a home or make your dreams come true, with instant loans.
          </h3>
          <p class="section--2--lorem">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo
            consequat.
          </p>
        </div>
      </div>
      <div class=" operation-contents section--2--descriptions--3 operation-content--active" data-tab="3">
        <img src="user (1).png" alt="" class="section--2--descriptions--img">
        <div class="section--2--descriptions--in">
          <h3 class="description--2--header">
            No longer need your account? No problem! Close it instantly.
          </h3>
          <p class="section--2--lorem">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo
            consequat.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="section section--3" id="section--3">
    <div class="section--3--headers">
      <h3 class="section--3--h3">
        Not sure yet?
      </h3>
      <h1 class="section--3--h1">
        Millions of Bankists are already making their lifes simpler.
      </h1>
    </div>

    <div class="slider">
      <div class="slide slide--1">
        <img src="logo--drawing.png" class="slide--logo" alt="">
        <div class="slide--1 testimonials">
          <div class="testimonials--header">
            Best financial decision ever!
          </div>
          <div class="testimonials--text">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium quas quisquam non? Quas voluptate
            nulla minima deleniti optio ullam nesciunt, numquam corporis et asperiores laboriosam sunt, praesentium
            suscipit blanditiis. Necessitatibus id alias reiciendis, perferendis facere pariatur dolore veniam autem
            esse non voluptatem saepe provident nihil molestiae.
          </div>
          <div class="testimonials--author">
            <img src="author--1.jpg" alt="" class="testimonials--author--pic">
            <div class="testimonials--info">
              <h6 class="testimonials--h6">Aarav Lynn</h6>
              <p class="testimonials--p">San Francisco, USA</p>
            </div>

          </div>
        </div>
      </div>
      <div class="slide slide--2">
        <img src="logo--drawing.png" class="slide--logo" alt="">
        <div class="slide--1 testimonials">
          <div class="testimonials--header">
            Best financial decision ever!
          </div>
          <div class="testimonials--text">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium quas quisquam non? Quas voluptate
            nulla minima deleniti optio ullam nesciunt, numquam corporis et asperiores laboriosam sunt, praesentium
            suscipit blanditiis. Necessitatibus id alias reiciendis, perferendis facere pariatur dolore veniam autem
            esse non voluptatem saepe provident nihil molestiae.
          </div>
          <div class="testimonials--author">
            <img src="author--1.jpg" alt="" class="testimonials--author--pic">
            <div class="testimonials--info">
              <h6 class="testimonials--h6">Aarav Lynn</h6>
              <p class="testimonials--p">San Francisco, USA</p>
            </div>

          </div>
        </div>
      </div>
      <div class="slide slide--3" ">
        <img src=" logo--drawing.png" class="slide--logo" alt="">
        <div class=" slide--1 testimonials">
          <div class="testimonials--header">
            Best financial decision ever!
          </div>
          <div class="testimonials--text">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium quas quisquam non? Quas voluptate
            nulla minima deleniti optio ullam nesciunt, numquam corporis et asperiores laboriosam sunt, praesentium
            suscipit blanditiis. Necessitatibus id alias reiciendis, perferendis facere pariatur dolore veniam autem
            esse non voluptatem saepe provident nihil molestiae.
          </div>
          <div class="testimonials--author">
            <img src="author--1.jpg" alt="" class="testimonials--author--pic">
            <div class="testimonials--info">
              <h6 class="testimonials--h6">Aarav Lynn</h6>
              <p class="testimonials--p">San Francisco, USA</p>
            </div>

          </div>
        </div>
      </div>
      <button class=" section--3--btn section--3--btn--right">→</button>
      <button class=" section--3--btn section--3--btn--left">←</button>
      <div class="dots"></div>
    </div>

  </div>
  <footer>

  </footer>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | RAAHAT</title>
    <link rel="stylesheet" href="style.css" class="stlesheet">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    
   <!-- navbar section  -->

    <nav class="navbar">
        <div class="max-width">
            <div class="logo">
                <a href="../../index.html">R<span>AA</span>H<span>A</span>T</a>
            </div>
            <ul class="menu">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="./index.php">Feed</a></li>
                <li><a href="../how-it-works/">How it works?</a></li>
                <li><a href="../profile/index.php">Profile</a></li>
                
                <?php 
                    if(!isset($_SESSION['auth_user'])){
                ?>
                    <li><a href="#">SignIn/SignUp</a></li>
                <?php } else { ?>
                <!-- <li><a href="#">SignOut</a></li> -->
                <form action="code.php" method="POST">
                  <button type="submit" name="logout_btn" class="dropdown-item">SignOut</button>
                <?php } ?>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <div class="space">

    </div>

    <main>
        <div class="box">
          <div class="inner-box">
            <div class="forms-wrap">
              <form action="code.php" method="post" autocomplete="off" class="sign-in-form">
                <div class="logo">
                  <!-- <img src="./img/logo.png" alt="" /> -->
                  <h4>RAAHAT</h4>
                </div>
  
                <div class="heading">
                  <h2>Welcome Back</h2>
                  <h6>Not registred yet?</h6>
                  <a href="#" class="toggle">Sign up</a>
                </div>
  
                <div class="actual-form">
                  <div class="input-wrap">
                    <input type="email" minlength="4" class="input-field" autocomplete="off" name="email" required />
                    <label>Email Id</label>
                  </div>
  
                  <div class="input-wrap">
                    <input type="password" minlength="4" class="input-field" autocomplete="off" name="pass" required />
                    <label>Password</label>
                  </div>
  
                  <input type="submit" value="Sign In" name="login_btn" class="sign-btn" />
  
                  <p class="text">
                    Forgotten your password or you login datails?
                    <a href="#">Get help</a> signing in.
                  </p>
                </div>
              </form>
  
              <form action="code.php" method="post" class="sign-up-form">
                <div class="logo">
                  <!-- <img src="./img/logo.png" alt="" /> -->
                  <h4>RAAHAT</h4>
                </div>
  
                <div class="heading">
                  <h2>Get Started</h2>
                  <h6>Already have an account?</h6>
                  <a href="#" class="toggle">Sign in</a>
                </div>
  
                <div class="actual-form">
                  <div class="input-wrap">
                    <input type="text" minlength="4" class="input-field" autocomplete="off" name="name" required />
                    <label>Name</label>
                  </div>

                  <div class="input-wrap">
                    <input type="email" class="input-field" autocomplete="off" name="email" required />
                    <label>Email</label>
                  </div>

                  <div class="input-wrap">
                    <input type="tel" class="input-field" autocomplete="off" name="phone" required />
                    <label>Phone No.</label>
                  </div>
  
                  <div class="input-wrap">
                    <input type="password" minlength="4" class="input-field" autocomplete="off" name="pass"  required/>
                    <label>Password</label>
                  </div>
  
                  <input type="submit" value="Sign Up" name="signup-btn" class="sign-btn" />
  
                  <p class="text">
                    By signing up, I agree to the
                    <a href="#">Terms of Services</a> and
                    <a href="#">Privacy Policy</a>.
                  </p>
                </div>
              </form>
            </div>
  
            <div class="carousel">
              <div class="images-wrapper">
                <img src="./img/image1.png" class="image img-1 show" alt="" />
                <img src="./img/image2.png" class="image img-2" alt="" />
                <img src="./img/image3.png" class="image img-3" alt="" />
              </div>
  
              <div class="text-slider">
                <div class="text-wrap">
                  <div class="text-group">
                    <h2>Find the right information.</h2>
                    <h2>Help each other.</h2>
                    <h2>Stay Home! Stay Safe!</h2>
                  </div>
                </div>
  
                <div class="bullets">
                  <span class="active" data-value="1"></span>
                  <span data-value="2"></span>
                  <span data-value="3"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
  

    <script src="script.js"></script>
</body>
</html>
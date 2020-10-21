<?php
session_start();
include_once("tourismdatabase.php");
extract($_POST);
if(isset($submit))
{
	$query = "SELECT id FROM user WHERE `email` = ? AND `password` = ?";
	$statement = $conn->prepare($query);
	$statement->bindValue(1, $email);
	$statement->bindValue(2, $password);
	if(!$statement->execute()){
		echo "QUERY FAILED : Error -> " . json_encode($statement->errorMsg());
		return;
	}
	$result = $statement->fetch(PDO::FETCH_COLUMN);
	if(!$result){ ?>
		<center><p class="w3-center w3-text-red">Invalid user name or password please try again</p><center>
	<?php 
	return;
	}

		$_SESSION["UserId"] = $result;
	header("Location: login.php");

	
}			
?>

<!doctype html>
<html lang="en">

  <head>
    <title>Tourism Project&mdash; Website Template by Dev Team</title>
    <!-- Project icon -->
    <link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.html" class="font-weight-bold">
                  <img src="images/logo.png" alt="Image" class="img-fluid">
                </a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active">
                  <a href="index.php" class="nav-link">Home</a></li>
                  <li><a href="contact.html" >Contact us</a></li>
                  <li><a href="signup.php" class="nav-link">Signup</a>
				          <li><a href="signin.php" class="nav-link">Signin</a>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-5" data-aos="fade-up">
              <h1 class="mb-3 text-white">Log in</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta veritatis in tenetur doloremque, maiores doloribus officia iste. Dolores.</p>
              
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-12">
            <div class="heading-39101 mb-5">
              <span class="backdrop text-center">LOG IN</span>
              <span class="subtitle-39191">LOG IN</span>
              <h3>LOG IN</h3>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-8 mb-5 " >
            <form method="Post">
              <div class="form-group row">
                <div class="col-md-12">
				
                  <input type="email" class="form-control" placeholder="Email address" name="email" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
              </div>
			  
              <div class="form-group row justify-content-center">
                <div class="col-md-6">

                  <input type="submit" name="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="submit" >
				  <p>New User? <a href="signup.php">Register Here</a></p>

                </div>
              </div>
            </form>
          </div>
        

      </div>
        
      </div>
    </div>

    <footer class="site-footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h2 class="footer-heading mb-3">SOCIAL MEDIA</h2>
            <div class="row">
              <div class="social_29128 mt-5">
                <a href="#"><span class="icon-facebook"></span></a>  
                <a href="#"><span class="icon-instagram"></span></a>  
                <a href="#"><span class="icon-twitter"></span></a> 
              </div>
            </div>
          </div>
          <div class="col-lg-8 ml-auto">
            
              <div class="col-lg-12">
                <h2 class="footer-heading mb-4">Newsletter</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt odio iure animi ullam quam, deleniti rem!</p>
                <form action="#" class="d-flex" class="subscribe">
                  <input type="text" class="form-control mr-3" placeholder="Email">
                  <input type="Button" value="Send" class="btn btn-primary">
                </form>
              </div>
              
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by Dev Team
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>





<?php
include_once("tourismdatabase.php");
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['UserId'])){
    $session=$_SESSION['UserId'];

    $query ="SELECT userId FROM user_profile WHERE id=$session ";
    $statement=$conn->prepare($query);

	if(!$statement->execute()){

		echo "QUERY FAILED : Error -> " . json_encode($statement->errorMsg());
		return;
	}
	else{
     $result=$statement->fetch(PDO::FETCH_COLUMN);

    $query ="SELECT tourId FROM tour WHERE userId=$result ";
    $statement=$conn->prepare($query);
    if(!$statement->execute()){
        echo "QUERY FAILED : Error -> " . json_encode($statement->errorMsg());
        return;
    }
        $results=$statement->fetchAll(PDO::FETCH_COLUMN);


        


        
?>
    


    <!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <title>Tourism Project&mdash; Website Template by Dev Team</title>
    <!-- Project icon -->
    <link rel="icon" type="image/png" sizes="32x32" href="plugins/images/logo.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a href="index.html" class="font-weight-bold">
                        <img src="plugins/images/logo.png" alt="Image" class="w-25 m-2 ml-5">
                      </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ml-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block mr-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <a class="profile-pic" href="logout.php">
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium">Logout</span></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admindashboard.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="bookedtrips.php"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">View booked Trips</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="viewcustomers.php"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">View Customers</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Update Profile</span>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14"> Admin Dashboard</h4>
                    </div>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- RECENT SALES -->
            <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0 ">Recent sales</h3>
                               
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                               
<thead>
    <tr>
        <th>Tour Id</th>
        <th>Place Name</th>
        <th>User Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Seats</th>
        
    </tr>
</thead>
<tbody>
<?php
foreach($results as $result)
{
        $query1 ="SELECT bookId FROM booking WHERE tourId=$result ";
    $statement1=$conn->prepare($query1);
    if(!$statement1->execute()){
        echo "QUERY FAILED : Error -> " . json_encode($statement1->errorMsg());
        return;
    }
        $resultset=$statement1->fetchALL(PDO::FETCH_COLUMN);
        
foreach($resultset as $bookid)
{
        $query2 ="SELECT userId FROM booking WHERE bookId=$bookid ";
    $statement2=$conn->prepare($query2);
    if(!$statement2->execute()){
        echo "QUERY FAILED : Error -> " . json_encode($statement2->errorMsg());
        return;
    }
        $userid=$statement2->fetchAll(PDO::FETCH_COLUMN);
foreach($userid as $info)
{
        $query2 ="SELECT userId,firstName,lastName FROM user_profile WHERE userId=$info ";
    $statement2=$conn->prepare($query2);
    if(!$statement2->execute()){
        echo "QUERY FAILED : Error -> " . json_encode($statement2->errorMsg());
        return;
    }
        $userid=$statement2->fetchAll(PDO::FETCH_ASSOC);

        
        
            //getting tour id

            $query3 ="SELECT tourId FROM booking WHERE bookId=$bookid ";
    $statement3=$conn->prepare($query3);
    if(!$statement3->execute()){
        echo "QUERY FAILED : Error -> " . json_encode($statement3->errorMsg());
        return;
    }
        $tourid=$statement3->fetchAll(PDO::FETCH_COLUMN);


foreach($tourid as $tinfo)
{
        $query4 ="SELECT tourId,placeName FROM tour WHERE tourId=$tinfo ";
    $statement4=$conn->prepare($query4);
    if(!$statement4->execute()){
        echo "QUERY FAILED : Error -> " . json_encode($statement4->errorMsg());
        return;
    }
        $touridresult=$statement4->fetchAll(PDO::FETCH_ASSOC);

        ?>
        
        <tbody>
        <?php
        foreach($touridresult as $userinfo)
           {
               ?>
            <tr>
            <td><?php echo $userinfo['tourId']?></td>
            <td><?php echo $userinfo['placeName']?></td>



        <?php
        foreach($userid as $user)
           {
               ?>
            <td><?php echo $user['userId']?></td>
            <td><?php echo $user['firstName']?></td>
            <td><?php echo $user['lastName']?></td>

           
            <?php
           }?>
        <td><?php $query5 ="SELECT seats FROM booking WHERE bookId=$bookid ";
        $statement5=$conn->prepare($query5);
        if(!$statement5->execute()){
            echo "QUERY FAILED : Error -> " . json_encode($statement5->errorMsg());
            return;
        }
            $seats=$statement5->fetch(PDO::FETCH_COLUMN);
            echo $seats;?>
         </tr><?php
           }
                  
        }
    }
 }
    
        }
}
        
?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">  <p>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fas fa-heart text-danger" aria-hidden="true"></i> by Dev Team
                </p>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="plugins/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>

<?php
}
    
?>

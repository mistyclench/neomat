<?php
  ob_start();
  session_start();

  if(isset($_POST['logOutButton'])){
    session_destroy();
    header('Location:index.php');
  }

  function showTitle(){
    require 'myConnection.php';
	$con = $_SESSION['con'];
    $sql="SELECT company_name FROM company";
    $result=mysqli_query($con,$sql);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
    $row=mysqli_fetch_array($result);
    $companyName=$row['company_name'];

    echo $companyName;
  }
  	function showUserName(){
		$con = $_SESSION['con'];
		$id=$_SESSION['id'];
		$sql="SELECT employee_name FROM accounts WHERE account_id='$id'";
		$result=mysqli_query($con,$sql);
		if (!$result) {
		    die('Invalid query: ' . mysqli_error());
		}
		$row=mysqli_fetch_array($result);
		$var=$row['employee_name'];
		echo $var;
	}
  function showLogOutButton(){
    if(isset($_SESSION['id'])){
      echo '<input type="button" class="btn btn-sm btn-danger" role="button" style="width:100%;" id="signOutButton" value="Log Out" onClick="logOut();" /></p>';
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="img/favicon_1.ico">


        <!-- Google-Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:100,300,400,600,700,900,400italic' rel='stylesheet'>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/morris/morris.css">

        <!-- sweet alerts -->
        <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62751496-1', 'auto');
  ga('send', 'pageview');

</script>

    </head>


    <body>
  <div class="hiddenDiv">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <input type="submit" id="logOutButton" name="logOutButton"> 
    </form>
  </div>

        <!-- Aside Start-->
        <aside class="left-panel">

            <!-- brand -->
            <div class="logo">
                <a href="dashboard.php" class="logo-expanded">
                    <img src="img/single-logo.png" alt="logo">
                    <span class="nav-label">NEOMAT</span>
                </a>
            </div>
            <!-- / brand -->
        
            <!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">
                    <li class="active"><a href="dashboard.php"><i class="ion-home"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li><a href="salePOS.php"><i class="ion-cash"></i> <span class="nav-label">Sell</span></a>
                    </li>
                    <li><a href="returnPOS.php"><i class="ion-paper-airplane"></i> <span class="nav-label">Return</span></a>
                    </li>
                    <li><a href="productsPOS.php"><i class="ion-bag"></i> <span class="nav-label">Products</span></a>
                    </li>
					<li><a href="customersPOS.php"><i class="ion-person-stalker"></i> <span class="nav-label">Customers</span></a>
                    </li>
                    <li><a href="supplyPOS.php"><i class="fa fa-truck"></i> <span class="nav-label">Suppliers</span></a>
                    </li>
                    <li><a href="billPOS.php"><i class="fa fa-bank"></i> <span class="nav-label">Bills</span></a>
                    </li>
                    <li><a href="stockPOS.php"><i class="ion-clipboard"></i> <span class="nav-label">Stocks</span></a>
                    </li>
						<?php
						if(isset($_SESSION['id'])){
						require 'myConnection.php';
						$id=$_SESSION['id'];
						$sql="SELECT is_admin FROM accounts WHERE account_id='$id'";
						$result=mysqli_query($con,$sql);
						if (!$result) {
						die('Invalid query: ' . mysqli_error());
						}
						$row=mysqli_fetch_array($result);

							if($row['is_admin']==='1'){
							echo'                    
                    <li><a href="reportPOS.php"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports</span></a>
                    </li>
                    <li><a href="#"><i class="ion-ios7-pulse"></i> <span class="nav-label">User Accounts</span></a>
                    </li>
                    <li><a href="#"><i class="ion-settings"></i> <span class="nav-label">Company Settings</span></a>
                    </li>';
							}else if($row['is_admin']==='2'){
							echo'
                    <li><a href="reportPOS.php"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports</span></a>
                    </li>
                    <li><a href="#"><i class="ion-ios7-pulse"></i> <span class="nav-label">User Accounts</span></a>
                    </li>';
							}else if($row['is_admin']==='3'){
							echo'
                    <li><a href="reportPOS.php"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports</span></a>
                    </li>
                    <li><a href="#"><i class="ion-ios7-pulse"></i> <span class="nav-label">User Accounts</span></a>
                    </li>';
							}
					}
					?>
                </ul>
            </nav>

        </aside>
        <!-- Aside Ends -->

        <!--Main Content Start -->
        <section class="content">
            
            <!-- Header -->
            <header class="top-head container-fluid">
                <button type="button" class="navbar-toggle pull-left">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <!-- Search -->
                <form role="search" class="navbar-left app-search pull-left hidden-xs">
                  <input type="text" placeholder="Search..." class="form-control">
                </form>
                
            
                <!-- Right navbar -->
                <ul class="list-inline navbar-right top-menu top-right-menu">  
                    <!-- Notification -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge badge-sm up bg-pink count">3</span>
                        </a>
                        <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5002">
                            <li class="noti-header">
                                <p>Notifications</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="pull-left"><i class="fa fa-user-plus fa-2x text-info"></i></span>
                                    <span>New user registered<br><small class="text-muted">5 minutes ago</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="pull-left"><i class="fa fa-diamond fa-2x text-primary"></i></span>
                                    <span>Use animate.css<br><small class="text-muted">5 minutes ago</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="pull-left"><i class="fa fa-bell-o fa-2x text-danger"></i></span>
                                    <span>Send project demo files to client<br><small class="text-muted">1 hour ago</small></span>
                                </a>
                            </li>
                            
                            <li>
                                <p><a href="#" class="text-right">See all notifications</a></p>
                            </li>
                        </ul>
                    </li>
                    <!-- /Notification -->

                    <!-- user login dropdown start-->
                    <li class="dropdown text-center">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="img/avatar-2.jpg" class="img-circle profile-img thumb-sm">
                            <span class="username"><?php showUserName(); ?> </span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu extended pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                            <li><a href="profile.html"><i class="fa fa-briefcase"></i>Profile</a></li>
                            <li><?php showLogOutButton(); ?></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->       
                </ul>
                <!-- End right navbar -->

            <!-- Footer Start -->
            <footer class="footer">
                2017 © WebTeq.
            </footer>
            <!-- Footer Ends -->



        </section>
        <!-- Main Content Ends -->
        


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="assets/chat/moment-2.2.1.js"></script>

        <!-- Counter-up -->
        <script src="js/waypoints.min.js" type="text/javascript"></script>
        <script src="js/jquery.counterup.min.js" type="text/javascript"></script>

        <!-- EASY PIE CHART JS -->
        <script src="assets/easypie-chart/easypiechart.min.js"></script>
        <script src="assets/easypie-chart/jquery.easypiechart.min.js"></script>
        <script src="assets/easypie-chart/example.js"></script>


        <!--C3 Chart-->
        <script src="assets/c3-chart/d3.v3.min.js"></script>
        <script src="assets/c3-chart/c3.js"></script>

        <!--Morris Chart-->
        <script src="assets/morris/morris.min.js"></script>
        <script src="assets/morris/raphael.min.js"></script>

        <!-- sparkline --> 
        <script src="assets/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/sparkline-chart/chart-sparkline.js" type="text/javascript"></script> 

        <!-- sweet alerts -->
        <script src="assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="assets/sweet-alert/sweet-alert.init.js"></script>

        <script src="js/jquery.app.js"></script>
        <!-- Chat -->
        <script src="js/jquery.chat.js"></script>
        <!-- Dashboard -->
        <script src="js/jquery.dashboard.js"></script>

        <!-- Todo -->
        <script src="js/jquery.todo.js"></script>

  <script type="text/javascript" src="js/myscripts.js"></script>

        <script type="text/javascript">
        /* ==============================================
             Counter Up
             =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
    

    </body>

</html>

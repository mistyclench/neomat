<?php
	ob_start();
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="img/favicon_1.ico">

        <title>Neomat| Login</title>

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
  <script type="text/javascript" src="js/myscripts.js"></script>

    </head>


    <body>

        <div class="wrapper-page animated fadeInDown">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading"> 
                   <h3 class="text-center m-t-10"> Sign In to <strong>NeoMat</strong> </h3>
                </div> 

                <form class="form-horizontal m-t-40" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                            
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group ">
                        
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <label class="cr-styled">
                                <input type="checkbox" checked>
                                <i class="fa"></i> 
                                Remember me
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group text-right">
                        <div class="col-xs-12">
                            <button class="btn btn-purple w-md" type="submit" name="submit" value="Log In">Log In</button>
                        </div>
                    </div>
                    <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            <a href="recoverpw.html"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>

           <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
            

        <!--common script for all pages-->
        <script src="js/jquery.app.js"></script>

    
    </body>

</html>
<?php
	require 'myConnection.php';

	if(isset($_SESSION['id'])){
		$id=$_SESSION['id'];
		$sql="SELECT * FROM accounts WHERE account_id='$id'";
		$result=mysqli_query($con,$sql);
		if (!$result) {
		    die('Invalid query: ' . mysqli_error());
		}
		if(mysqli_num_rows($result)){
			header('Location: dashboard.php');
		}
	}

	$sql="SELECT company_name FROM company";
	$result=mysqli_query($con,$sql);
	if (!$result) {
	    die('Invalid query: ' . mysqli_error());
	}
	$row=mysqli_fetch_array($result);
	$companyName=$row['company_name'];

	echo"
	<script>
		setTitle('$companyName');
	</script>";

	if(isset($_POST['submit'])){
		$username=$_POST['username'];
		$password=$_POST['password'];

		$sql="SELECT * FROM accounts WHERE employee_name='$username' AND password='$password'";
		$result=mysqli_query($con,$sql);
		if (!$result) {
		    die('Invalid query: ' . mysqli_error());
		}
		if(mysqli_num_rows($result)){
			$row=mysqli_fetch_array($result);
			//echo $row['account_id'];
			$_SESSION['id']=$row['account_id'];
			header('Location: dashboard.php');
		}else{
			session_destroy();
			echo"
			<script>
			alert('Username or password incorrect.');			
			window.location.href='login.php';
			</script>";	
		}
	}
?>

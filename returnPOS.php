<?php
	ob_start();
	require 'POStest.php';	
	require 'loginCheck.php';

?>


<!Doctype html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="img/favicon_1.ico">

        <title>Return</title>

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

<title>Welcome</title>
</head>

<body>
            <div class="wraper container-fluid">
             <div class="panel panel-default">
             <br />

            <p>
			<div id="returnDiv">			
				<div style="display:inline-block;width:59%;vertical-align: top">	
                     <div class="input-group">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-effect-ripple btn-primary"><i class="fa fa-search"></i></button>
                        </span>

					<input autocomplete="off" class="form-control" id="invoiceId" name="invoiceId" placeholder="Enter Bill Number and select a type on the left." required="" type="text"> 
					</div>
				</div>
				<div style="display:inline-block;width:30%;vertical-align: top">
					<select class="form-control" id="type" name="type"> 
						<option value="0">Please select an option.</option>
						<option value="1">Return product</option>
						<option value="2">Show previous</option>
					</select>
				</div>
				<div style="display:inline-block;width:9%;vertical-align: top">	
				    <div class="col-md-3">
					<input class="btn btn-sm btn-info" type="button" onclick="showBillProducts();" value="CHECK"> 
				</div>
				</p>
				<br />
                <br />

				<div id="productsDiv"></div>

		    	<div id="rightDiv">
				</div>
			</div>
			</body>
</html>

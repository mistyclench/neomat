<?php
    ob_start();
    require 'POStest.php';  
	require 'loginCheck.php';

?>


<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

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

        <!-- Plugins css -->
        <link href="assets/toggles/toggles.css" rel="stylesheet" />
        <link href="assets/modal-effect/css/component.css" rel="stylesheet">
        <link href="assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />


        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />

        <title>Reports</title>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

    </head>


    <body>
            <div class=" report">
             <div class="panel panel-default">

<div id="reportDiv">
    <div id="reportTitle">
     <div class="panel-heading"><strong><b> Report Query</b></strong></div>
    </div>
    <br/>
		<form action="/pos/reports.php" method="post">
  			<p><label><b>Starting Date:</b> </label>                               
                                <div class="input-group">
                                    <input type="text" name:"startingDate" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div></p><!-- input-group -->
                              

        <p><label><b>Ending Date:</b> </label>                               
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-multiple">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div></p><!-- input-group -->

  			<p><b>Report on:</b><br/>
  			<select id="reportType" name="reportType" class="form-control">
  				<option value="sales">Sales</option>
  				<option value="stocks">Stocks</option>
          <option value="customer">Customer</option>
          <option value="performance">Performance</option>
          <option value="appraisal" id="employeeAppraisal">Appraisal</option>
  			</select>
  			</p>

  			<p>
  			<input type="button" value="Show Report" onclick="checkReport();" class="btn btn-info btn-sm">
        <input type="reset" value="Reset" class="btn btn-danger btn-sm">
        <a href="javascript:history.back()" class="btn btn-warning btn-sm">Back</a>
  			<input type="submit" name="reportSubmit" id="reportSubmit" style="display:none">
  			</p>
    	</form>
      </div>
	</div>


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>


        <script src="assets/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="assets/timepicker/bootstrap-datepicker.js"></script>

        <script>
            jQuery(document).ready(function() {
                    

                // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });
            });
        </script>
        <script>
$(document).ready(function(){
    $("#customer").click(function(){
        $("#customers").toggle();

        $("#employeeAppraisal").click(function(){
        $("#appraisal").toggle();
    });
});
</script>

    </body>

</html>

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

        <title>WELCOME</title>

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

</head>

<body>
            <div class="wraper container-fluid">
                <div class="page-title"> 
                    <h3 class="title">Welcome! <?php showUserName(); ?></h3> 
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="portlet"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    Weekly Sales Report
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet1"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet1" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div id="morris-bar-example"  style="height: 320px;"></div>

                                    <div class="row text-center m-t-30 m-b-30">
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>$ 126</h4>
                                            <small class="text-muted"> Today's Sales</small>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>$ 967</h4>
                                            <small class="text-muted">This Week's Sales</small>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>$ 4500</h4>
                                            <small class="text-muted">This Month's Sales</small>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>$ 87,000</h4>
                                            <small class="text-muted">This Year's Sales</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /Portlet -->
                        <div class="portlet"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    Calendar
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet2" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div id="morris-line-example" style="height: 200px;"></div>
                                    <div class="row text-center m-t-30">

                            </div>
                                </div>
                            </div>
                        </div> <!-- /Portlet -->

                    </div> <!-- end col -->

                    <div class="col-lg-6">
                        <div class="portlet"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    Yearly Sales Report
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet2" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div id="morris-line-example" style="height: 200px;"></div>
                                    <div class="row text-center m-t-30">
                                <div class="col-sm-4">
                                    <h4>$ 86,956</h4>
                                    <small class="text-muted"> This Year's Report</small>
                                </div>
                                <div class="col-sm-4">
                                    <h4>$ 86,69</h4>
                                    <small class="text-muted">Weekly Sales Report</small>
                                </div>
                                <div class="col-sm-4">
                                    <h4>$ 948,16</h4>
                                    <small class="text-muted">Yearly Sales Report</small>
                                </div>

                            </div>
                                </div>
                            </div>
                        </div> <!-- /Portlet -->
                        <div class="tile-stats white-bg"> 
                        <div class="portlet"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    Weekly Sales Report
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet1"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet1" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div id="morris-bar-example"  style="height: 320px;"></div>

                                    <div class="row text-center m-t-30 m-b-30">
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>$ 126</h4>
                                            <small class="text-muted"> Today's Sales</small>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>$ 967</h4>
                                            <small class="text-muted">This Week's Sales</small>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>$ 4500</h4>
                                            <small class="text-muted">This Month's Sales</small>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>$ 87,000</h4>
                                            <small class="text-muted">This Year's Sales</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /Portlet -->

                    </div> <!-- end col -->


                </div> 
                <!-- End row -->
</div>


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

        <!-- Dashboard -->
        <script src="js/jquery.dashboard.js"></script>

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



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
        <link href="assets/modal-effect/css/component.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />

        <title>Supply</title>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

    </head>


    <body>
            <div class="wraper container-fluid">
                       <div class="panel panel-color panel-success">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Suppliers</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <label class="cr-styled">
                                                        <input type="checkbox">
                                                        <i class="fa"></i> 
                                                        </label>
                                                    </th>
                                                    <th>Supplier ID</th>
                                                    <th>Supplier name</th>
                                                    <th>Supplier phone</th>
                                                    <th>Supplier address</th>
                                                    <th>Payment</th>
                                                    <th>Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                         <hr>
                        <div id="rightDiv">
                        <form action="#" method="post">
                        <button type="button" class="btn btn-danger btn-sm">Delete</button>
                        <a href="javascript:;" class="md-trigger btn btn-info btn-sm" data-modal="modal-7">Add supplier</a>

                        </form>
                        </div>
                            </div>
                        </div>
                        </div>
                              <div class="md-modal md-effect-7" id="modal-7">
                                <div class="md-content">
                        <div class="panel panel-default">
                                      <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">×</button>
                          <div class="panel-heading"><h3 class="panel-title">Add a supplier</h3></div>
                           <div class="panel-body">
                                <form class="form-horizontal" role="form">
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Supplier ID</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="supplier_ID" placeholder="Supplier ID">
                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Supplier name</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="supplierName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Supplier phone</label>
                                        <div class="col-sm-9">
                                          <input type="phone" class="form-control" id="phoneNumber" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Supplier address</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="address" placeholder="Address">
                                        </div>
                                    </div>
                                    <br>
                                    </form>
                                             <div class="modal-footer">
                                              <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                    </div>
                                </div>
                       
                    </div>
                    </div>
                                  <div class="md-overlay"></div>

        <!-- Modal-Effect -->
        <script src="assets/modal-effect/js/classie.js"></script>
        <script src="assets/modal-effect/js/modalEffects.js"></script>

    </body>

</html>



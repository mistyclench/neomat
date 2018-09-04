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

        <title>Stocks</title>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

    </head>


    <body>
            <div class="wraper container-fluid">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Stocks</h3>
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
                                                    <th>Stock No.</th>
                                                    <th>Supplier ID</th>
                                                    <th>Product ID</th>
                                                    <th>Product Name</th>
                                                    <th>Unit Price</th>
                                                    <th>Product Size</th>
                                                    <th>Supply Quantity</th>
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
                        <a href="javascript:;" class="md-trigger btn btn-info btn-sm" data-modal="modal-7">Add stock</a>

                        </form>
                        </div>
                            </div>
                        </div>
                              <div class="md-modal md-effect-7" id="modal-7">
                                <div class="md-content">
                        <div class="panel panel-default">
                                      <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">×</button>
                          <div class="panel-heading"><h3 class="panel-title">Add stocks</h3></div>
                           <div class="panel-body">
                           <br />
                                <form class="form-horizontal" role="form">
                        <div class="panel-group panel-group-joined" id="accordion-test"> 
                            <div class="panel panel-default"> 
                                <div class="panel-heading"> 
                                    <h4 class="panel-title"> 
                                        <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne">
                                            Supply details
                                        </a> 
                                    </h4> 
                                </div> 
                                <div id="collapseOne" class="panel-collapse collapse in"> 
                                    <div class="panel-body">
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Stock No.</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="stockNo" placeholder="Stock No.">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Supplier ID</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="supplierID" placeholder="Supplier ID">
                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Product ID</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="productID" placeholder="Product ID">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Product Name</label>
                                        <div class="col-sm-9">
                                          <input type="phone" class="form-control" id="productName" placeholder="Product Name">
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                            <div class="panel panel-default"> 
                                <div class="panel-heading"> 
                                    <h4 class="panel-title"> 
                                        <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseTwo" class="collapsed">
                                            Product details
                                        </a> 
                                    </h4> 
                                </div> 
                                <div id="collapseTwo" class="panel-collapse collapse"> 
                                    <div class="panel-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Product Type</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="productType" placeholder="Product Type">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Product Category</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="productCategory" placeholder="Product Category">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Product Size</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="productSize" placeholder="Product Size">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Import Quantity</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="importQuantity" placeholder="Import Quantity">
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                            <div class="panel panel-default"> 
                                <div class="panel-heading"> 
                                    <h4 class="panel-title"> 
                                        <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseThree" class="collapsed">
                                            Transaction details
                                        </a> 
                                    </h4> 
                                </div> 
                                <div id="collapseThree" class="panel-collapse collapse"> 
                                    <div class="panel-body">
                                      <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Amount Paid</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="amountPaid" placeholder="Amount Paid">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Balance</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="balance" placeholder="Balance">
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </form>
                                    </div>
                                   <br>
                                             <div class="modal-footer">
                                              <button type="button" class="btn btn-primary">Add stock</button>
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



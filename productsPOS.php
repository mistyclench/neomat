<?php
	ob_start();
	require 'POStest.php';	
	require 'loginCheck.php';

		$sql="SELECT * FROM products JOIN stocks ON products.product_id=stocks.product_id WHERE stocks.is_deleted=0";
	$result=mysqli_query($con,$sql);
	if (!$result) {
	    die('Invalid query: ' . mysqli_error());
	}
	if(mysqli_num_rows($result)){
		echo "
            <div class='wraper container-fluid'>
                        <div class='panel panel-color panel-purple'>
                            <div class='panel-body'> 
                        <div class='panel panel-default'>
                            <div class='panel-heading'> 
                                <h3 class='panel-title'>Product List</h3> 
                            </div> 

                            <div class='panel-body'>
                                <div class='row'>
                                        <div class='table-responsive'>
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th>                                            
                                                       <label class='cr-styled'>
                                                        <input type='checkbox'>
                                                        <i class='fa'></i> 
                                                        </label>
                                                    </th>
                                                    <th>Product No.</th>
                                                    <th>Product Name</th>
                                                    <th>Product Type</th>
                                                    <th>Product Category</th>
                                                    <th>Size</th>
                                                    <th>Unit Price</th>
                                                    <th>Available quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											";
		while($row=mysqli_fetch_array($result)){			
			$productId=$row['product_id'];
			$productName=$row['product_name'];
			$productType=$row['product_type'];
			$productCategory=$row['product_category'];
			$productSize=$row['product_size'];
			$productPrice=$row['product_price'];

			if($productSize===""){
				$productSize="N/A";
			}
			$sql2="SELECT current_quantity FROM stocks WHERE product_id='$productId'";
			$result2=mysqli_query($con,$sql2);
			if (!$result2) {
				die('Invalid query: ' . mysqli_error());
			}
			$row2=mysqli_fetch_array($result2);
			$currentQuantity=$row2['current_quantity'];

			$sql2="SELECT type_name FROM types WHERE type_id='$productType'";
			$result2=mysqli_query($con,$sql2);
			if (!$result2) {
				die('Invalid query: ' . mysqli_error());
			}
			$row2=mysqli_fetch_array($result2);
			$productTypeName=$row2['type_name'];
			if($productTypeName===null)
				$productTypeName="N/A";

			$sql2="SELECT category_name FROM categories WHERE category_id='$productCategory'";
			$result2=mysqli_query($con,$sql2);
			if (!$result2) {
				die('Invalid query: ' . mysqli_error());
			}
			$row2=mysqli_fetch_array($result2);
			$productCategoryName=$row2['category_name'];
			if($productCategoryName===null)
				$productCategoryName="N/A";
			
			echo "
				<tr>
					<td><label class='cr-styled'>
                       <input type='checkbox'>
                       <i class='fa'></i> 
                       </label>
</td>
					<td>$productId</td>
					<td>$productName</td>
					<td>$productTypeName</td>
					<td>$productCategoryName</td>
					<td>$productSize</td>
					<td>GH₵$productPrice</td>
					<td>$currentQuantity</td>
				</tr>
			";
		}
		echo"
			</tbody>
		</table>
		    </div>
               </div>
               </div>
              </div>

		<div id='customerTotalText'>Please go to <a href='stocks.php'>stocks</a> page to import new product stock.</div>
		</div>
		";
	}else{
		echo "No products available currently.";
	}


?>


<!Doctype html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="img/favicon_1.ico">

        <title>Products</title>

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
                                            </tbody>
                                        </table>
                        <div id="rightDiv">
                        <form action="#" method="post">
                        <button type="button" class="btn btn-danger btn-sm">Delete</button>

                        </form>
                        </div>
                        </div>


            </div>
</body>
</html>

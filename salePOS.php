<?php
    ob_start();
    require 'POStest.php';  
	require 'loginCheck.php';

		if(isset($_SESSION['cart_item']))	
		$cartItem=$_SESSION['cart_item'];
	if(isset($_POST['cartSubmit'])){
		$customerName=$_POST['name'];
		$customerContact=$_POST['contact'];
		$employeeNo=$_SESSION['id'];

		//Selecting customer
		$sql="SELECT customer_id FROM customers WHERE customer_name='$customerName' AND customer_contact='$customerContact'";
		$result=mysqli_query($con,$sql);
		if (!$result) {
			die('Invalid query: ' . mysqli_error());
		}
		if(!mysqli_num_rows($result)){
			$sql="INSERT INTO customers (customer_name,customer_contact) VALUES ('$customerName','$customerContact')";
			$result=mysqli_query($con,$sql);
			if (!$result) {
				die('Invalid query: ' . mysqli_error());
			}
			$sql="SELECT customer_id FROM customers WHERE customer_name='$customerName' AND customer_contact='$customerContact'";
			$result=mysqli_query($con,$sql);
			if (!$result) {
				die('Invalid query: ' . mysqli_error());
			}

		}
		$row=mysqli_fetch_array($result);
		$customerId=$row['customer_id'];

		//Set current date and time
		$entryDate=date("Y-m-d H:i:s",time()-3600);
		//echo $entryDate;

		//Creating invoice
		$sql="INSERT INTO invoices (selling_date,customer_id,employee_no) VALUES ('$entryDate','$customerId','$employeeNo')";
		$result=mysqli_query($con,$sql);
		if (!$result) {
			die('Invalid query: ' . mysqli_error());
		}
		$sql="SELECT invoice_id FROM invoices WHERE selling_date='$entryDate'";
		$result=mysqli_query($con,$sql);
		if (!$result) {
			die('Invalid query: ' . mysqli_error());
		}
		$row=mysqli_fetch_array($result);
		$invoiceId=$row['invoice_id'];

		for($i=1;$i<=$cartItem;$i++){
			$x="productId".$i;
			$y="quantity".$i;
			$productId=$_SESSION[$x];
			$quantity=$_SESSION[$y];

			$sql="INSERT INTO sales (invoice_id,product_id,quantity) VALUES ('$invoiceId','$productId','$quantity')";
			$result=mysqli_query($con,$sql);
			if (!$result) {
				die('Invalid query: ' . mysqli_error());
			}

			$sql="SELECT current_quantity FROM stocks WHERE product_id='$productId'";
			$result=mysqli_query($con,$sql);
			if (!$result) {
				die('Invalid query: ' . mysqli_error());
			}
			$row=mysqli_fetch_array($result);
			$currentQuantity=$row['current_quantity'];

		
			$newQuantity=$currentQuantity-$quantity;

			//echo $currentQuantity."  ".$quantity."   ".$newQuantity."<br>";

			$sql="UPDATE stocks SET current_quantity='$newQuantity' WHERE product_id='$productId'";
			$result=mysqli_query($con,$sql);
			if (!$result) {
				die('Invalid query: ' . mysqli_error());
			}

		}
		echo "
		<script>
			
			document.location.href='sale.php';
		</script>
		";
		//header("Location: bill.php");
	}

	function showCartNum(){
		$_SESSION['cart_item']=0;
		$cartItem=$_SESSION['cart_item'];
		echo "<p id='itemNum'>Cart item(s): ".$cartItem."</p>";	
	}	

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

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />

        <title>New Sale</title>

		  <script type="text/javascript">
  //AJAX functions dynamic changes.
  	function showProducts(str) {
	  if (str=="") {
	    document.getElementById("txtHint").innerHTML="";
	    return;
	  } 
	  if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	      document.getElementById("productsDiv").innerHTML=xmlhttp.responseText;
	    }
	  }
	  xmlhttp.open("GET","getProducts.php?q="+str,true);
	  xmlhttp.send();
	}
  
  	function addProduct(quantity,productId) {
  	  //alert(quantity+" "+productId);
	  if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	      document.getElementById("itemNum").innerHTML=xmlhttp.responseText;
	      //$("#productName").val("");
	      document.getElementById("cartMessageDiv").innerHTML="Item added to cart. To edit cart, please click the reset button.";
	      showProducts($("#productName").val());

	    }	
	  }
	  xmlhttp.open("GET","addProduct.php?x="+quantity+"&y="+productId,true);
	  xmlhttp.send();
	}

	function showCart() {
  	  //alert("Hello");
	  if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	      document.getElementById("modalDiv").innerHTML=xmlhttp.responseText;
	    }
	  }
	  xmlhttp.open("GET","showCart.php",true);
	  xmlhttp.send();
	}

	function showReturnCash(x){
	  if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	      document.getElementById('returnCashTemp').innerHTML=xmlhttp.responseText;
	      var value = document.getElementById('temp').value;
	      returnAmount= xmlhttp.responseText;
	      minAmount=value-returnAmount;
	      document.getElementById('cash').placeholder="Enter the amount of cash given by the customer. Minimum: "+minAmount;
	      $("#returnCashTemp").val(x);

	    }
	  }
	  xmlhttp.open("GET","showReturnCash.php?x="+x,true);
	  xmlhttp.send();
	}

  </script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

    </head>


    <body>
            <div class="wraper container-fluid">
             <div class="panel panel-default">
             <br />
            <div id="salesDiv">
                <div class="col-md-7">
                     <div class="input-group">
                            <span class="input-group-btn">
                             <button type="button" class="btn btn-effect-ripple btn-primary"><i class="fa fa-search"></i></button>
                            </span>
				
				<input autocomplete="off" class="form-control" id="productName" name="productName" placeholder="Enter Product Name." required="" type="text" onclick="showSuggestions()" onkeyup="showProducts(this.value);"> 
				</div>
				</div>
				<div id="livesearch"></div>
				<div id="productsDiv"></div>
		    	<div id="cartMessageDiv"></div>
	   
		    	<div id="leftDiv">
		    	<b><p id="itemNum">Cart item(s): 0</p></b>
		    	</div>
<br />
				<div id="productsDiv"></div>

		    	<hr>
		    	<div id="rightDiv">
		    		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <a href="javascript:;" class="md-trigger btn btn-primary btn-sm" data-modal="modal-11" id="newStock" onclick="showCart();">Checkout</a>
						<input class="btn btn-sm btn-danger" type="button" value="Reset" onclick="location.reload();">
					</form>
				</div>

			</div>
                                        <div class="md-modal md-effect-11" id="modal-11">
                                <div class="md-content">
                                <div calss="panel panel-default">
                                <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">×</button>
                                <div class="panel-heading"><h3 class="panel-title">Current Cart</h3></div>
                    <table class="table table-responsive">
                    <thead>
                        <tr>
                            <td>Product ID</td>
                            <td>Product Name</td>
                            <td>Quantity</td>
                        </tr>
                    </thead>
                    <tbody>
            
                
                    </tbody>
                </table>
                <form class="form-inline" role="form">
                        <div class="form-group m-l-10">
                        <label class="col-md-3"> cash customer</label>
                        </div>
                        <div class="form-group m-l-10">
                            <div class="toggle toggle-default" id="customer"></div>
                        </div>
                        <div class="form-group m-l-10">
                        <label class="col-md-3">customer</label>
                        </div>
                         <br />
                </form>

                        <div>
                            <section id="customers">
                            <label>Name: </label><input type="text" name="name" id="name" required="" class="form-control" placeholder="Enter customer name here.">
                            <label>Phone: </label><input type="text" name="contact" id="contact" required="" class="form-control" placeholder="Enter customer contact number here.">
                            </section>                          
                            <label>Cash Given: </label><input type="text" name="cash" id="cash" required="" class="form-control" placeholder="Enter the amount of cash given by the customer.">
                                <form action="#" class="form-horizontal "><br/>
                                    <div class="row">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Discount percentage(%)</label><br/>
                                                <div class="col-md-3">
                                                    <div id="spinner1">
                                                        <div class="input-group input-small">
                                                            <input type="text" class="spinner-input form-control" maxlength="3" readonly>
                                                            <div class="spinner-buttons input-group-btn btn-group-vertical">
                                                                <button type="button" class="btn spinner-up btn-xs btn-default">
                                                                    <i class="fa fa-angle-up"></i>
                                                                </button>
                                                                <button type="button" class="btn spinner-down btn-xs btn-default">
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                        <label class="col-md-2 control-label">VAT</label>
                                                <div class="col-md-3 control-label">
                                                    <div class="toggle toggle-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                                        </div>
                        <div class="modal-footer">
                          <input type="button" class="btn btn-primary" value="Proceed" onclick="checkCart(1500);">
                        </div>
                             </div>
                                </div>
                            </div>
                                 <div class="md-overlay"></div>

                                 </div>
			</div>


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>


        <script src="assets/toggles/toggles.min.js"></script>
        <script type="text/javascript" src="assets/spinner/spinner.min.js"></script>



<script>
$(document).ready(function(){
    $("#customer").click(function(){
        $("#customers").toggle();
    });
});
</script>


        <script>
            jQuery(document).ready(function() {
                    
                // Form Toggles
                jQuery('.toggle').toggles({on: true});

                //spinner start
                $('#spinner1').spinner();

                // Form Toggles
                jQuery('.toggle').toggles({on: true});

            });
        </script>



        <!-- Modal-Effect -->
        <script src="assets/modal-effect/js/classie.js"></script>
        <script src="assets/modal-effect/js/modalEffects.js"></script>

    </body>

</html>



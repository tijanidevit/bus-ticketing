<?php 
	session_start();
	if (!isset($_SESSION['bus_user'])) {
		header('location: login');
		exit();
	}
	if (!isset($_GET['id'])) {
		header('location: ./');
		exit();
	}

	$id = $_GET['id'];

	include_once 'core/bookings.class.php';
	$booking_obj = new Bookings();

	$booking = $booking_obj->fetch_booking($id);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ticket</title>
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">
	<!-- Responsive -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	
</head>
<body>
	<div id="snippetContent"><link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script> <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"><div class="container bootstrap snippets bootdeys"><div class="row"><div class="col-sm-12"><div class="panel panel-default invoice" id="invoice"><div class="panel-body"><div class="invoice-ribbon"><div class="ribbon-inner">Paid</div></div><div class="row"><div class="col-sm-6 top-left">
		<img src="images/favicon.png">
	</div><div class="col-sm-6 top-right"><h3 class="marginright">INVOICE-<?php echo $booking['id'] ?></h3> <span class="marginright"><?php echo $booking['id'] ?></span></div></div><hr><div class="row">
		<div class="col-xs-6 to"><p class="lead marginbottom">To : <?php echo $booking['first_name']. ' '. $booking['last_name'] ?></p><!-- <p>425 Market Street</p><p>Suite 2200, San Francisco</p><p>California, 94105</p> --><p>Phone: <?php echo '081'.rand(12548907,99399199) ?></p><p>Email: <?php echo $booking['email'] ?></p></div><div class="col-xs-6 text-right payment-details"><p class="lead marginbottom payment-info">Payment details</p><p>Date: <?php echo $booking['booking_date'] ?></p><!-- <p>VAT: DK888-777</p> --><p>Total Amount: &#8358;<?php echo number_format($booking['amount'],2) ?></p><p>Account Name: Flatter</p></div></div><div class="row table-row"><table class="table table-striped"><thead><tr><th class="text-center" style="width:5%">#</th><th style="width:50%">Item</th><th class="text-right" style="width:15%">Quantity</th><th class="text-right" style="width:15%">Bus</th><th class="text-right" style="width:15%">Total Price</th></tr></thead><tbody><tr><td class="text-center">1</td><td>Flatter Theme</td><td class="text-right"><?php echo $booking['booked_seats'] ?></td><td class="text-right"><?php echo $booking['bus'] ?></td><td class="text-right">&#8358;<?php echo number_format($booking['amount'],2) ?></td></tr>

		</tbody></table></div>
		<div class="row"><div class="col-xs-6 margintop"><p class="lead marginbottom">THANK YOU!</p><button class="btn btn-success" id="invoice-print" onclick="print()"><i class="fa fa-print"></i> Print Invoice</button> </div></div>

	</div>


		</div></div></div></div><style type="text/css">body{margin-top:20px;
		background:#eee;
	}

	/*Invoice*/
	.invoice .top-left {
		font-size:65px;
		color:#3ba0ff;
	}

	.invoice .top-right {
		text-align:right;
		padding-right:20px;
	}

	.invoice .table-row {
		margin-left:-15px;
		margin-right:-15px;
		margin-top:25px;
	}

	.invoice .payment-info {
		font-weight:500;
	}

	.invoice .table-row .table>thead {
		border-top:1px solid #ddd;
	}

	.invoice .table-row .table>thead>tr>th {
		border-bottom:none;
	}

	.invoice .table>tbody>tr>td {
		padding:8px 20px;
	}

	.invoice .invoice-total {
		margin-right:-10px;
		font-size:16px;
	}

	.invoice .last-row {
		border-bottom:1px solid #ddd;
	}

	.invoice-ribbon {
		width:85px;
		height:88px;
		overflow:hidden;
		position:absolute;
		top:-1px;
		right:14px;
	}

	.ribbon-inner {
		text-align:center;
		-webkit-transform:rotate(45deg);
		-moz-transform:rotate(45deg);
		-ms-transform:rotate(45deg);
		-o-transform:rotate(45deg);
		position:relative;
		padding:7px 0;
		left:-5px;
		top:11px;
		width:120px;
		background-color:#66c591;
		font-size:15px;
		color:#fff;
	}

	.ribbon-inner:before,.ribbon-inner:after {
		content:"";
		position:absolute;
	}

	.ribbon-inner:before {
		left:0;
	}

	.ribbon-inner:after {
		right:0;
	}

	@media(max-width:575px) {
		.invoice .top-left,.invoice .top-right,.invoice .payment-details {
			text-align:center;
		}

		.invoice .from,.invoice .to,.invoice .payment-details {
			float:none;
			width:100%;
			text-align:center;
			margin-bottom:25px;
		}

		.invoice p.lead,.invoice .from p.lead,.invoice .to p.lead,.invoice .payment-details p.lead {
			font-size:22px;
		}

		.invoice .btn {
			margin-top:10px;
		}
	}

	@media print {
		.invoice {
			width:900px;
			height:800px;
		}
	}</style> 
	 </div>
</body>
</html>
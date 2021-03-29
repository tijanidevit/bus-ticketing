<?php 
	include_once 'core/destinations.class.php';
	$destination_obj = new Destinations();

	$destinations = $destination_obj->fetch_destinations();
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include 'includes/header-sources.php'; ?>
    <style type="text/css">
        #overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.9);
  z-index: 9999;
}

#overlay-content{
  position: absolute;
  top: 50%;
  left: 50%;
  color: #000;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
  border-radius: 5px
}
    </style>
</head>

<body>
    <div class="page-wrapper">

    <?php include 'includes/header.php'; ?>
        <!-- End Main Header -->
        <!-- Main Slider -->
        <section class="main-slider">
            <div class="banner-carousel">
                <!-- Swiper -->
                <div class="swiper-wrapper">
                    <div class="swiper-slide slide" style="background-image:url(images/main-slider/1.jpg)">
                        <div class="curve"></div>
                        <div class="auto-container">
                            <div class="content">
                                <div class="title">welcome to moveo</div>
                                <h2>Custom Built Exotic Limo & <br> Luxury Party Bus</h2>
                                <div class="btn-box">
                                    <a href="#" class="theme-btn btn-style-one"><span class="txt">View Our destinations</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slide" style="background-image:url(images/main-slider/1.jpg)">
                        <div class="curve"></div>
                        <div class="auto-container">
                            <div class="content">
                                <div class="title">welcome to moveo</div>
                                <h2>Custom Built Exotic Limo & <br> Luxury Party Bus</h2>
                                <div class="btn-box">
                                    <a href="#" class="theme-btn btn-style-one"><span class="txt">View Our Fleet</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slide" style="background-image:url(images/main-slider/1.jpg)">
                        <div class="curve"></div>
                        <div class="auto-container">
                            <div class="content">
                                <div class="title">welcome to moveo</div>
                                <h2>Custom Built Exotic Limo & <br> Luxury Party Bus</h2>
                                <div class="btn-box">
                                    <a href="#" class="theme-btn btn-style-one"><span class="txt">View Our Fleet</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>
        <!-- End Main Slider -->
        <!-- Fleet Section -->
        <section class="fleet-section" style="background-image: url(images/background/1.png)" id="fleet-section">
            <div class="auto-container" id="reserve">
                <!-- Sec Title -->
                <div class="sec-title centered">
                    <div class="title-inner">
                        <div class="rating">
                            <span class="star fa fa-star"></span>
                            <span class="star fa fa-star"></span>
                            <span class="star fa fa-star"></span>
                        </div>
                        <h2>Book your destination</h2>
                    </div>
                </div>
                <div class="row clearfix">
                    <!-- Form Column -->
                    <div class="form-column col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Fleet Form -->
                            <div class="fleet-form">
                            	<?php if (!isset($_SESSION['bus_user'])): ?>
                            		<div class="alert alert-info">Please <a href="login">Login</a> Before Booking Your destination</div>
                            	<?php endif ?>
                                <form method="post" id="booking-form" action="receipt.php">
                                    <div class="row clearfix">
                                        <!--Form Group-->
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label>Select destination</label>
                                            <select name="destination_id" id="destination_id" required="required">
                                                <option value>Select</option>
                                                <?php foreach ($destinations as $destination): ?>
                                                	<option value="<?php echo $destination['id'] ?>"><?php echo $destination['destination'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <span class="icon fas fa-map-marker-alt"></span>
                                        </div>
                                        <!--Form Group-->
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label>Select Time</label>
                                            <select name="take_off_time_id" id="take_off_time_id" required="required" >
                                                <option value="">Select</option>
                                            </select>
                                            <span class="icon far fa-clock"></span>
                                        </div>
                                        <!--Form Group-->
                                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                            <label>Type of Bus</label>
                                            <select name="bus_id" id="bus_id" class="">
                                                <option>Select</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label>Select Date</label>
                                            <input class="form-control" type="date" name="traveling_date" id="traveling_date" value="" required>
                                            <!-- <span class="icon far fa-calendar-alt"></span> -->
                                        </div>
                                        <!--Form Group-->
                                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                            <label>No. of Persons</label>
                                            <select name="seats" id="personsN" class="">
                                            	<option>Select</option>
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                                <option>04</option>
                                                <option>05</option>
                                            </select>
                                        </div>
                                        <!--Form Group-->
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label>Price (&#8358;)</label>
                                            <input type="text" name="amount" readonly id="amount" value="" required>
                                            <span class="icon far fa-dollars"></span>
                                        </div>
                                        <!--Form Group-->
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                                            <button id="payment-btn" class="theme-btn btn-style-two" name="submit-form">Book Now</button>
                                        </div>
                                        <div id="message" class="form-group col-md-4 col-sm-12 col-xs-12">
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Fleet Section -->
        <!-- Call To Action Section -->
        <section class="call-to-action-section" style="background-image: url(images/background/2.jpg)">
            <div class="auto-container">
                <div class="title-box">
                    <h2>We make your destinations memorable with friends, <br> family and coworkers to serve better</h2>
                    <div class="rating">
                        <span class="star fa fa-star"></span>
                        <span class="star fa fa-star"></span>
                        <span class="star fa fa-star"></span>
                    </div>
                </div>
                <div class="cars-image wow zoomIn" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <img src="images/resource/product-6.png" alt="" />
                    <img src="images/resource/product-6.png" alt="" />
                </div>
            </div>
        </section>
        <!-- End Call To Action Section -->
        <!-- Vehicle Section -->
        <section class="vehicle-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-column">
                            <!-- Title Box -->
                            <div class="title-box">
                                <div class="rating">
                                    <span class="star fa fa-star"></span>
                                    <span class="star fa fa-star"></span>
                                    <span class="star fa fa-star"></span>
                                </div>
                                <div class="title">Featured vehicle</div>
                                <h2>Cadillac 50 SUV</h2>
                                <div class="bold-text">Superior & luxury sedan - With quality and compatible rates</div>
                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</div>
                                <div class="features">Vehicle Features:</div>
                                <div class="row clearfix">
                                    <div class="column col-lg-6 col-md-6 col-sm-12">
                                        <ul class="list-style-one">
                                            <li>For Upto 8 Passengers</li>
                                            <li>Incredible Sound System</li>
                                            <li>Fiber Optic Lights</li>
                                            <li>Bar Area With Fridge</li>
                                        </ul>
                                    </div>
                                    <div class="column col-lg-6 col-md-6 col-sm-12">
                                        <ul class="list-style-one">
                                            <li>Tinted Windows</li>
                                            <li>Divider With Premium Style</li>
                                            <li>Multipurpose Designed Limo</li>
                                            <li>Chill Air Conditioning</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </d
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-column clearfix">
                            <div class="book-box" style="background-image: url(images/background/pattern-1.png)">
                                <div class="price">book for <span> 50 seats</span></div>
                            </div>
                            <div class="image">
                                <img src="images/resource/vehicle.jpg" alt="" />
                            </div>
                            <div class="product-image wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <img src="images/resource/product-6.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Vehicle Section -->
        <!-- Call To Action Section Two -->
        <section class="call-to-action-section-two" id="call-to-action-section-two">
            <div class="auto-container">
                <div class="row clearfix">
                    <!-- Title Column -->
                    <div class="title-column col-lg-8 col-md-12 col-sm-12">
                        <div class="inner-column">
                            
                            <div class="text">
                                <h2>
                                    Book Us For All Of Your <br> Transportation Needs
                                </h2>
                            </div>
                            <div class="icon flaticon-support-2"></div>
                        </div>
                    </div>
                    <!-- Info Column -->
                    <div class="info-column col-lg-4 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="title">For quick Live Assistance</div>
                            <div class="rating">
                                <span class="star fa fa-star"></span>
                                <span class="star fa fa-star"></span>
                                <span class="star fa fa-star"></span>
                            </div>
                            <a class="phone" href="tel:369-2900-4800">(+234) 814 000 3332</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Call To Action Section Two -->

      
        <!-- Main Footer -->
        <?php include 'includes/footer.php';?>
        <!-- End Main Footer -->
    </div>
    <!--End pagewrapper-->
    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    <!--Scroll to top-->
    
        <?php include 'includes/footer-sources.php';?>
        <script type="text/javascript">
            $(function(){
            	var amount = 0;
     //            $('#booking-form').submit(function(e){
     //                e.preventDefault();
     //                $.ajax({
			  //           url:'ajax/add_booking.php',
			  //           type: 'POST',
			  //           data : $(this).serialize(),
			  //           beforeSend: function() {
			  //               $('#message').fadeOut();
			  //           },
			  //           success: function(data){
			  //           	if (! isNaN(data)) {
			  //           		location.href = 'ticket?id='+data;
					// 	    }
					// 	    else{ 
					// 	    	$('#message').fadeIn();
					// 	    	$('#message').html(data)
					// 	    }
					// 	    console.log(data);
					// 	}
					// })                   
     //            });

                $('#payment-btn-container').click(function(){
                    $('#overlay').slideUp();
                })

                $('#destination_id').change(function () {
                	var destination_id = $('#destination_id').val();
                	fetch_destination_times(destination_id);
                	fetch_destination_buses(destination_id);
                	fetch_destination_amount();
                })

                $('#bus_id').change(function () {
                	fetch_destination_amount();
                })

                $('#take_off_time_id').change(function () {
                	fetch_destination_amount();
                })

                $('#personsN').change(function () {               	
	            	var am = parseFloat(parseFloat(amount) * parseFloat($('#personsN').val()));
	                $('#amount').val(am);
	                console.log(am);
                })

                function fetch_destination_times(destination_id) {
                	$.ajax({
			            url:'ajax/fetch_destination_times.php',
			            type: 'POST',
			            data : {destination_id : destination_id},
			            success: function(data){
			                $('#take_off_time_id').html(data);
                			fetch_destination_amount();
                			console.log(data);
			            }
			        })
                }

                function fetch_destination_buses(destination_id) {
                	$.ajax({
			            url:'ajax/fetch_destination_buses.php',
			            type: 'POST',
			            data : {destination_id : destination_id},
			            success: function(data){
			                $('#bus_id').html(data);
                			fetch_destination_amount();
                			console.log(data);
			            }
			        })
                }

                function fetch_destination_amount() {
                	var destination_id = $('#destination_id').val();
                	var bus_id = $('#bus_id').val();
                	var take_off_time_id = $('#take_off_time_id').val();
                	if (!isNaN(destination_id) && !isNaN(bus_id) && !isNaN(take_off_time_id)) {
                		$.ajax({
				            url:'ajax/fetch_destination_amount.php',
				            type: 'POST',
				            data : {
				            	destination_id : destination_id,
				            	bus_id : bus_id,
				            	take_off_time_id : take_off_time_id,
				            },
				            success: function(data){
				            	amount = data;
				            }
				        })
                	}
                }
            
                const API_FLUTTERWAVE_PK = 'FLWPUBK_TEST-0f9fd4e3dbd0809a6c3b8cdf518650a1-X',
                    customerEmail = 'thenewxpat@gmail.com',
                    customerPhone = '09090809809',
                    customerFName = 'Wasiu Alade',
                    customerLName = 'a';

                $('#payment-btn').click(function(e) {

                    e.preventDefault();
                    const n = new Date();
                    var t =
                        "LE-P" +
                        n.getFullYear().toString() +
                        n.getMonth().toString() +
                        n.getMilliseconds().toString() +
                        Math.floor(1).toString(),
                        o = getpaidSetup({
                            PBFPubKey: API_FLUTTERWAVE_PK,
                            customer_email: customerEmail,
                            amount: (amount * parseFloat($('#personsN').val())).toString(),
                            customer_phone: customerPhone,
                            customer_firstname: customerFName,
                            customer_lastname: customerLName,
                            currency: "NGN",
                            country: "NG",
                            txref: t,
                            onclose: function() {},
                            callback: function(e) {
                                handlePaymentResponse(e.data.tx), o.close();
                            }
                        });
                })

                const handlePaymentResponse = () => {
                   
                    $('#payment-btn').attr('disabled', 'disabled').text("Processing...");
                    $.ajax({
			            url:'ajax/add_booking.php',
			            type: 'POST',
			            data : {
			            	bus_id : $('#bus_id').val(),
			            	take_off_time_id : $('#take_off_time_id').val(),
			            	destination_id : $('#destination_id').val(),
			            	traveling_date : $('#traveling_date').val(),
			            	seats : $('#personsN').val(),
			            	amount : $('#amount').val(),
			            },
			            beforeSend: function() {
			                $('#message').fadeOut();
			            },
			            success: function(data){	            	
			            	if (!isNaN(data)) {
			            		location.href = 'ticket?id='+data;
						    }
						    else{ 
						    	$('#message').fadeIn();
						    	$('#message').html(data)
						    }
						    console.log(data);
						}
					}) 
                }
            });
        </script>
</body>
</html>
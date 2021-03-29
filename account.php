<?php 
    session_start();
    if (!isset($_SESSION['bus_user'])) {
        header('location: login');
        exit();
    }
    include_once 'core/bookings.class.php';
    $booking_obj = new Bookings();

    $user = $_SESSION['bus_user'];
    $user_bookings = $booking_obj->fetch_active_user_bookings($user['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/header-sources.php'; ?>
</head>

<body>
    <div class="page-wrapper">       
    
        <?php include 'includes/header.php';?>
        <!-- End Main Header -->
        <!-- Page Title -->
        <section class="page-title" style="background-image:url(images/background/9.jpg);">
            <div class="auto-container">
                <div class="inner-box">
                    <h1>Dashboard</h1>
                    <div class="bread-crumb"><a href="./">Home &nbsp; ||</a> <i class="current">Dashboard</i></div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->
        <!-- Dashboard Container-->
        <div class="dashboard-container">
            <div class="auto-container">
                <!-- Info Box -->
                <div class="info-box">
                    <div class="info-inner">
                        <div class="image">
                            <!-- <img src="images/resource/author-2.jpg" alt="" /> -->
                        </div>
                        <h4><?php echo $user['first_name']. ' '.$user['last_name'] ?></h4>
                        <a href="logout" class="logout">Logout</a>
                    </div>
                </div>
                <!-- Welcome -->
                <div class="welcome"><span class="fa fa-exclamation-circle"></span> Welcome to Your Dashboard, <?php echo $user['first_name']. ' '.$user['last_name'] ?>.</div>
                <!-- Dashboard Option -->
                
            </div>
            <!-- Dashboard Btns -->
            <div class="dashboard-btns-box">
                <div class="auto-container">
                    <a href="./#booking-form" class="theme-btn btn-style-two"><span class="txt">Reserve Now</span></a>
                </div>
            </div>
            <div class="auto-container">
                <!-- Dashboard Table -->
                <div class="dashboard-table" id="activeBookings">
                    <div class="dashboard-inner">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Destination</th>
                                    <th>Take Off Time</th>
                                    <th>Bus</th>
                                    <th>Traveling Date</th>
                                    <th>Seats Booked</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 0; foreach ($user_bookings as $user_booking): $sn++; ?>
                                    <tr>
                                        <td><?php echo $sn ?></td>
                                        <td><?php echo $user_booking['destination'] ?></td>
                                        <td><?php echo $user_booking['take_off_time'] ?></td>
                                        <td><?php echo $user_booking['bus'] ?></td>
                                        <td><?php echo $user_booking['traveling_date'] ?></td>
                                        <td><?php echo $user_booking['booked_seats'] ?></td>
                                        <td><?php echo number_format($user_booking['amount'],2) ?></td>
                                        <td><?php echo $user_booking['booking_date'] ?></td>
                                    </tr>                    
                                <?php endforeach ?>                               
                            </tbody>
                        </table>
                        <!-- Styled Pagination -->
                        <div class="styled-pagination centered">
                            <ul class="clearfix">
                                <li class="prev"><a href="#"><span class="flaticon-go-back-left-arrow"></span></a></li>
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li class="next"><a href="#"><span class="flaticon-right-arrow-forward"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Dashboard Container-->
        <!-- Main Footer -->      
    
        <?php include 'includes/footer.php';?>
        <!-- End Main Footer -->
    </div>
    <!--End pagewrapper-->
   <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    <!--Scroll to top-->
    <?php include 'includes/footer-sources.php';?>
</body>

</html>
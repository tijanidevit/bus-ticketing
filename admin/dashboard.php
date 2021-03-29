<?php 
session_start();
if (! isset($_SESSION['bus_admin'])) {
    header('location: ./');
    exit();
}

include_once '../core/bookings.class.php';
include_once '../core/users.class.php';
include_once '../core/buses.class.php';
$booking_obj = new Bookings();
$user_obj = new Users();
$bus_obj = new Buses();

$latest_bookings = $booking_obj->fetch_limited_active_bookings(12);
$bookings_num = $booking_obj->bookings_num();
$users_num = $user_obj->users_num();
$buses_num = $bus_obj->buses_num();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <?php include "includes/header-sources.php";?>
</head>

<body>

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-responsive-width="992px" data-has-scrolling-region>
        <?php include "includes/navbar.php";?>
        <div class="mdk-drawer-layout__content">
            <!-- header-layout -->
            <div class="mdk-header-layout js-mdk-header-layout  mdk-header--fixed  mdk-header-layout__content--scrollable">
                <!-- header -->
                

                <!-- // END drawer-layout__content -->
                <div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100">
                    <!-- main content -->
                    <div class="container-fluid">
                        <!-- <div class="row font-1">
                            <div class="col-lg-4">
                                <div class="card card-body flex-row align-items-center">
                                    <h5 class="m-0"><i class="material-icons align-middle text-muted md-18">content_paste</i> Today1</h5>
                                    <div class="text-primary ml-auto">&#8358;12,319</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card card-body flex-row align-items-center">
                                    <h5 class="m-0"> Last 7 Days</h5>
                                    <div class="text-primary ml-auto">&#8358;35,129</div>
                                    <i class="material-icons text-success md-18 ml-1">arrow_upward</i>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card card-body flex-row align-items-center">
                                    <h5 class="m-0"> Past 30 Days</h5>
                                    <div class="text-primary ml-auto">&#8358;142,545</div>
                                    <i class="material-icons text-success md-18 ml-1">arrow_upward</i>
                                </div>
                            </div>
                        </div> -->
                        <div class="card card-earnings">
                            <div class="card-group">
                                <div class="card card-body mb-0">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <p class="card-text text-muted mb-1">Registered Customers</p>
                                            <h1 class="mb-0 font-weight-normal"><?php echo $users_num ?></h1>
                                        </div>
                                        <!-- <div class="badge badge-success">+52%</div> -->
                                    </div>
                                </div>
                                <div class="card card-body mb-0">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <p class="card-text text-muted mb-1">Buses Added</p>
                                            <h1 class="mb-0 font-weight-normal"><?php echo $buses_num ?></h1>
                                        </div>
                                        <!-- <div class="badge badge-primary">+16%</div> -->
                                    </div>
                                </div>
                                <div class="card card-body mb-0">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <p class="card-text text-muted mb-1">Bookings Made</p>
                                            <h1 class="mb-0 font-weight-normal"><?php echo $bookings_num ?></h1>
                                        </div>
                                        <!-- <div class="badge badge-warning">+5%</div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-lg-4">
                                        <div class="card-title">Recent Bookings</div>
                                    </div>
                                    <div class="col-lg-8 col-md-12">

                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr class="bg-fade">
                                            <th>Customer Name</th>
                                            <th>Destination</th>
                                            <th>Take Off Time</th>
                                            <th>Traveling Date</th>
                                            <th>Seats Booked</th>
                                            <th>Payment Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($latest_bookings as $latest_booking): ?>
                                            <tr>
                                                <td class="align-middle"><?php echo $latest_booking['first_name'].' ' .$latest_booking['first_name'] ?></td>
                                                <td class="align-middle"><?php echo $latest_booking['destination'] ?></td>
                                                <td class="align-middle"><?php echo $latest_booking['take_off_time'] ?></td>
                                                <td class="align-middle"><?php echo $latest_booking['traveling_date'] ?></td>
                                                <td class="align-middle"><?php echo $latest_booking['booked_seats'] ?></td>
                                                <td class="align-middle"><?php echo $latest_booking['booking_date'] ?></td>
                                                <td class="align-middle">&#8358;<?php echo number_format( $latest_booking['amount'],2) ?></td>
                                            </tr>
                                        <?php endforeach ?>                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <!-- sidebar -->
        <?php include "includes/sidebar.php";?>
        <!-- // END sidebar -->


    </div>
    <!-- // END drawer-layout -->



    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Simplebar -->
    <!-- Used for adding a custom scrollbar to the drawer -->
    <script src="assets/vendor/simplebar.js"></script>


    <!-- Vendor -->
    <script src="assets/vendor/Chart.min.js"></script>
    <script src="assets/vendor/moment.min.js"></script>


    <!-- APP -->
    <script src="assets/js/color_variables.js"></script>
    <script src="assets/js/app.js"></script>


    <script src="assets/vendor/dom-factory.js"></script>
    <!-- DOM Factory -->
    <script src="assets/vendor/material-design-kit.js"></script>
    <!-- MDK -->



    <script>
        (function() {
            'use strict';
            // Self Initialize DOM Factory Components
            domFactory.handler.autoInit()


            // Connect button(s) to drawer(s)
            var sidebarToggle = document.querySelectorAll('[data-toggle="sidebar"]')

            sidebarToggle.forEach(function(toggle) {
                toggle.addEventListener('click', function(e) {
                    var selector = e.currentTarget.getAttribute('data-target') || '#default-drawer'
                    var drawer = document.querySelector(selector)
                    if (drawer) {
                        if (selector == '#default-drawer') {
                            $('.container-fluid').toggleClass('container--max');
                        }
                        drawer.mdkDrawer.toggle();
                    }
                })
            })
        })()
    </script>


    <script src="assets/vendor/morris.min.js"></script>
    <script src="assets/vendor/raphael.min.js"></script>
    <script src="assets/vendor/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/datepicker.js"></script>

    <!-- <script>
        $(function() {
            window.morrisDashboardChart = new Morris.Area({
                element: 'morris-area-chart',
                data: [{
                    year: '2017-01',
                    a: 6352.27
                },
                {
                    year: '2017-02',
                    a: 4309.98
                },
                {
                    year: '2017-03',
                    a: 1465.98
                },
                {
                    year: '2017-04',
                    a: 1298.25
                },
                {
                    year: '2017-05',
                    a: 3209
                },
                {
                    year: '2017-06',
                    a: 2083
                },
                {
                    year: '2017-07',
                    a: 1285.23
                },
                {
                    year: '2017-08',
                    a: 1289
                },
                {
                    year: '2017-09',
                    a: 4430
                },
                {
                    year: '2017-10',
                    a: 8921.19
                }
                ],
                xkey: 'year',
                ykeys: ['a'],
                labels: ['Earnings'],
                lineColors: ['#fff'],
                fillOpacity: '0.2',
                gridEnabled: true,
                gridTextColor: '#ffffff',
                resize: true
            });

        });
    </script> -->


</body>

</html>
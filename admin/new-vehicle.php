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



                  <div class="container-fluid">
                    <h1 class="h2 mb-0">Add New Bus</h1>
                    <hr>
                    <div class="card card-body p-2">
                     <form id="busForm" class="mt-2">
                        
                         <div class="row">
                             <div class="form-group col-md-12">
                                <div id="result"></div>
                             </div>
                             <div class="form-group col-md-6">
                                 <label>Bus Name</label>
                                 <input type="text" class="form-control" name="bus" />
                             </div>
                             <div class="form-group col-md-6">
                                 <label>No of Seats</label>
                                 <input type="number" class="form-control" name="seats" />
                             </div>
                         </div>
                         <div class="form-group text-center">
                             <button class="btn btn-primary">Submit</button>
                         </div>   
                     </form>
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
</body>

</html>

<script>
    $('#busForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url:'ajax/add_bus.php',
            type: 'POST',
            data : $(this).serialize(),
            cache: false,
            beforeSend: function() {
                $('.spinner').show();
                $('.btnText').hide();
            },
            success: function(data){

                $('.spinner').hide();
                $('.btnText').show();

                if (data == 1) {
                    $('#result').html('<span class="alert alert-success">Bus Added Successfully</span>');
                    $('#busForm')[0].reset();
                }
                else{
                    $('#result').html(data);
                    $('#result').fadeIn();
                    $('.spinner').hide();
                }
            }
        })
    });
</script>
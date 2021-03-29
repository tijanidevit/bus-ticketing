<?php 
    session_start();

    if (isset($_SESSION['bus_user'])) {
        echo "<script> history.back(); </script>";;
        exit();
    }
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
                    <h1>Register</h1>
                    <div class="bread-crumb"><a href="./">Home &nbsp; ||</a> <i class="current">Register</i></div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->
        <!-- Dashboard Container-->
        <div class="dashboard-container">
           <section class="listing-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="title">
                            <span>welcome</span>
                            <h2>Basic Details</h2>
                            <div class="image">
                                <i class="icon-shape icon-Shap-01"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic Information form -->
                <form id="registerForm">
                    <div id="result"></div>
                    <div class="row clearfix">
                        <div class="form-block col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" name="first_name" placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-block col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" name="last_name" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-block col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" name="email" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="form-block col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div>
                            <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="txt">Register</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
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

<script>
    $('#registerForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url:'ajax/register.php',
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
                    location.href = 'account';
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
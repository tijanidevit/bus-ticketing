
        
        <!-- Preloader -->
        <div class="preloader"></div>
        <header class="main-header">
            <!--Header Top-->
            <div class="header-top">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <div class="top-left">
                            <div class="text">Best choice for travel & Bus</div>
                        </div>
                        <div class="top-right">
                            <ul class="list clearfix">
                                <li><a href="tel:+369-2900-4800"><span class="icon fa fa-phone-square"></span> (369) 2900 4800</a></li>
                                <li><a href="mailto:support@moveo.com"><span class="icon fa fa-envelope"></span> support@moveo.com</a></li>
                            </ul>
                            <ul class="social-icons">
                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header Top -->
            <!-- Header Upper -->
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <!--Info-->
                        <div class="logo-outer">
                            <div class="logo logo-1">
                                <a href="./">
                                    <span class="coexo-logo icon-Coexo-Logo-Black--01"></span>
                                    <span class="title">Moveo
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!--Nav Box-->
                        <div class="nav-outer clearfix">
                            <!--Mobile Navigation Toggler For Mobile-->
                            <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="navbar-header">
                                    <!-- Togg le Button -->
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="icon flaticon-menu"></span>
                                    </button>
                                </div>
                                <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="./">Home</a></li>
                                        <li><a href="./about">About Us</a></li>
                                        <li><a href="./#call-to-action-section-two">Contact</a></li>
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->
                            <!-- Main Menu End-->
                            <div class="outer-box clearfix">                               
                                <!-- Button Box -->
                                <div class="btn-box">
                                    <?php if (!isset($_SESSION['bus_user'])): ?>
                                        <a href="./login" class="theme-btn vendor-btn">Login</a>
                                        <a href="./register" class="theme-btn vendor-btn">Register</a>

                                    <?php else: ?>
                                        <a href="./#booking-form" class="theme-btn vendor-btn">Book a Bus</a>
                                        <a href="./account" class="theme-btn vendor-btn">Account</a>
                                    <?php endif ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn"><span class="icon far fa-window-close"></span></div>
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                <nav class="menu-box">
                    <div class="nav-logo"><a class="mobile-logo" href="">
                        <span class="coexo-logo icon-Coexo-Logo-Black--01"></span>
                                    <span class="title">Moveo
                                    </span>
                    </a></div>
                    <ul class="navigation clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </ul>
                </nav>
            </div><!-- End Mobile Menu -->
        </header>
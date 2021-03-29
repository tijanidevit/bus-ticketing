<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content">
        <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">

            <nav class="drawer  drawer--dark">
                <div class="drawer-spacer">
                    <div class="media align-items-center">
                        <a href="index.html" class="drawer-brand-circle mr-2">M</a>
                        <div class="media-body">
                            <a href="index.html" class="h5 m-0 text-link">Moveo - Admin</a>
                        </div>
                    </div>
                </div>
                <!-- HEADING -->
                <div class="py-2 drawer-heading">
                    Menu
                </div>
                <!-- DASHBOARDS MENU -->
                <ul class="drawer-menu" id="dasboardMenu" data-children=".drawer-submenu">
                    <li class="drawer-menu-item active ">
                        <a href="./dashboard">
                            <i class="material-icons">poll</i>
                            <span class="drawer-menu-text"> Dashboard</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item drawer-submenu">
                        <a data-toggle="collapse" data-parent="#pagesMenu" href="#" data-target="#vMenu" aria-controls="extrasMenu" aria-expanded="false" class="collapsed">
                            <i class="material-icons">more</i>
                            <span class="drawer-menu-text"> Vehicles</span>
                        </a>
                        <ul class="collapse " id="vMenu">
                            <li class="drawer-menu-item "><a href="new-vehicle">Add New Vehicle</a></li>
                            <li class="drawer-menu-item "><a href="vehicles">Available Vehicles</a></li>
                        </ul>
                    </li>
                    

                    <li class="drawer-menu-item drawer-submenu">
                        <a data-toggle="collapse" data-parent="#pagesMenu" href="#" data-target="#destinations" aria-controls="extrasMenu" aria-expanded="false" class="collapsed">
                            <i class="material-icons">more</i>
                            <span class="drawer-menu-text"> Destination</span>
                        </a>
                        <ul class="collapse " id="destinations">
                            <li class="drawer-menu-item "><a href="new-destination">Add New Destination</a></li>
                            <li class="drawer-menu-item "><a href="destinations">Available Destinationes</a></li>
                        </ul>
                    </li>

                    <li class="drawer-menu-item drawer-submenu">
                        <a data-toggle="collapse" data-parent="#pagesMenu" href="#" data-target="#trips" aria-controls="extrasMenu" aria-expanded="false" class="collapsed">
                            <i class="material-icons">more</i>
                            <span class="drawer-menu-text"> Trip</span>
                        </a>
                        <ul class="collapse " id="trips">
                            <li class="drawer-menu-item "><a href="new-trip">Add New Trip</a></li>
                            <li class="drawer-menu-item "><a href="trips">Available Tripes</a></li>
                        </ul>
                    </li>
                    <li class="drawer-menu-item active ">
                        <a href="./bookings">
                            <i class="material-icons">poll</i>
                            <span class="drawer-menu-text"> Bookings</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item active ">
                        <a href="./payments">
                            <i class="material-icons">poll</i>
                            <span class="drawer-menu-text"> Transactions</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item active ">
                        <a href="./customers">
                            <i class="material-icons">poll</i>
                            <span class="drawer-menu-text"> Customers</span>
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
    </div>
</div>
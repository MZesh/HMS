    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full"> 
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6"> 
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>  
                
            </nav>
        </header> 
        <?php if($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'wardan'){?>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll -->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/HMS/dashboard/admin"
                                aria-expanded="false">
                                <i class="fa fa-dashboard" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/HMS/dashboard/admin/profile/view-profile.php"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <?php 
                        if($_SESSION['role'] === 'admin' ){
                        ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/HMS/dashboard/admin/user/user-view.php"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Users</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/HMS/dashboard/admin/hostel/"
                                aria-expanded="false">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span class="hide-menu">Hostels</span>
                            </a>
                        </li>
                        <?php }?>
                        <li class="sidebar-item dropdown mt-5">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i><?php echo $_SESSION['name'];?>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><?php echo $_SESSION['email'];?></a>
                                <a class="dropdown-item" href="/HMS/dashboard/admin/logout.php">Logout</a> 
                            </div>
                        </li>
                        
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div> 
        </aside> 
        <?php }
        else if($_SESSION['role'] === 'student'){
        ?>
        <aside class="left-sidebar" data-sidebarbg="skin6">
                    <!-- Sidebar scroll -->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/HMS/dashboard/admin"
                                aria-expanded="false">
                                <i class="fa fa-dashboard" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/HMS/dashboard/admin/profile/view-profile.php"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        
                         
                        <li class="sidebar-item dropdown mt-5">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i><?php echo $_SESSION['name'];?>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><?php echo $_SESSION['email'];?></a>
                                <a class="dropdown-item" href="/HMS/dashboard/admin/logout.php">Logout</a> 
                            </div>
                        </li>
                        
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div> 
        </aside> 
        <?php }?>
 
      
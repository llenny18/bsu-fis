<?php
if(!isset($_SESSION['id'])){
echo "<script>window.location.href='../'</script>";
}
$edituserlink = "";
if($_SESSION['user_type'] == "administrator"){
    $edituserlink = "manage_admin.php?a_id=".$_SESSION['id'];

} else 
if($_SESSION['user_type'] == "employee"){
    $edituserlink = "e_data.php?e_id=".$_SESSION['id'];

}


$current_page = basename($_SERVER['PHP_SELF']);

?>

<header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                  
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                  
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.php">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="assets/images/FISlogo.png" style="width: 220px;" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="assets/images/FISlogo.png" alt="homepage" class="light-logo" />
                            </b>
                            
                        </a>
                    </div>
                
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
         
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
       
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                      
                   
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="assets/images/Batangas_State_Logo.png" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark"><?= $_SESSION['full_name'] ?></span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                              
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= $edituserlink ?>"><i data-feather="settings"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" id="logoutButton"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                              
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>


<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <?php if($_SESSION['user_type'] == "administrator"){

                         ?>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php"
                                aria-expanded="false"><i  class="fas fa-chart-pie" style="font-size: 1.2em;"  class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Operational Plan</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="opmm.php"
                                aria-expanded="false"><i class="fas fa-list-ol"  style="font-size: 1.2em;" class="feather-icon"></i><span
                                    class="hide-menu">Records
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="opmm_matrix.php"
                                aria-expanded="false"><i class="fas fa-table" style="font-size: 1.2em;" class="feather-icon"></i><span
                                    class="hide-menu">Monitoring Matrix</span></a></li>
                     
                        <li class="list-divider"></li>
                        <?php 

}  ?>
                        <li class="nav-small-cap"><span class="hide-menu">User Accounts</span></li>
                        
                        <?php if($_SESSION['user_type'] == "administrator"){?>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="admins.php"
                                aria-expanded="false"><i class="fas fa-user-circle" class="feather-icon"  style="font-size: 1.2em;"></i><span
                                    class="hide-menu">Administrators
                                </span></a>
                        </li>
 
                        <li class="sidebar-item"> <a class="sidebar-link  <?php if ($current_page == 'e_data.php') { echo 'active'; } ?>" href="employees.php"
                                aria-expanded="false"><i class="fas fa-users"  style="font-size: 1.2em;" class="feather-icon"></i><span
                                    class="hide-menu">Employee
                                </span></a>
                        </li>
               

                        <?php  }  ?>

<?php if($_SESSION['user_type'] == "employee"){ ?>
    <li class="sidebar-item"> <a class="sidebar-link  " href="e_data.php?e_id=<?=$_SESSION['id'] ?>"
                                aria-expanded="false"><i class="fas fa-user"  style="font-size: 1.2em;" class="feather-icon"></i><span
                                    class="hide-menu">My Information
                                </span></a>
                        </li>
    <?php  }  ?>
                       
    <li class="list-divider"></li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
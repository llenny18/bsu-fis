<?php include("../controller/controller.php"); ?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <?php include("./title.php");
    
     if (isset($_SESSION['id'])){
        if($_SESSION['user_type'] == "employee"){
            echo "<script>window.location.href='employees.php'</script>";
        }
        
        }?>
    
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    
    <link href="dist/css/style.min.css" rel="stylesheet">
   
</head>

<body>
  
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
     
      
       
        <?php include("./nav.php") ?>
      
        <div class="page-wrapper">
          
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning <?= $_SESSION['full_name'] ?>!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                   
                </div>
            </div>
           
            <div class="container-fluid">
               
                <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="font-weight-medium text-primary"><?= get_pmm_data_count($pdo) ?></h2>
                                       
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total number of Operational Plan </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class=" text-muted"><i class="fas fa-table text-primary"  style="font-size: 1.5em;"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="w-100 text-truncate font-weight-medium text-primary"><?= get_employee_count($pdo) ?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total number of Employees
                                    </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class=" text-muted"><i class="fas fa-users text-primary"  style="font-size: 1.5em;"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="font-weight-medium text-primary"><?= get_admin_count($pdo) ?></h2>
                             
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total number of Administrator</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class=" text-muted"><i class="fas fa-address-card text-primary"  style="font-size: 1.5em;"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="font-weight-medium text-primary"><?= get_pmm_data_matrix_count($pdo) ?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total number of Operational Plan Monitoring Matrix</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class=" text-muted"><i class="fas fa-file-alt text-primary"  style="font-size: 1.5em;"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Costs per Development Area </h4>
                                <div id="campaign-v2" class="mt-2" style="height:398px; width:100%;"></div>
                        
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Remarks Percentage Via Matrix</h4>
                                <div class="remarks mt-4 position-relative" style="height:384px;"></div>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Operational Plan Counts</h4>
                                <div class="net-income mt-4 position-relative" style="height:384px;"></div>
                              
                            </div>
                        </div>
                    </div>
                </div>
             
                <div class="row">
                    <div class="col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <h4 class="card-title mb-0">Overall Monthly Total Estimated COsts</h4>
                                    
                                </div>
                                <div class="pl-4 mb-5">
                                    <div class="stats ct-charts position-relative" style="height: 358px;"></div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
          
                </div>
           
             
              
            </div>
          
        </div>
        
    </div>
 
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    
    
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    
    <script src="dist/js/custom.min.js"></script>
    
    <script src="assets/extra-libs/c3/d3.min.js"></script>
    <script src="assets/extra-libs/c3/c3.min.js"></script>
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>

    
    <?php  include("dist/js/pages/dashboards/dashboard1.min.php"); ?>
    

    <script src="dist/js/pages/chartjs/chartjs.init.js"></script>
    <script src="assets/libs/chart.js/dist/Chart.min.js"></script>
    </body>

</html>
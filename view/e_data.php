<?php include("../controller/controller.php"); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <?php include("./title.php") ?>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include("./nav.php") ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Employee Information Management </h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Non-Teaching Employee Information</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                 
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Employee Information</h4>
                                <br>
                                <form action="#">
                                    <div class="form-body">
                                     <h4 class="card-title">Personal Info</h4>
                                     <hr>
                                    <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Middle Name</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Sex</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Date of Birth</label>
                                                    <input type="date" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Place of Origin</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Civil Status</label>
                                                    <select class="form-control"><option value="" selected="selected">Select...</option><option value="Single">Single</option><option value="Married">Married</option><option value="Divorced">Divorced</option><option value="Separated">Separated</option><option value="Widowed">Widowed</option></select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Contact No.</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Email Address</label>
                                                    <input type="email" class="form-control" >
                                                </div>
                                            </div>
                                           
                                        </div>

                                        <br>
                                        <h4 class="card-title">Education</h4>
                                        <hr>
                                        
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Level</label>
                                                        <select class="form-control"><option value="" selected="selected">Select...</option><option value="Bachelor's">Bachelor's</option><option value="Master's">Master's</option><option value="Doctorate">Doctorate</option></select>
                                                    </div>
                                                </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Institution</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                            
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Major/Specialization</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Year Graduated</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Units Earned</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                    
                                           
                                        </div>
                                      
                                        <br>
                                        <h4 class="card-title">Licenses and Organizations</h4>
                                        <hr>
                                        
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Type</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Actions</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                           
                                        </div>
                                       
                                       
                                        <br>
                                        <h4 class="card-title">Teaching Load</h4>
                                        <hr>
                                        
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Academic Load Units</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>General Education Units</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                          
                                           
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Course Type</label>
                                                    <select  class="form-control" z><option value="" selected="selected">Select...</option><option value="Academic">Academic</option><option value="General Education">General Education</option></select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Course Code</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Course Code</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Units</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                           
                                           
                                        </div>
                                        
                                        <br>
                                        <h4 class="card-title">Work Info</h4>
                                        <hr>
                                        
                                        
                                        <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Date of Appointment</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Years in Service</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Appointment Status</label>
                                                    <select  class="form-control" ><option value="" selected="selected">Select...</option><option value="Full Time">Full Time</option><option value="Part Time">Part Time</option></select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Tenure of Employment</label>
                                                    <select  class="form-control" ><option value="" selected="selected">Select...</option><option value="Permanent">Permanent</option><option value="Temporary">Temporary</option><option value="Contractual">Contractual</option><option value="Guest Lecturer">Guest Lecturer</option></select>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Faculty Rank</label>
                                                    <select  class="form-control" ><option value="" selected="selected">Select...</option><option value="Instructor I">Instructor I</option><option value="Instructor II">Instructor II</option><option value="Instructor III">Instructor III</option><option value="Assistant Professor I">Assistant Professor I</option><option value="Assistant Professor II">Assistant Professor II</option><option value="Assistant Professor III">Assistant Professor III</option><option value="Assistant Professor IV">Assistant Professor IV</option><option value="Associate Professor I">Associate Professor I</option><option value="Associate Professor II">Associate Professor II</option><option value="Associate Professor III">Associate Professor III</option><option value="Associate Professor IV">Associate Professor IV</option><option value="Associate Professor V">Associate Professor V</option><option value="Professor I">Professor I</option><option value="Professor II">Professor II</option><option value="Professor III">Professor III</option><option value="Professor IV">Professor IV</option><option value="Professor V">Professor V</option><option value="Professor VI">Professor VI</option><option value="College/University Professor">College/University Professor</option><option value="Lecturer I">Lecturer I</option><option value="Lecturer II">Lecturer II</option><option value="Lecturer III">Lecturer III</option><option value="Lecturer IV">Lecturer IV</option><option value="Lecturer V">Lecturer V</option><option value="Lecturer VI">Lecturer VI</option><option value="Lecturer VII">Lecturer VII</option><option value="Senior Lecturer I">Senior Lecturer I</option><option value="Senior Lecturer II">Senior Lecturer II</option><option value="Senior Lecturer III">Senior Lecturer III</option><option value="Senior Lecturer IV">Senior Lecturer IV</option><option value="Senior Lecturer V">Senior Lecturer V</option><option value="Professorial Lecturer I">Professorial Lecturer I</option><option value="Professorial Lecturer II">Professorial Lecturer II</option><option value="Professorial Lecturer III">Professorial Lecturer III</option><option value="Professorial Lecturer IV">Professorial Lecturer IV</option><option value="Professorial Lecturer V">Professorial Lecturer V</option><option value="Professorial Lecturer VI">Professorial Lecturer VI</option></select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Annual Salary</label>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <hr>
                                        
                                    </div>
                                
                                    
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
</body>

</html>
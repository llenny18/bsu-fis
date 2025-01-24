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
    <?php include("./title.php") ?>
 
    <link href="assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    
    <link href="dist/css/style.min.css" rel="stylesheet">
    
</head>

<body>
  
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
     
        <?php include("./nav.php") ?>
      
        <div class="page-wrapper">
          
            <div class="page-breadcrumb">
            <hr class="red-hr-design">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">OPMM  <a href="new-oppm.php" class="btn btn-primary"> + Add new Operational Plan</a></h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Operational Plan Records</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
           
            <div class="container-fluid">
               
              
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="filter-container mb-3">
    <label for="yearFilter" class="form-label">Filter by Year:</label>
    <select id="yearFilter" class="form-control">
        <option value="">All Years</option>
        <!-- Populate the years dynamically -->
        <script>
            const yearSelect = document.getElementById('yearFilter');
            for (let year = 2000; year <= 2050; year++) {
                const option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                yearSelect.appendChild(option);
            }
        </script>
    </select>
</div>
<script>
    document.getElementById('yearFilter').addEventListener('change', function () {
        const selectedYear = this.value;
        const rows = document.querySelectorAll('#multi_col_order tbody tr');

        rows.forEach(row => {
            const yearCell = row.cells[4].textContent;
            if (selectedYear === "" || yearCell === selectedYear) {
                row.style.display = ""; // Show the row
            } else {
                row.style.display = "none"; // Hide the row
            }
        });
    });
</script>
<hr>
                                <div class="table-responsive">
                                    <table  id="multi_col_order"  style="color: #2e2d2d;"  id="multi_col_order"
                                        class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th>ID</th>
                    <th>Development Area</th>
                    <th>Outcome</th>
                    <th>Strategy</th>
                    <th>Year</th>

                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php display_pmm_data($pdo); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
          
        </div>
        
    </div>
 
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    
    
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
   
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
   
    <script src="dist/js/sidebarmenu.js"></script>
    
    <script src="dist/js/custom.min.js"></script>
   
    <script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
</body>

</html>
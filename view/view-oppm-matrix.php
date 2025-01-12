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
    
    <link href="dist/css/style.min.css" rel="stylesheet">
   
</head>

<body>
  
    

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <
        <?php include("./nav.php") ?>
      
        <div class="page-wrapper">
          
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">OPMM Matrix</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">OPMM Matrix</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                                <option selected>Aug 19</option>
                                <option value="1">July 19</option>
                                <option value="2">Jun 19</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="container-fluid">
            <?php
if (isset($_GET['pap_id'])) {
    $pap_id = $_GET['pap_id'];

    // Fetch data from the operational_plan_view
    try {
        $query = "SELECT 
                    *
                  FROM operational_plan_view
                  WHERE matrix_id = :pap_id";

        $stmt = $pdo->prepare($query); // Use prepare instead of query
        $stmt->bindParam(':pap_id', $pap_id, PDO::PARAM_STR);
        $stmt->execute(); // Execute the prepared statement
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt2 = $pdo->prepare($query); // Use prepare instead of query
        $stmt2->bindParam(':pap_id', $pap_id, PDO::PARAM_STR);
        $stmt2->execute(); // Execute the prepared statement
        $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Query failed: " . htmlspecialchars($e->getMessage());
        exit();
    }
} else {
    echo "No operational plan ID provided.";
    exit();
}
?>
                <div class="row">
                    
                    <div class="col-12">
                        <div class="card">
                          
                            
                            <div class="table-responsive p-1">
                                <table class="table table-bordered table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">Development Area</th>
                                            <th scope="col" colspan="6"><?= $row2['development_area'] ?></th>
                                            
                                        </tr>
                                       
                                        <tr>
      <th >Outcomes</th>
      <th >Strategy/ies</th>
      <th >Action Step/Program, Activites, Projects (PAPs)</th>
      <th >Performace Indicator</th>
      <th >Actual Accomplishments</th>
      <th >Variance</th>
      <th >Remarks</th>
    </tr>
    
                                    </thead>
                                    <tbody>
                                    <?php
        $currentDevArea = '';
        $currentOutcome = '';
        $currentStrategy = '';

        foreach ($data as $row) {
            // Print Development Area only if it changes
        

            // Print data row
            echo "<tr>
                <td>" . htmlspecialchars($row['outcome']) . "</td>
                <td>" . htmlspecialchars($row['strategy']) . "</td>
                <td>" . htmlspecialchars($row['pap_name']) . "</td>
                <td>" . htmlspecialchars($row['performance_indicator']) . "</td>
                <td>" . htmlspecialchars($row['actual_accomplishments']) . "</td>
                <td>" . htmlspecialchars($row['variance']) . "</td>
                <td>" . htmlspecialchars($row['remarks']) . "</td>
          
            </tr>";
        }
        ?>
                                      
                                    </tbody>
                                </table>
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
</body>

</html>
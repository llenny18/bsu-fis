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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">OPMM</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">OPMM</li>
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
                            
                            
                            <div class="table-responsive p-1">
                <button onclick="addRow()" class="btn btn-primary m-3">+ Add New Row</button>
                            <?php
if (isset($_GET['op_id'])) {
    $op_id = $_GET['op_id'];

    // Fetch data from the operational_plan_view
    try {
        $query = "SELECT 
                    development_area_name,
                    outcome_name,
                    strategy_name,
                    pap_name,
                    performance_indicator,
                    personnel_office_concerned,
                    quarterly_target_q1,
                    quarterly_target_q2,
                    quarterly_target_q3,
                    quarterly_target_q4,
                    total_estimated_cost,
                    funding_source,
                    risks,
                    assessment_of_risk,
                    mitigating_activities
                  FROM operational_plan_full
                  WHERE unique_id = :op_id
                  ORDER BY development_area_name, outcome_name, strategy_name";

        $stmt = $pdo->prepare($query); // Use prepare instead of query
        $stmt->bindParam(':op_id', $op_id, PDO::PARAM_STR);
        $stmt->execute(); // Execute the prepared statement
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt2 = $pdo->prepare($query); // Use prepare instead of query
        $stmt2->bindParam(':op_id', $op_id, PDO::PARAM_STR);
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

<!-- HTML and Table Structure -->
<?php if (!empty($data)) { ?>
    <form method="post"> 
<table class="table table-bordered table-responsive-lg" id="opmm-table">
    <thead>
        <tr>
            <th scope="col">Development Area</th>
            <th scope="col" colspan="12"><?= $row2['development_area_name'] ?></th>
        </tr>
        <tr>
            <th scope="col">Outcome 1</th>
            <th scope="col" colspan="12"><?= $row2['outcome_name'] ?></th>
        </tr>
        <tr>
            <th scope="col">Strategy 1</th>
            <th scope="col" colspan="12"><?= $row2['strategy_name'] ?></th>
        </tr>
        <tr>
            <th rowspan="2">Program / Activity / Project</th>
            <th rowspan="2">Performance Indicator</th>
            <th rowspan="2">Personnel / Office Concerned</th>
            <th colspan="4">Quarterly Targets (Milestone) FY 2024</th>
            <th rowspan="2">Total Estimated Cost</th>
            <th rowspan="2">Funding Source</th>
            <th rowspan="2">Risks</th>
            <th rowspan="2">Assessment of Risk</th>
            <th rowspan="2">Mitigating Activities</th>
            <th rowspan="2">Action</th>
        </tr>
        <tr>
            <th>Q1</th>
            <th>Q2</th>
            <th>Q3</th>
            <th>Q4</th>
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
                <td>" . htmlspecialchars($row['pap_name']) . "</td>
                <td>" . htmlspecialchars($row['performance_indicator']) . "</td>
                <td>" . htmlspecialchars($row['personnel_office_concerned']) . "</td>
                <td>" . htmlspecialchars($row['quarterly_target_q1']) . "</td>
                <td>" . htmlspecialchars($row['quarterly_target_q2']) . "</td>
                <td>" . htmlspecialchars($row['quarterly_target_q3']) . "</td>
                <td>" . htmlspecialchars($row['quarterly_target_q4']) . "</td>
                <td>" . htmlspecialchars($row['total_estimated_cost']) . "</td>
                <td>" . htmlspecialchars($row['funding_source']) . "</td>
                <td>" . htmlspecialchars($row['risks']) . "</td>
                <td>" . htmlspecialchars($row['assessment_of_risk']) . "</td>
                <td>" . htmlspecialchars($row['mitigating_activities']) . "</td>
                <td><button class='edit-btn btn btn-primary' onclick='editRow(this)'>Edit</button></td>
            </tr>";
        }
        ?>
    </tbody>
</table>
</form>
<?php } else { ?>
<p>No data found for the provided Operational Plan ID.</p>
<?php } ?>

                            </div>
                        </div>
                    </div>
                    
                </div>
                
                
            </div>
          
        </div>
        
    </div>
    <script>
 function editRow(button) {
            // Get the row where the button was clicked
            var row = button.parentElement.parentElement;

            // Get the current values of the row
            var cell1 = row.cells[0].innerText;
            var cell2 = row.cells[1].innerText;
            var cell3 = row.cells[2].innerText;
            var cell4 = row.cells[3].innerText;
            var cell5 = row.cells[4].innerText;
            var cell6 = row.cells[5].innerText;
            var cell7 = row.cells[6].innerText;
            var cell8 = row.cells[7].innerText;
            var cell9 = row.cells[8].innerText;
            var cell10 = row.cells[9].innerText;
            var cell11 = row.cells[10].innerText;
            var cell12 = row.cells[11].innerText;
            var cell13 = row.cells[12].innerText;

            // Replace the current row values with input fields
            row.cells[0].innerHTML = `<input type="text" value="${cell1}">`;
            row.cells[1].innerHTML = `<input type="text" value="${cell2}">`;
            row.cells[2].innerHTML = `<input type="text" value="${cell3}">`;
            row.cells[3].innerHTML = `<input type="text" value="${cell4}">`;
            row.cells[4].innerHTML = `<input type="text" value="${cell5}">`;
            row.cells[5].innerHTML = `<input type="text" value="${cell6}">`;
            row.cells[6].innerHTML = `<input type="text" value="${cell7}">`;
            row.cells[7].innerHTML = `<input type="text" value="${cell8}">`;
            row.cells[8].innerHTML = `<input type="text" value="${cell9}">`;
            row.cells[9].innerHTML = `<input type="text" value="${cell10}">`;
            row.cells[10].innerHTML = `<input type="text" value="${cell11}">`;
            row.cells[11].innerHTML = `<input type="text" value="${cell12}">`;
            row.cells[12].innerHTML = `<button type="submit" class="btn btn-success" >Save Data</button>`;

           
        }


        function addRow() {
            // Get the table body
            var table = document.getElementById("opmm-table").getElementsByTagName('tbody')[0];

            // Create a new row
            var newRow = table.insertRow();

            // Insert new cells and add data
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);
            var cell7 = newRow.insertCell(6);
            var cell8 = newRow.insertCell(7);
            var cell9 = newRow.insertCell(8);
            var cell10 = newRow.insertCell(9);
            var cell11 = newRow.insertCell(10);
            var cell12 = newRow.insertCell(11);
            var cell13 = newRow.insertCell(12);

            // Add text input for each cell
            cell1.innerHTML = '<input type="text" placeholder="Enter Name">';
            cell2.innerHTML = '<input type="number" placeholder="Enter Age">';
            cell3.innerHTML = '<input type="text" placeholder="Enter City">';
            cell4.innerHTML = '<input type="text" placeholder="Enter City">';
            cell5.innerHTML = '<input type="text" placeholder="Enter City">';
            cell6.innerHTML = '<input type="text" placeholder="Enter City">';
            cell7.innerHTML = '<input type="text" placeholder="Enter City">';
            cell8.innerHTML = '<input type="text" placeholder="Enter City">';
            cell9.innerHTML = '<input type="text" placeholder="Enter City">';
            cell10.innerHTML = '<input type="text" placeholder="Enter City">';
            cell11.innerHTML = '<input type="text" placeholder="Enter City">';
            cell12.innerHTML = '<input type="text" placeholder="Enter City">';
            cell13.innerHTML = '<button type="submit" class="btn btn-success" >Insert Data</button>';
        }
    </script>
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
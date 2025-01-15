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
    
   
    ?>
    
    <link href="dist/css/style.min.css" rel="stylesheet">
   
</head>

<body>

  
<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        // Handle the form data for development area, outcome, strategy, and pap
        $developmentAreaName = isset($_POST['selected_development_area']) ? getValueAfterHyphen($_POST['d_name']) : $_POST['d_name'];
        $selectedDevelopmentAreaId = isset($_POST['selected_development_area']) ? getValueBeforeHyphen($_POST['selected_development_area']) :  null;

        $outcomeName = isset($_POST['selected_outcome']) ? getValueAfterHyphen($_POST['outcome']) : $_POST['outcome'];
        $selectedOutcomeId = isset($_POST['selected_outcome']) ? getValueBeforeHyphen($_POST['selected_outcome']) :  null;

        $strategyName = isset($_POST['selected_strategy']) ? getValueAfterHyphen($_POST['strategy']) : $_POST['strategy'];
        $selectedStrategyId = isset($_POST['selected_strategy']) ?  getValueBeforeHyphen($_POST['selected_strategy']) :  null;

        $papName = isset($_POST['selected_pap']) ? getValueAfterHyphen($_POST['pap']) : $_POST['pap'];
        $selectedPapId = isset($_POST['selected_pap']) ?  getValueBeforeHyphen($_POST['selected_pap']) : null;

        // Other form data
        $performanceIndicator = $_POST['p_indicator'] ?? null;
        $personnel = $_POST['personnel'] ?? null;
        $q1 = $_POST['q1'] ?? null;
        $q2 = $_POST['q2'] ?? null;
        $q3 = $_POST['q3'] ?? null;
        $q4 = $_POST['q4'] ?? null;
        $totalEstimate = $_POST['t_estimate'] ?? null;
        $fundingSource = $_POST['f_resource'] ?? null;
        $risk = $_POST['risk'] ?? null;
        $riskAssessment = $_POST['r_assesment'] ?? null;
        $mitigatingActivities = $_POST['m_activity'] ?? null;

        // Initialize PDO transaction
        try {
            // Insert or fetch Development Area
            if (!isset($_POST['selected_development_area'])) {
                $stmt = $pdo->prepare("INSERT INTO development_area (name) VALUES (:name)");
                $stmt->execute([':name' => $developmentAreaName]);
                $developmentAreaId = $pdo->lastInsertId();
            } else {
                $developmentAreaId = $selectedDevelopmentAreaId;
            }
        } catch (Exception $e) {
            echo "Error inserting Development Area: " . $e->getMessage();
            exit;
        }
        
        try {
            // Insert or fetch Outcome
            if (!isset($_POST['selected_outcome'])) {
                $stmt = $pdo->prepare("INSERT INTO outcome (name, development_area_id) VALUES (:name, :development_area_id)");
                $stmt->execute([':name' => $outcomeName, ':development_area_id' => $developmentAreaId]);
                $outcomeId = $pdo->lastInsertId();
            } else {
                $outcomeId = $selectedOutcomeId;
            }
        } catch (Exception $e) {
            echo "Error inserting Outcome: " . $e->getMessage();
            exit;
        }
        
        try {
            // Insert or fetch Strategy
            if (!isset($_POST['selected_strategy'])) {
                $stmt = $pdo->prepare("INSERT INTO strategy (name, outcome_id) VALUES (:name, :outcome_id)");
                $stmt->execute([':name' => $strategyName, ':outcome_id' => $outcomeId]);
                $strategyId = $pdo->lastInsertId();
            } else {
                $strategyId = $selectedStrategyId;
            }
        } catch (Exception $e) {
            echo "Error inserting Strategy: " . $e->getMessage();
            exit;
        }
        echo "<script>alert('no dn: {$strategyId}');</script>";
        
       

        try {
            // Insert data into the OPMM table
            $stmt = $pdo->prepare("
                INSERT INTO pap (
                    strategy_id, name, performance_indicator, personnel_office_concerned, quarterly_target_q1, quarterly_target_q2, quarterly_target_q3, quarterly_target_q4, total_estimated_cost, funding_source, risks, assessment_of_risk, mitigating_activities
                ) VALUES (
                     :strategy_id,:papname, :performance_indicator, :personnel, :q1, :q2, :q3, :q4, :total_estimate, :funding_source, :risk, :risk_assessment, :mitigating_activities
                )
            ");
            $stmt->execute([
               
                ':strategy_id' => $strategyId,
                ':papname' => $papName,
                ':performance_indicator' => $performanceIndicator,
                ':personnel' => $personnel,
                ':q1' => $q1,
                ':q2' => $q2,
                ':q3' => $q3,
                ':q4' => $q4,
                ':total_estimate' => $totalEstimate,
                ':funding_source' => $fundingSource,
                ':risk' => $risk,
                ':risk_assessment' => $riskAssessment,
                ':mitigating_activities' => $mitigatingActivities,
            ]);
            echo "Data successfully inserted into OPMM.";
        } catch (Exception $e) {
            echo "Error inserting OPMM data: " . $e->getMessage();
            exit;
        }
        
        
}

?>


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
                          

<!-- HTML and Table Structure -->

    <form method="post"> 
<table class="table table-bordered table-responsive-lg" id="opmm-table">
    <thead>
    <tr>
    <th scope="col">Development Area</th>
    <tr>
    <th scope="col">Development Area</th>
    <th scope="col" colspan="12" style="white-space: nowrap;">
        <select class="form-control" style="width: 10%; display: inline-block; margin-right: 5px;" onchange="selectValue('development-area', this)" name="selected_development_area">
            <option value="">Select Development Area</option>
                <option value="">+ New</option>
                <?php foreach ($developmentAreas as $row): ?>
                <option value="<?php echo htmlspecialchars($row['id'])." - ".htmlspecialchars($row['name']); ?>"><?php echo htmlspecialchars($row['name']); ?></option>
            <?php endforeach; ?>
        </select>
        <input name="d_name" class="form-control" style="width: 90%; display: inline-block; border: 1px solid darkred;" type="text" id="development-area">
    </th>
</tr>
<tr>
    <th scope="col">Outcome</th>
    <th scope="col" colspan="12" style="white-space: nowrap;">
        <select class="form-control" style="width: 10%; display: inline-block; margin-right: 5px;" onchange="selectValue('outcome', this)" name="selected_outcome">
            <option value="">Select Outcome</option>
                <option value="">+ New</option>
                <?php foreach ($outcomes as $row): ?>
                <option value="<?php echo htmlspecialchars($row['id'])." - ".htmlspecialchars($row['outcome']); ?>"><?php echo htmlspecialchars($row['outcome']); ?></option>
            <?php endforeach; ?>
        </select>
        <input name="outcome" class="form-control" style="width: 90%; display: inline-block; border: 1px solid darkred;" type="text" id="outcome">
    </th>
</tr>
<tr>
    <th scope="col">Strategy</th>
    <th scope="col" colspan="12" style="white-space: nowrap;">
        <select class="form-control" style="width: 10%; display: inline-block; margin-right: 5px;" onchange="selectValue('strategy', this)" name="selected_strategy">
            <option value="">Select Strategy</option>
                <option value="">+ New</option>
                <?php foreach ($strategies as $row): ?>
                <option value="<?php echo htmlspecialchars($row['id'])." - ".htmlspecialchars($row['strategy']); ?>"><?php echo htmlspecialchars($row['strategy']); ?></option>
            <?php endforeach; ?>
        </select>
        <input name="strategy" class="form-control" style="width: 90%; display: inline-block; border: 1px solid darkred;" type="text" id="strategy">
    </th>
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
    <tr>
    <td><select class="form-control" style="width: 100%; display: inline-block; margin-right: 5px;" onchange="selectValue('pap', this)" name="selected_pap">
            <option value="">Select Program / Activity / Project</option>
                <option value="">+ New</option>
                <?php foreach ($pap as $row): ?>
                <option value="<?php echo htmlspecialchars($row['id'])." - ".htmlspecialchars($row['name']); ?>"><?php echo htmlspecialchars($row['name']); ?></option>
            <?php endforeach; ?>
        </select>
        <hr>
        <textarea type="text" name="pap" id="pap" style="width: 250px; border: 1px solid darkred;"></textarea></td>
    <td><textarea type="text" name="p_indicator" id="" style="width: 250px; border: 1px solid darkred;"></textarea></td>
    <td><textarea type="text" name="personnel" id="" style="width: 250px; border: 1px solid darkred;"></textarea></td>
    <td><textarea type="text" name="q1" id="" style="width: 250px; border: 1px solid darkred;"></textarea></td>
    <td><textarea type="text" name="q2" id="" style="width: 250px; border: 1px solid darkred;"></textarea></td>
    <td><textarea type="text" name="q3" id="" style="width: 250px; border: 1px solid darkred;"></textarea></td>
    <td><textarea type="text" name="q4" id="" style="width: 250px; border: 1px solid darkred;"></textarea></td>
    <td><textarea type="text" name="t_estimate" id="" style="width: 250px; border: 1px solid darkred;"></textarea></td>
    <td><textarea type="text" name="f_resource" id="" style="width: 250px; border: 1px solid darkred;"></textarea></td>
    <td><textarea type="text" name="risk" id="" style="width: 250px; border: 1px solid darkred;"></textarea></td>
    <td><textarea type="text" name="r_assesment" id="" style="width: 250px; border: 1px solid darkred;"></textarea></td>
    <td><textarea type="text" name="m_activity" id="" style="width: 250px; border: 1px solid darkred;"></textarea></td>
    <td><button type="submit">Save</button></td>
</tr>
     
    </tbody>
</table>
</form>


                            </div>
                        </div>
                    </div>
                    
                </div>
                
                
            </div>
          
        </div>
        
    </div>
    <script>

function selectValue(inputId, selectElement) {
    // Get the selected value from the dropdown
    var selectedValue = selectElement.value;
    
    // Set the value to the corresponding input field
    document.getElementById(inputId).value = selectedValue;
}


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
<?php include("../controller/controller.php"); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <?php include("./title.php");
    
if (isset($_GET['op_id'])) {
    $op_id = $_GET['op_id'];

    // Fetch data from the operational_plan_view
    try {
        $query = "SELECT 
                    development_area_name,
                    outcome_name,
                    strategy_name,
                    pap_name,
                    pap_id,
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
                    status,
                    mitigating_activities
                  FROM operational_plan_full
                  WHERE unique_id = :op_id 
                  ORDER BY development_area_name, outcome_name, strategy_name, pap_name ";

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
    
    <link href="dist/css/style.min.css" rel="stylesheet">
   
</head>

<body>

  
    

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        
        <?php include("./nav.php") ?>
      
        <div class="page-wrapper">
          
            <div class="page-breadcrumb">
            <hr class="red-hr-design">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Operational Record Full Data  <a href="view-oppm.php?op_id=<?= $_GET['op_id'] ?>" class="btn btn-success"> Return to list</a></h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Operational Record Full Data</li>
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

$op_id_parts = explode("-", $_GET['op_id']);

// Assign values to variables
$dname_get = $op_id_parts[0]; // First number
$outcome_get = $op_id_parts[1]; // Second number
$strategy_get = $op_id_parts[2]; // Third number

                            
if(isset($_POST['dname_btn'])){
    $sql = "UPDATE development_area SET name = :name WHERE id = :id";
    
    // Prepare the query
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':name', $newName);
    $stmt->bindParam(':id', $dname_get);
    
    // Set values for the parameters (for example purposes)
    $newName = $_POST['dname']; // The new username
    $did = $dname_get; // The user ID to update
    
    // Execute the query
    $stmt->execute();
    
    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        echo "<script>Swal.fire({
                icon: 'success',
                title: 'Update Success',
                text: 'Development Area Name updated successfully!',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = window.location.href;
            });</script>";
    }

}
                        
if(isset($_POST['outcome_btn'])){

    $sql = "UPDATE outcome SET name = :name WHERE id = :id";
    
    // Prepare the query
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':name', $newName);
    $stmt->bindParam(':id', $dname_get);
    
    // Set values for the parameters (for example purposes)
    $newName = $_POST['outcome']; // The new username
    $did = $outcome_get; // The user ID to update
    
    // Execute the query
    $stmt->execute();
    
    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        echo "<script>
        Swal.fire({
                icon: 'success',
                title: 'Update Success',
                text: 'Outcome Name updated successfully!',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = window.location.href;
            });
        </script>";
    }
}

                  

if(isset($_POST['pap_btn'])) {
    // Ensure values are received as arrays
    $ids = $_POST['pap_name'];  // Array of PAP IDs
    $performance_indicators = $_POST['p_indicator'];  // Array of performance indicators
    $personnel_offices = $_POST['personnel'];  // Array of personnel
    $q1_values = $_POST['q1'];  // Array of Q1 values
    $q2_values = $_POST['q2'];  // Array of Q2 values
    $q3_values = $_POST['q3'];  // Array of Q3 values
    $q4_values = $_POST['q4'];  // Array of Q4 values
    $total_estimates = $_POST['t_estimate'];  // Array of total estimates
    $funding_sources = $_POST['f_resource'];  // Array of funding sources
    $risks = $_POST['risk'];  // Array of risks
    $assessments = $_POST['r_assesment'];  // Array of assessments
    $mitigations = $_POST['m_activity'];  // Array of mitigating activities
    $id_pap = $_POST['id_pap'];  // Array of mitigating activities

    // Loop through each submitted row
    foreach($ids as $index => $pap_vid) {
        // Prepare the update SQL statement
        $sql = "UPDATE pap SET 
            name = :name, 
            performance_indicator = :performance_indicator, 
            personnel_office_concerned = :personnel_office_concerned, 
            quarterly_target_q1 = :quarterly_target_q1,
            quarterly_target_q2 = :quarterly_target_q2, 
            quarterly_target_q3 = :quarterly_target_q3, 
            quarterly_target_q4 = :quarterly_target_q4, 
            total_estimated_cost = :total_estimated_cost,
            funding_source = :funding_source, 
            risks = :risks, 
            assessment_of_risk = :assessment_of_risk, 
            mitigating_activities = :mitigating_activities
            WHERE id = :id";

        // Prepare the query
        $stmt = $pdo->prepare($sql);

        // Bind parameters for each row
        $stmt->bindParam(':name', $_POST['pap_name'][$index]);
        $stmt->bindParam(':performance_indicator', $_POST['p_indicator'][$index]);
        $stmt->bindParam(':personnel_office_concerned', $_POST['personnel'][$index]);
        $stmt->bindParam(':quarterly_target_q1', $_POST['q1'][$index]);
        $stmt->bindParam(':quarterly_target_q2', $_POST['q2'][$index]);
        $stmt->bindParam(':quarterly_target_q3', $_POST['q3'][$index]);
        $stmt->bindParam(':quarterly_target_q4', $_POST['q4'][$index]);
        $stmt->bindParam(':total_estimated_cost', $_POST['t_estimate'][$index]);
        $stmt->bindParam(':funding_source', $_POST['f_resource'][$index]);
        $stmt->bindParam(':risks', $_POST['risk'][$index]);
        $stmt->bindParam(':assessment_of_risk', $_POST['r_assesment'][$index]);
        $stmt->bindParam(':mitigating_activities', $_POST['m_activity'][$index]);
        $stmt->bindParam(':id', $id_pap[$index]);  // PAP ID for the current row

        // Execute the query
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            // Handle any errors
            echo "Error: " . $e->getMessage();
        }
    }

    // Confirm the update success
    echo "<script>window.location.href='view-oppm.php?op_id=".$_GET['op_id']."';
     Swal.fire({
                icon: 'success',
                title: 'Update Success',
                text: 'PAP Details updated successfully!',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = window.location.href;
            });
    </script>";
}


if (isset($_POST['pap_new'])) {
    // SQL query with correct placeholders
    $sql = "INSERT INTO pap (
        strategy_id, 
        name, 
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
    ) 
    VALUES (
        :strategy_id, 
        :name, 
        :performance_indicator, 
        :personnel_office_concerned, 
        :quarterly_target_q1, 
        :quarterly_target_q2, 
        :quarterly_target_q3, 
        :quarterly_target_q4, 
        :total_estimated_cost, 
        :funding_source, 
        :risks, 
        :assessment_of_risk, 
        :mitigating_activities
    )";

    try {
        // Prepare the query
        $stmt = $pdo->prepare($sql);

       

        // Bind parameters with actual data
        $stmt->bindParam(':strategy_id', $strategy_get, PDO::PARAM_INT);
        $stmt->bindParam(':name', $_POST['pap_namea'], PDO::PARAM_STR);
        $stmt->bindParam(':performance_indicator', $_POST['p_indicatora'], PDO::PARAM_STR);
        $stmt->bindParam(':personnel_office_concerned', $_POST['personnela'], PDO::PARAM_STR);
        $stmt->bindParam(':quarterly_target_q1', $_POST['q1a'], PDO::PARAM_STR);
        $stmt->bindParam(':quarterly_target_q2', $_POST['q2a'], PDO::PARAM_STR);
        $stmt->bindParam(':quarterly_target_q3', $_POST['q3a'], PDO::PARAM_STR);
        $stmt->bindParam(':quarterly_target_q4', $_POST['q4a'], PDO::PARAM_STR);
        $stmt->bindParam(':total_estimated_cost', $_POST['t_estimatea'], PDO::PARAM_STR);
        $stmt->bindParam(':funding_source', $_POST['f_resourcea'], PDO::PARAM_STR);
        $stmt->bindParam(':risks', $_POST['riska'], PDO::PARAM_STR);
        $stmt->bindParam(':assessment_of_risk', $_POST['r_assesmenta'], PDO::PARAM_STR);
        $stmt->bindParam(':mitigating_activities', $_POST['m_activitya'], PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->rowCount() > 0) {
            echo "<script> Swal.fire({
                icon: 'success',
                title: 'PAP Details added successfully!',
                text: 'The record has been updated successfully!',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = window.location.href;
            });</script>";
        } else {
            echo "<script>
             Swal.fire({
                icon: 'error',
                title: 'Update failed'',
                text: 'Failed to add PAP Details.',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = window.location.href;
            });
            </script>";
        }
    } catch (PDOException $e) {
        // Handle errors
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}



                        
if(isset($_POST['strategy_btn'])){
    $sql = "UPDATE strategy SET name = :name WHERE id = :id";
    
    // Prepare the query
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':name', $newName);
    $stmt->bindParam(':id', $dname_get);
    
    // Set values for the parameters (for example purposes)
    $newName = $_POST['strategy']; // The new username
    $did = $strategy_get; // The user ID to update
    
    // Execute the query
    $stmt->execute();
    
    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        echo "<script>
        Swal.fire({
                icon: 'success',
                title: 'Update Success',
                text: 'Strategy Name updated successfully!',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = window.location.href;
            });
        </script>";
    }
  
}



?>

<!-- HTML and Table Structure -->
<?php if (!empty($data)) { ?>
    <form method="post"> 
<table  style="color: #2e2d2d;"   class="table table-bordered table-responsive-lg" id="opmm-table">
    <thead>
        <tr>
            <th scope="col">Development Area</th>
            <th scope="col" colspan="12"><?= $row2['development_area_name'] ?> </th>
            <th scope="col"><button class='edit-btn btn btn-primary' onclick='editDA(this)'>Edit</button></th>
            </tr>
        <tr>
            <th scope="col">Outcome </th>
            <th scope="col" colspan="12"><?= $row2['outcome_name'] ?> </th>
            <th scope="col"><button class='edit-btn btn btn-primary' onclick='editOC(this)'>Edit</button> </th>
            </tr>
        <tr>
            <th scope="col">Strategy </th>
            <th scope="col" colspan="12"><?= $row2['strategy_name'] ?> </th>
            <th scope="col"><button class='edit-btn btn btn-primary' onclick='editST(this)'>Edit</button> </th>
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
            <th rowspan="2">ID</th>
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
   function countPAPRows($data, $papName)
   {
       $count = 0;
       foreach ($data as $row) {
           if ($row['pap_name'] === $papName) {
               $count++;
           }
       }
       return $count;
   }

    $lastPAP = ''; // To track the last rendered PAP name

    foreach ($data as $row) {
        if($row['status'] == "archived"){
        
        

        // Render other columns
        echo "<td>" . htmlspecialchars($row['pap_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['performance_indicator']) . "</td>";
        echo "<td>" . htmlspecialchars($row['personnel_office_concerned']) . "</td>";
        echo "<td>" . htmlspecialchars($row['quarterly_target_q1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['quarterly_target_q2']) . "</td>";
        echo "<td>" . htmlspecialchars($row['quarterly_target_q3']) . "</td>";
        echo "<td>" . htmlspecialchars($row['quarterly_target_q4']) . "</td>";
        echo "<td>" . htmlspecialchars($row['total_estimated_cost']) . "</td>";
        echo "<td>" . htmlspecialchars($row['funding_source']) . "</td>";
        echo "<td>" . htmlspecialchars($row['risks']) . "</td>";
        echo "<td>" . htmlspecialchars($row['assessment_of_risk']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mitigating_activities']) . "</td>";
        echo "<td>" . htmlspecialchars($row['pap_id']) . "</td>";
        echo "<td><button class='edit-btn btn btn-primary' onclick='editRow(this)'>Edit</button>
        <hr>
        <a href='archive.php?id_value={$row['pap_id']}&id_name=id&table=pap&link=view-oppm.php?op_id=1-1-1' class='btn btn-danger'>Archive</a>
        ";
        findPAP($pdo, $row['pap_id'], $_GET['op_id']);
        echo"
        </td>";

        echo "</tr>";
    }
    }

    /**
     * Helper function to count the number of rows for a specific PAP.
     */
 
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
function editDA(button) {
            // Get the row where the button was clicked
            var row = button.parentElement.parentElement;

            // Get the current values of the row
            var cell1 = row.cells[1].innerText;
            var cell2 = row.cells[2].innerText;
            

            // Replace the current row values with input fields
            row.cells[1].innerHTML = `<input required type="text" name="dname" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell1}"> `;
            row.cells[2].innerHTML = `<button type="submit" name="dname_btn" class="btn btn-success" >Save</button>`;

        }

        
function editOC(button) {
            // Get the row where the button was clicked
            var row = button.parentElement.parentElement;
            var cell1 = row.cells[1].innerText;
            var cell2 = row.cells[2].innerText;
            

            // Replace the current row values with input fields
            row.cells[1].innerHTML = `<input required type="text" name="outcome" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell1}"> `;
            row.cells[2].innerHTML = `<button type="submit" name="outcome_btn" class="btn btn-success" >Save</button>`;
        }

        
function editST(button) {
            // Get the row where the button was clicked
            var row = button.parentElement.parentElement;

            var cell1 = row.cells[1].innerText;
            var cell2 = row.cells[2].innerText;
            

            // Replace the current row values with input fields
            row.cells[1].innerHTML = `<input required type="text" name="strategy" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell1}"> `;
            row.cells[2].innerHTML = `<button type="submit" name="strategy_btn" class="btn btn-success" >Save</button>`;
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
            var cell14 = row.cells[13].innerText;

            // Replace the current row values with input fields
            row.cells[0].innerHTML = `<input required type="text" name="pap_name[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;"  value="${cell1}">`;
            row.cells[1].innerHTML = `<input required type="text" name="p_indicator[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell2}">`;
            row.cells[2].innerHTML = `<input required type="text" name="personnel[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell3}">`;
            row.cells[3].innerHTML = `<input required type="text" name="q1[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell4}">`;
            row.cells[4].innerHTML = `<input required type="text" name="q2[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell5}">`;
            row.cells[5].innerHTML = `<input required type="text" name="q3[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell6}">`;
            row.cells[6].innerHTML = `<input required type="text" name="q4[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell7}">`;
            row.cells[7].innerHTML = `<input required type="text" name="t_estimate[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell8}">`;
            row.cells[8].innerHTML = `<input required type="text" name="f_resource[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell9}">`;
            row.cells[9].innerHTML = `<input required type="text" name="risk[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell10}">`;
            row.cells[10].innerHTML = `<input required type="text" name="r_assesment[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell11}">`;
            row.cells[11].innerHTML = `<input required type="text" name="m_activity[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell12}">`;
            row.cells[12].innerHTML = `<input required type="text" name="id_pap[]" class="form-control" style="width: 50px; display: inline-block; border: 1px solid darkred;" readonly value="${cell13}">`;
            row.cells[13].innerHTML = `<button type="submit" name="pap_btn[]" class="btn btn-success" >Save Data</button>`;

           
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
            cell1.innerHTML = '<input required type="text" name="pap_namea" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell2.innerHTML = '<input required type="text" name="p_indicatora" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell3.innerHTML = '<input required type="text" name="personnela" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell4.innerHTML = '<input required type="text" name="q2a" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell5.innerHTML = '<input required type="text" name="q3a" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell6.innerHTML = '<input required type="text" name="q2a" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell7.innerHTML = '<input required type="text" name="q4a" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell8.innerHTML = '<input required type="number" name="t_estimatea" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell9.innerHTML = '<input required type="text" name="f_resourcea" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell10.innerHTML = '<input required type="text" name="riska" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell11.innerHTML = '<input required type="text" name="r_assesmenta" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell12.innerHTML = '<input required type="text" name="m_activitya" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell13.innerHTML = '<button type="submit" class="btn btn-success" name="pap_new" >Insert Data</button>';
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
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link href="dist/css/style.min.css" rel="stylesheet">
   
</head>

<body>
  
    

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        
        <?php include("./nav.php");
        
                  
        if (isset($_POST['edit_matrix'])) {
            // Prepare SQL query for updating multiple records
            $sql = "UPDATE operational_plan_monitoring_matrix 
                    SET actual_accomplishments = :actual_accomplishments, 
                        variance = :variance, 
                        remarks = :remarks
                    WHERE id = :id";
        
            // Prepare the query
            $stmt = $pdo->prepare($sql);
        
            // Loop through the arrays and execute updates
            foreach ($_POST['m_id'] as $key => $m_id) {
                // Bind the parameters dynamically for each row
                $stmt->bindParam(':actual_accomplishments', $_POST['accomplished'][$key]);
                $stmt->bindParam(':variance', $_POST['variance'][$key]);
                $stmt->bindParam(':remarks', $_POST['remarks'][$key]);
                $stmt->bindParam(':id', $m_id);
        
                // Execute the query
                $stmt->execute();
            }
        
            // Check if any rows were updated
            if ($stmt->rowCount() > 0) {
                echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Update Success',
                text: 'Matrix updated successfully!',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = window.location.href;
            });</script>";
            }
        }
        

        if (isset($_POST['saveAll'])) {
            // Prepare SQL query for inserting multiple records
            $sql = "INSERT INTO operational_plan_monitoring_matrix 
                    (m_pap_id, id, actual_accomplishments, variance, remarks) 
                    VALUES (:npid, :id, :actual_accomplishments, :variance, :remarks)";
            
            // Prepare the query
            $stmt = $pdo->prepare($sql);
        
            // Loop through the arrays and execute inserts
            foreach ($_POST['n_m_id'] as $key => $m_id) {
                // Bind the parameters dynamically for each row
                $stmt->bindParam(':id', $m_id);
                $stmt->bindParam(':npid', $_POST['n_p_id'][$key]);
                $stmt->bindParam(':actual_accomplishments', $_POST['accomplished'][$key]);
                $stmt->bindParam(':variance', $_POST['variance'][$key]);
                $stmt->bindParam(':remarks', $_POST['remarks'][$key]);
        
                // Execute the query
                $stmt->execute();
            }
        
            // Check if any rows were inserted
            if ($stmt->rowCount() > 0) {
                echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Insert Success',
                text: 'Matrix inserted successfully!',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = window.location.href;
            });</script>";
            }
        }
        
        
                   
if(isset($_POST['matrix_new'])){

    $sql = "INSERT INTO operational_plan_monitoring_matrix 
    (actual_accomplishments, variance, remarks, m_pap_id, opmm_fid) VALUES(:actual_accomplishments, :variance, :remarks, :id, :opmm_fid);";
    
    // Prepare the query
    $stmt = $pdo->prepare($sql);
    

    // Bind parameters
    $stmt->bindParam(':actual_accomplishments', $actual_accomplishments);
    $stmt->bindParam(':variance', $variance);
    $stmt->bindParam(':remarks', $remarks);
    $stmt->bindParam(':id', $m_id);
    $stmt->bindParam(':opmm_fid', $opmm_fid);
    
    // Set values for the parameters (for example purposes)
    $actual_accomplishments = $_POST['accomplished']; // The new username
    $variance = $_POST['variance']; // The new username
    $remarks = $_POST['remarks']; // The new username
    $m_id = $_GET['new_id']; // The new username
    $opmm_fid = $_GET['pap_id']; // The new username
    
    // Execute the query
    $stmt->execute();
    
    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        echo "<script>window.location.href='view-oppm-matrix.php?pap_id=".$_GET['pap_id']."';
        Swal.fire({
                icon: 'success',
                title: 'Update Success',
                text: 'Matrix inserted successfully!',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = window.location.href;
            });
        </script>";
    }
}

         ?>
      
        <div class="page-wrapper">
          
            <div class="page-breadcrumb">
            <hr class="red-hr-design">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Archived Operational Plan Matrix Data  <a href="view-oppm-matrix.php?pap_id=<?= $_GET['pap_id'] ?>" class="btn btn-success"> Return to List</a></h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Operational Plan Matrix Data Archive</li>
                                </ol>
                            </nav>
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
        $query = "SELECT * FROM `operational_plan_view_matrix`  WHERE development_area_id = :pap_id and pstatus='archived' GROUP BY pap_id";

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
                                <form action="" method="post">
                                <table  style="color: #2e2d2d;"  class="table table-bordered table-responsive-lg" id="opmm-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Development Area</th>
                                            <th scope="col" colspan="6"><?= $row2['development_area_name'] ?></th>
                                            <th scope="col"><button class='edit-btn btn btn-primary' onclick='editDA(this)'>Edit</button><hr><button class='edit-btn btn btn-success' type="submit" name="saveAll">Insert All Data</button></th>
                                            
                                        </tr>
                                       
                                        <tr>
                                        <th scope="col" style="display: none;">ID</th>
                                        <th >Outcomes</th>
                                        <th >Strategy/ies</th>
                                        <th >Action Step/Program, Activites, Projects (PAPs)</th>
                                        <th >Performace Indicator</th>
                                        <th >Actual Accomplishments</th>
                                        <th >Variance</th>
                                        <th >Remarks</th>
                                        <th >Action</th>
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
                                                    <td style='display: none'>" .  htmlspecialchars($row['id']) . "</td>
                                                    <td>" .  htmlspecialchars($row['outcome_name']) . "</td>
                                                    <td>" .htmlspecialchars($row['strategy_name']) . "</td>
                                                    <td>" . htmlspecialchars($row['pap_name']) . "</td>
                                                    <td>" . htmlspecialchars($row['performance_indicator']) . "</td>";
                                                    if(empty($row['actual_accomplishments']) || empty($row['actual_accomplishments']) ||empty($row['remarks'])) { 
                                                        echo "<td style ='display:none'>" . '<input required type="hidden" name="n_p_id[]" value="'.$row['pap_id'].'">' . '<input required type="hidden" name="n_m_id[]" value="'.$row['id'].'">' . "</td>";

                                                     }

                                                    if(empty($row['actual_accomplishments'])) { echo  ' <td> <input required type="text" name="accomplished[]" class="form-control" style="width: 200px; display: inline-block; border: 1px solid darkred;" > </td> '; } else { echo "<td>". htmlspecialchars($row['actual_accomplishments']) . "</td>"; }
                                                    if(empty($row['variance'])) { echo  ' <td> <input required type="text" name="variance[]" class="form-control" style="width: 200px; display: inline-block; border: 1px solid darkred;" ></td> '; } else { echo "<td>". htmlspecialchars($row['variance']) . "</td>"; }
                                                    if(empty($row['remarks'])) { echo  ' <td> <input required type="text" name="remarks[]" class="form-control" style="width: 200px; display: inline-block; border: 1px solid darkred;" ></td> '; } else { echo "<td>". htmlspecialchars($row['remarks']) . "</td>"; }
                                                    echo "<td><button class='edit-btn btn btn-primary' onclick='editRow(this)'>Edit</button>";
                                                    echo "<hr>
                                                    <a href='recover.php?id_value={$row['pap_id']}&id_name=id&table=pap&link=view-oppm-matrix_a.php?pap_id=".$_GET['pap_id']."' class='btn btn-danger'>Restore</a>
                                                    </td>
                                            
                                                </tr>";
                                            }
                                            ?>
                                                                        
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
    var cell5 = row.cells[5].innerText;
    var cell6 = row.cells[6].innerText;
    var cell7 = row.cells[7].innerText;
    var cell8 = row.cells[8].innerText;

    // Replace the current row values with input fields
    row.cells[0].innerHTML = `<input required type="hidden" name="m_id[]" value="${cell1}">`;
    row.cells[5].innerHTML = `<input required type="text" name="accomplished[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell5}">`;
    row.cells[6].innerHTML = `<input required type="text" name="variance[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell6}">`;

    // Replace the remarks cell with a select box that reflects the current value
    row.cells[7].innerHTML = `
        <select name="remarks[]" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;">
            <option value="">Select...</option>
            <option value="Met" ${cell7 === 'Met' ? 'selected' : ''}>Met</option>
            <option value="Partially Met" ${cell7 === 'Partially Met' ? 'selected' : ''}>Partially Met</option>
            <option value="Ongoing" ${cell7 === 'Ongoing' ? 'selected' : ''}>Ongoing</option>
            <option value="Unmet" ${cell7 === 'Unmet' ? 'selected' : ''}>Unmet</option>
            <option value="Not Applicable" ${cell7 === 'Not Applicable' ? 'selected' : ''}>Not Applicable</option>
        </select>
    `;

    row.cells[8].innerHTML = `<button type="submit" name="edit_matrix" class="btn btn-success">Save Data</button>`;
}








    </script>


<?php
if (isset($_GET['new_id'])) {
    try {
        $npap_id = $_GET['new_id']; // Ensure you're setting this variable
        $opmm_fid = 1; // Replace this with the actual value or retrieve it dynamically

        $query_new = "SELECT COUNT(*) AS row_count FROM operational_plan_monitoring_matrix WHERE m_pap_id = :npap_id AND opmm_fid = :opmm_fid";
        $stmt_new = $pdo->prepare($query_new);
        $stmt_new->bindParam(':npap_id', $npap_id, PDO::PARAM_INT);
        $stmt_new->bindParam(':opmm_fid', $opmm_fid, PDO::PARAM_INT);
        $stmt_new->execute();
        $row_new = $stmt_new->fetch(PDO::FETCH_ASSOC);
        $row_count = $row_new['row_count'];

        if ($row_count == 0) {
            $query_new = "SELECT * FROM operational_plan_full WHERE pap_id = :npap_id";
            $stmt_new = $pdo->prepare($query_new);
            $stmt_new->bindParam(':npap_id', $npap_id, PDO::PARAM_INT);
            $stmt_new->execute();
            $row_new = $stmt_new->fetch(PDO::FETCH_ASSOC);

            // Ensure $row_new contains valid data
            if ($row_new) {
?>
                <script>
                    // Get the table body
                    var table = document.getElementById("opmm-table").getElementsByTagName("tbody")[0];

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

                    // Add text input for each cell
                    cell1.innerHTML = '<input required type="text" name="outcome" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="<?= htmlspecialchars($row_new['outcome_name']) ?>" readonly>';
                    cell2.innerHTML = '<input required type="text" name="strategy" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="<?= htmlspecialchars($row_new['strategy_name']) ?>" readonly>';
                    cell3.innerHTML = '<input required type="text" name="pap_name" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="<?= htmlspecialchars($row_new['pap_name']) ?>" readonly>';
                    cell4.innerHTML = '<input required type="text" name="performance" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="<?= htmlspecialchars($row_new['performance_indicator']) ?>" readonly>';
                    cell5.innerHTML = '<input required type="text" name="accomplished" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" placeholder="Actual accomplishments here">';
                    cell6.innerHTML = '<input required type="text" name="variance" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" placeholder="Variance">';
                    cell7.innerHTML = '<input required type="text" name="remarks" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" placeholder="Remarks here">';
                    cell8.innerHTML = '<button type="submit" class="btn btn-success" name="matrix_new">Insert Data</button>';
                </script>
<?php
            } else {
                echo "<p>No data found for the specified ID.</p>";
            }
        }
    } catch (PDOException $e) {
        // Handle database-specific exceptions
        echo "Database error: " . htmlspecialchars($e->getMessage());
    } catch (Exception $e) {
        // Handle other exceptions
        echo "An error occurred: " . htmlspecialchars($e->getMessage());
    }
}
?>

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
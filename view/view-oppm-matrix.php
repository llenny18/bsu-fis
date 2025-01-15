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
                <button onclick="addRow()" class="btn btn-primary m-3">+ Add New Row</button>
                    <div class="col-12">
                        <div class="card">
                          
                            
                            <div class="table-responsive p-1">
                                <table class="table table-bordered table-responsive-lg" id="opmm-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Development Area</th>
                                            <th scope="col" colspan="7"><?= $row2['development_area'] ?></th>
                                            
                                        </tr>
                                       
                                        <tr>
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
                <td>" . htmlspecialchars($row['outcome']) . "</td>
                <td>" . htmlspecialchars($row['strategy']) . "</td>
                <td>" . htmlspecialchars($row['pap_name']) . "</td>
                <td>" . htmlspecialchars($row['performance_indicator']) . "</td>
                <td>" . htmlspecialchars($row['actual_accomplishments']) . "</td>
                <td>" . htmlspecialchars($row['variance']) . "</td>
                <td>" . htmlspecialchars($row['remarks']) . "</td>
                <td><button class='edit-btn btn btn-primary' onclick='editRow(this)'>Edit</button></td>
          
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
    <script>
function editDA(button) {
            // Get the row where the button was clicked
            var row = button.parentElement.parentElement;

            // Get the current values of the row
            var cell1 = row.cells[1].innerText;
            var cell2 = row.cells[2].innerText;
            

            // Replace the current row values with input fields
            row.cells[1].innerHTML = `<input type="text" name="dname" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell1}"> `;
            row.cells[2].innerHTML = `<button type="submit" name="dname_btn" class="btn btn-success" >Save</button>`;

        }

        
function editOC(button) {
            // Get the row where the button was clicked
            var row = button.parentElement.parentElement;
            var cell1 = row.cells[1].innerText;
            var cell2 = row.cells[2].innerText;
            

            // Replace the current row values with input fields
            row.cells[1].innerHTML = `<input type="text" name="outcome" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell1}"> `;
            row.cells[2].innerHTML = `<button type="submit" name="outcome_btn" class="btn btn-success" >Save</button>`;
        }

        
function editST(button) {
            // Get the row where the button was clicked
            var row = button.parentElement.parentElement;

            var cell1 = row.cells[1].innerText;
            var cell2 = row.cells[2].innerText;
            

            // Replace the current row values with input fields
            row.cells[1].innerHTML = `<input type="text" name="strategy" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell1}"> `;
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

            // Replace the current row values with input fields
            row.cells[0].innerHTML = `<input type="text" name="pap_name" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;"  value="${cell1}">`;
            row.cells[1].innerHTML = `<input type="text" name="p_indicator" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell2}">`;
            row.cells[2].innerHTML = `<input type="text" name="personnel" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell3}">`;
            row.cells[3].innerHTML = `<input type="text" name="q1" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell4}">`;
            row.cells[4].innerHTML = `<input type="text" name="q2" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell5}">`;
            row.cells[5].innerHTML = `<input type="text" name="q3" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell6}">`;
            row.cells[6].innerHTML = `<input type="text" name="q3" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" value="${cell6}">`;
            row.cells[7].innerHTML = `<button type="submit" name="pap_btn" class="btn btn-success" >Save Data</button>`;

           
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
            

            // Add text input for each cell
            cell1.innerHTML = '<input type="text" name="pap_namea" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell2.innerHTML = '<input type="number" name="p_indicatora" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell3.innerHTML = '<input type="text" name="personnela" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell4.innerHTML = '<input type="text" name="q2a" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell5.innerHTML = '<input type="text" name="q3a" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell6.innerHTML = '<input type="text" name="q2a" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell7.innerHTML = '<input type="text" name="q2a" class="form-control" style="width: 300px; display: inline-block; border: 1px solid darkred;" >';
            cell8.innerHTML = '<button type="submit" class="btn btn-success" name="pap_new" >Insert Data</button>';
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
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
    
    $employee_id = isset($_GET['e_id']) ? intval($_GET['e_id']) : 0;

    if ($employee_id > 0) {
        // Prepare the SQL statement
        $query = "SELECT * FROM employee_full_data WHERE employee_id = :employee_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

    }
    ?>
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
   
            <div class="container-fluid">
          
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Employee Information</h4>
                                <br>
                                <form action="#">
                                    <div class="form-body">
                                     <h4 class="card-title" id="edata-title">Personal Info</h4>
                                     <hr class="red-hr">
                                    <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" value="<?= $row['first_name'] ?>" class="form-control" >
                                                    </div>
                                                </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Middle Name</label>
                                                    <input type="text" value="<?= $row['middle_name'] ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" value="<?= $row['last_name'] ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Sex</label>
                                                    <input type="text" value="<?= $row['sex'] ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="text" value="<?= $row['age'] ?>" class="form-control" >
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Date of Birth</label>
                                                    <input type="date" value="<?= $row['date_of_birth'] ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Place of Origin</label>
                                                    <input type="text" value="<?= $row['place_of_origin'] ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Civil Status</label>
                                                    <select class="form-control">
    <option value="" <?= $row['civil_status'] == '' ? 'selected' : '' ?>>Select...</option>
    <option value="Single" <?= $row['civil_status'] == 'Single' ? 'selected' : '' ?>>Single</option>
    <option value="Married" <?= $row['civil_status'] == 'Married' ? 'selected' : '' ?>>Married</option>
    <option value="Divorced" <?= $row['civil_status'] == 'Divorced' ? 'selected' : '' ?>>Divorced</option>
    <option value="Separated" <?= $row['civil_status'] == 'Separated' ? 'selected' : '' ?>>Separated</option>
    <option value="Widowed" <?= $row['civil_status'] == 'Widowed' ? 'selected' : '' ?>>Widowed</option>
</select>
   
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Contact No.</label>
                                                    <input type="text"  value="<?= $row['contact_number'] ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Email Address</label>
                                                    <input type="email" value="<?= $row['email'] ?>" class="form-control" >
                                                </div>
                                            </div>
                                           
                                        </div>

                                        <br>
                                        <h4 class="card-title mt-5" id="edata-title">Education</h4>
                                        <hr class="red-hr">
                                        
                                      <?php
if ($employee_id > 0) {
    // Prepare the SQL statement
    $query2 = "SELECT * FROM education WHERE employee_id = :employee_id";
    $stmt2 = $pdo->prepare($query2);
    $stmt2->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
    $stmt2->execute();

    // Fetch all results
    $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    if ($results2) {
        // Loop through each row and generate the HTML structure
        foreach ($results2 as $row2) {
            ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control">
                            <option value="" <?= htmlspecialchars($row2['Level']) == '' ? 'selected' : '' ?>>Select...</option>
                            <option value="Bachelors" <?= htmlspecialchars($row2['Level']) == 'Bachelors' ? 'selected' : '' ?>>Bachelor's</option>
                            <option value="Masters" <?= htmlspecialchars($row2['Level']) == 'Masters' ? 'selected' : '' ?>>Master's</option>
                            <option value="Doctorate" <?= htmlspecialchars($row2['Level']) == 'Doctorate' ? 'selected' : '' ?>>Doctorate</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Institution</label>
                        <input type="text" value="<?= htmlspecialchars($row2['Institution']) ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Degree</label>
                        <input type="text" value="<?= htmlspecialchars($row2['Degree']) ?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Major/Specialization</label>
                        <input type="text" value="<?= htmlspecialchars($row2['Major_Specialization']) ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Year Graduated</label>
                        <input type="text" value="<?= htmlspecialchars($row2['Year_Graduated']) ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Units Earned</label>
                        <input type="text" value="<?= htmlspecialchars($row2['Units_Earned']) ?>" class="form-control">
                    </div>
                </div>
            </div>
            <hr>
            <?php
        }
    } else {
        echo '<p>No education records found for Employee ID: ' . htmlspecialchars($employee_id) . '</p>';
    }
} else {
    // If no employee_id is selected, display empty input fields
    ?>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Level</label>
                <select class="form-control">
                    <option value="" selected>Select...</option>
                    <option value="Bachelors">Bachelor's</option>
                    <option value="Masters">Master's</option>
                    <option value="Doctorate">Doctorate</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Institution</label>
                <input type="text" value="" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Degree</label>
                <input type="text" value="" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Major/Specialization</label>
                <input type="text" value="" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Year Graduated</label>
                <input type="text" value="" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Units Earned</label>
                <input type="text" value="" class="form-control">
            </div>
        </div>
    </div>
    <?php
}

?>
                                      
                                        <button type="submit" class="btn btn-info">+ Add New</button>
                                        <br>
                                        <h4 class="card-title mt-5" id="edata-title">Licenses and Organizations</h4>
                                        <hr class="red-hr">
                                        
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Type</label>
                                                    </div>
                                                </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Actions</label>
                                                </div>
                                            </div>
                                           
                                        </div>

                                        <?php
                                         if ($employee_id > 0) {
  $query1 = "SELECT * FROM licensesandorganizations WHERE employee_id = :employee_id";
        $stmt1 = $pdo->prepare($query1);
        $stmt1->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
        $stmt1->execute();

        // Fetch all results
        $results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        if ($results1) {
            // Loop through each row and generate the HTML structure
            foreach ($results1 as $row1) {
                echo '<div class="row">';
                echo '    <div class="col-md-4">';
                echo '        <div class="form-group">';
                echo '            <input type="text" class="form-control" value="' . htmlspecialchars($row1['Type']) . '" >';
                echo '        </div>';
                echo '    </div>';
                echo '    <div class="col-md-4">';
                echo '        <div class="form-group">';
                echo '            <input type="text" class="form-control" value="' . htmlspecialchars($row1['Name']) . '" >';
                echo '        </div>';
                echo '    </div>';
                echo '    <div class="col-md-4">';
                echo '        <div class="form-group">';
                echo '            <input type="text" class="form-control" value="View | Edit | Delete" >';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            }
        } else {
            echo '<p>No licenses or organizations found for Employee ID: ' . htmlspecialchars($employee_id) . '</p>';
        }
    } else {
        // If no employee_id is selected, display empty input fields
        echo '<div class="row">';
        echo '    <div class="col-md-4">';
        echo '        <div class="form-group">';
        echo '            <input type="text" class="form-control" value="">';
        echo '        </div>';
        echo '    </div>';
        echo '    <div class="col-md-4">';
        echo '        <div class="form-group">';
        echo '            <input type="text" class="form-control" value="">';
        echo '        </div>';
        echo '    </div>';
        echo '    <div class="col-md-4">';
        echo '        <div class="form-group">';
        echo '            <input type="text" class="form-control" value="">';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
                                        ?>
                                        <button type="submit" class="btn btn-info">+ Add New</button>
                                       
                                       
                                        <br>
                                        <h4 class="card-title mt-5" id="edata-title">Teaching Load</h4>
                                        <hr class="red-hr">
                                        
                                       <?php

if ($employee_id > 0) {
    // Prepare the SQL statement
    $query3 = "SELECT * FROM teachingload WHERE employee_id = :employee_id";
    $stmt3 = $pdo->prepare($query3);
    $stmt3->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
    $stmt3->execute();

    // Fetch all results
    $results3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

    if ($results3) {
        // Loop through each row and generate the HTML structure
        foreach ($results3 as $row3) {
            ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Academic Load Units</label>
                        <input type="text" value="<?= htmlspecialchars($row3['Academic_Load_Units']) ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>General Education Units</label>
                        <input type="text" value="<?= htmlspecialchars($row3['General_Education_Units']) ?>" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course Type</label>
                        <select class="form-control">
                            <option value="" <?= htmlspecialchars($row3['Course_Type']) == '' ? 'selected' : '' ?>>Select...</option>
                            <option value="Academic" <?= htmlspecialchars($row3['Course_Type']) == 'Academic' ? 'selected' : '' ?>>Academic</option>
                            <option value="General" <?= htmlspecialchars($row3['Course_Type']) == 'General' ? 'selected' : '' ?>>General</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course Code</label>
                        <input type="text" value="<?= htmlspecialchars($row3['Course_Code']) ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course Title</label>
                        <input type="text" value="<?= htmlspecialchars($row3['Course_Title']) ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Units</label>
                        <input type="text" value="<?= htmlspecialchars($row3['Units']) ?>" class="form-control">
                    </div>
                </div>
            </div>
            <hr>
            <?php
        }
    } else {
        echo '<p>No teaching load records found for Employee ID: ' . htmlspecialchars($employee_id) . '</p>';
    }
} else {
    // If no employee_id is selected, display empty input fields
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Academic Load Units</label>
                <input type="text" value="" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>General Education Units</label>
                <input type="text" value="" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Course Type</label>
                <select class="form-control">
                    <option value="" selected>Select...</option>
                    <option value="Academic">Academic</option>
                    <option value="General">General</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Course Code</label>
                <input type="text" value="" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Course Title</label>
                <input type="text" value="" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Units</label>
                <input type="text" value="" class="form-control">
            </div>
        </div>
    </div>
    <?php
}

?>
                                        <button type="submit" class="btn btn-info">+ Add New</button>
                                        
                                        <br>
                                        <h4 class="card-title mt-5" id="edata-title">Work Info</h4>
                                        <hr class="red-hr">
                                        
                                        
                                        <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Date of Appointment</label>
                                                        <input type="text" value="<?= $row['Date_of_Appointment'] ?>"  class="form-control" >
                                                    </div>
                                                </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Years in Service</label>
                                                    <input type="text" value="<?= $row['Years_in_Service'] ?>"  class="form-control" >
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
                                                    <input type="text" value="<?= $row['Designation'] ?>"  class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Annual Salary</label>
                                                    <input type="text" value="<?= $row['Annual_Salary'] ?>"  class="form-control" >
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <hr class="red-hr">
                                        
                                    </div>
                                
                                    
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
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
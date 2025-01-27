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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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




    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        try {
        if ($employee_id > 0) {

            // PERSONAL INFORMATION
            $stmt = $pdo->prepare("UPDATE `employee_accounts` 
    SET 
        `username` = :username, 
        `password_hashed` = :password_hashed, 
        `first_name` = :first_name, 
        `middle_name` = :middle_name,
        `last_name` = :last_name, 
        `sex` = :sex, 
        `age` = :age, 
        `date_of_birth` = :date_of_birth, 
        `place_of_origin` = :place_of_origin, 
        `civil_status` = :civil_status, 
        `contact_number` = :contact_number, 
        `email` = :email, 
        `e_type` = :e_type 
    WHERE `employee_accounts`.`id` = :id");

            // Execute the query with the appropriate values
            $stmt->execute([
                'username' => $_POST['username'],
                'password_hashed' => encryptPassword($_POST['password'],), // Hash the password securely
                'first_name' => $_POST['p_fname'],
                'middle_name' => $_POST['p_mname'],
                'last_name' => $_POST['p_lname'],
                'sex' => $_POST['p_sex'],
                'age' => $_POST['p_age'],
                'date_of_birth' => $_POST['p_bday'],
                'place_of_origin' => $_POST['p_porigin'],
                'civil_status' => $_POST['p_cstatus'],
                'contact_number' => $_POST['p_contact'],
                'email' => $_POST['p_email'],
                'e_type' => $_POST['p_etype'],
                'id' => $_GET['e_id']
            ]);


            // EDUCATIONAL INFORMATION
            $educ_ids = $_POST['educ_id'];  // Array of education IDs
            $e_level = $_POST['e_level'];  // Array of levels
            $e_institution = $_POST['e_institution'];  // Array of institutions
            $e_degree = $_POST['e_degree'];  // Array of degrees
            $e_major = $_POST['e_major'];  // Array of majors
            $e_graduated = $_POST['e_graduated'];  // Array of graduation years
            $e_units = $_POST['e_units'];  // Array of units earned

            // Loop through each submitted row
            foreach ($educ_ids as $index => $educ_id) {
                // Check if the educ_id exists in the database
                $sql_check = "SELECT COUNT(*) FROM `education` WHERE `id` = :educ_id";
                $stmt_check = $pdo->prepare($sql_check);
                $stmt_check->bindParam(':educ_id', $educ_id);
                $stmt_check->execute();
                $exists = $stmt_check->fetchColumn();

                if ($exists > 0) {
                    // If educ_id exists, update the record
                    $sql_update = "UPDATE `education` 
                        SET `Level` = :level, 
                            `Institution` = :institution, 
                            `Degree` = :degree, 
                            `Major_Specialization` = :major, 
                            `Year_Graduated` = :graduated, 
                            `Units_Earned` = :units 
                        WHERE `id` = :educ_id";

                    // Prepare the update query
                    $stmt_update = $pdo->prepare($sql_update);
                    $stmt_update->bindParam(':level', $e_level[$index]);
                    $stmt_update->bindParam(':institution', $e_institution[$index]);
                    $stmt_update->bindParam(':degree', $e_degree[$index]);
                    $stmt_update->bindParam(':major', $e_major[$index]);
                    $stmt_update->bindParam(':graduated', $e_graduated[$index]);
                    $stmt_update->bindParam(':units', $e_units[$index]);
                    $stmt_update->bindParam(':educ_id', $educ_id);

                    try {
                        $stmt_update->execute();
                    } catch (PDOException $e) {
                        // Handle any errors during update
                        echo "Error updating education ID $educ_id: " . $e->getMessage() . "<br>";
                    }
                } else {
                    // If educ_id does not exist, insert a new record
                    $sql_insert = "INSERT INTO `education` 
                        ( `employee_id` ,`Level`,  `Institution`, `Degree`, `Major_Specialization`, `Year_Graduated`, `Units_Earned`) 
                        VALUES (:em_id, :level, :institution, :degree, :major, :graduated, :units)";

                    // Prepare the insert query
                    $stmt_insert = $pdo->prepare($sql_insert);
                    $stmt_insert->bindParam(':em_id', $_GET['e_id']);
                    $stmt_insert->bindParam(':level', $e_level[$index]);
                    $stmt_insert->bindParam(':level', $e_level[$index]);
                    $stmt_insert->bindParam(':institution', $e_institution[$index]);
                    $stmt_insert->bindParam(':degree', $e_degree[$index]);
                    $stmt_insert->bindParam(':major', $e_major[$index]);
                    $stmt_insert->bindParam(':graduated', $e_graduated[$index]);
                    $stmt_insert->bindParam(':units', $e_units[$index]);

                    try {
                        $stmt_insert->execute();
                    } catch (PDOException $e) {
                        // Handle any errors during insert
                        echo "Error inserting education for level " . $e_level[$index] . ": " . $e->getMessage() . "<br>";
                    }
                }
            }



            // LICENSES INFORMATION
            $license_ids = $_POST['licenseid'];  // Array of license IDs
            $l_type = $_POST['l_type'];  // Array of types
            $l_name = $_POST['l_name'];  // Array of names

            // Validate that all arrays have the same length
            if (count($license_ids) === count($l_type) && count($license_ids) === count($l_name)) {
                // Loop through each submitted row
                foreach ($license_ids as $index => $license_id) {
                    // Check if the license_id exists in the database
                    $sql_check = "SELECT COUNT(*) FROM `licensesandorganizations` WHERE `id` = :license_id";
                    $stmt_check = $pdo->prepare($sql_check);
                    $stmt_check->bindParam(':license_id', $license_id);
                    $stmt_check->execute();
                    $exists = $stmt_check->fetchColumn();

                    if ($exists > 0) {
                        // If license_id exists, update the record
                        $sql_update = "UPDATE `licensesandorganizations` 
                            SET `Type` = :type, 
                                `Name` = :name 
                            WHERE `id` = :l_id";

                        // Prepare the update query
                        $stmt_update = $pdo->prepare($sql_update);
                        $stmt_update->bindParam(':type', $l_type[$index]);
                        $stmt_update->bindParam(':name', $l_name[$index]);
                        $stmt_update->bindParam(':l_id', $license_id);

                        try {
                            $stmt_update->execute();
                        } catch (PDOException $e) {
                            // Handle any errors during update
                            echo "Error updating license ID $license_id: " . $e->getMessage() . "<br>";
                        }
                    } else {
                        // If license_id does not exist, insert a new record
                        $sql_insert = "INSERT INTO `licensesandorganizations` 
                            (`employee_id` ,`Type`, `Name`) 
                            VALUES (:em_id, :type, :name)";

                        // Prepare the insert query
                        $stmt_insert = $pdo->prepare($sql_insert);
                        $stmt_insert->bindParam(':em_id', $_GET['e_id']);
                        $stmt_insert->bindParam(':type', $l_type[$index]);
                        $stmt_insert->bindParam(':name', $l_name[$index]);

                        try {
                            $stmt_insert->execute();
                        } catch (PDOException $e) {
                            // Handle any errors during insert
                            echo "Error inserting license for type " . $l_type[$index] . ": " . $e->getMessage() . "<br>";
                        }
                    }
                }
            } else {
                echo "Error: Mismatched input arrays.";
            }




            // TEACHING LOAD INFORMATION
            $tload_ids = $_POST['tload_id'];  // Array of teaching load IDs
            $t_ctype = $_POST['t_ctype'];    // Array of course types
            $t_ccode = $_POST['t_ccode'];    // Array of course codes
            $t_ctitle = $_POST['t_ctitle'];  // Array of course titles
            $t_units = $_POST['t_units'];    // Array of units
            $t_loads = $_POST['t_loads'];    // Array of academic load units
            $t_gunits = $_POST['t_gunits'];  // Array of general education units

            // Loop through each submitted row
            foreach ($tload_ids as $index => $tload_id) {
                // Check if the tload_id exists in the database
                $sql_check = "SELECT COUNT(*) FROM `teachingload` WHERE `id` = :tload_id";
                $stmt_check = $pdo->prepare($sql_check);
                $stmt_check->bindParam(':tload_id', $tload_id);
                $stmt_check->execute();
                $exists = $stmt_check->fetchColumn();

                if ($exists > 0) {
                    // If tload_id exists, update the record
                    $sql_update = "UPDATE `teachingload` 
                        SET 
                            `Course_Type` = :t_ctype,
                            `Course_Code` = :t_ccode, 
                            `Course_Title` = :t_ctitle, 
                            `Units` = :t_units, 
                            `Academic_Load_Units` = :t_loads, 
                            `General_Education_Units` = :t_gunits 
                        WHERE `id` = :tload_id";

                    // Prepare the update query
                    $stmt_update = $pdo->prepare($sql_update);
                    $stmt_update->bindParam(':t_ctype', $t_ctype[$index]);
                    $stmt_update->bindParam(':t_ccode', $t_ccode[$index]);
                    $stmt_update->bindParam(':t_ctitle', $t_ctitle[$index]);
                    $stmt_update->bindParam(':t_units', $t_units[$index]);
                    $stmt_update->bindParam(':t_loads', $t_loads);
                    $stmt_update->bindParam(':t_gunits', $t_gunits);
                    $stmt_update->bindParam(':tload_id', $tload_id);

                    try {
                        $stmt_update->execute();
                    } catch (PDOException $e) {
                        // Handle any errors during update
                        echo "Error updating teaching load ID $tload_id: " . $e->getMessage() . "<br>";
                    }
                } else {
                    // If tload_id does not exist, insert a new record
                    $sql_insert = "INSERT INTO `teachingload` 
                        (`employee_id` ,`Course_Type`, `Course_Code`, `Course_Title`, `Units`, `Academic_Load_Units`, `General_Education_Units`) 
                        VALUES (:em_id, :t_ctype, :t_ccode, :t_ctitle, :t_units, :t_loads, :t_gunits)";

                    // Prepare the insert query
                    $stmt_insert = $pdo->prepare($sql_insert);
                    $stmt_insert->bindParam(':em_id', $_GET['e_id']);
                    $stmt_insert->bindParam(':t_ctype', $t_ctype[$index]);
                    $stmt_insert->bindParam(':t_ccode', $t_ccode[$index]);
                    $stmt_insert->bindParam(':t_ctitle', $t_ctitle[$index]);
                    $stmt_insert->bindParam(':t_units', $t_units[$index]);
                    $stmt_insert->bindParam(':t_loads', $t_loads);
                    $stmt_insert->bindParam(':t_gunits', $t_gunits);

                    try {
                        $stmt_insert->execute();
                    } catch (PDOException $e) {
                        // Handle any errors during insert
                        echo "Error inserting teaching load for course " . $t_ctitle[$index] . ": " . $e->getMessage() . "<br>";
                    }
                }
            }



            // WORK INFORMATION
            $stmt = $pdo->prepare("UPDATE `workinfo` 
            SET `Date_of_Appointment` = :doa, 
            `Years_in_Service` = :yis, 
            `Appointment_Status` = :ast, 
            `Tenure_of_Employment` = :toe, 
            `Faculty_Rank` = :frk,
            `Designation` = :desi, 
            `Annual_Salary` = :asy
            WHERE `workinfo`.`employee_id` = :woi_id");

            // Execute the query with the appropriate values
            $stmt->execute([
                'doa' => $_POST['w_dappointment'],
                'yis' => $_POST['w_yservice'], // Hash the password securely
                'ast' => $_POST['w_astatus'],
                'toe' => $_POST['w_temployment'],
                'frk' => $_POST['w_frank'],
                'desi' => $_POST['w_designation'],
                'asy' => $_POST['w_asalary'],
                'woi_id' => $_GET['e_id']
            ]);





            // Display success alert
            echo "<script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Record Updated',
                    text: 'The record has been updated successfully!',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = 'employees.php';
                });
                });
            </script>";
        } else {
            $emp_id = rand(9999, 999999);
            // Insert a new employee record
            $stmt = $pdo->prepare("INSERT INTO employee_accounts 
(id, username, password_hashed, first_name, middle_name, last_name, sex, age, date_of_birth, 
place_of_origin, civil_status, contact_number, email, e_type) 
VALUES 
(:id, :username, :password_hashed, :first_name, :middle_name, :last_name, :sex, :age, :date_of_birth, 
:place_of_origin, :civil_status, :contact_number, :email, :e_type)");

            // Execute the query
            $stmt->execute([
                'id' => $emp_id,
                'username' => $_POST['username'],
                'password_hashed' => encryptPassword($_POST['password']), // Hash the password securely
                'first_name' => $_POST['p_fname'],
                'middle_name' => $_POST['p_mname'],
                'last_name' => $_POST['p_lname'],
                'sex' => $_POST['p_sex'],
                'age' => $_POST['p_age'],
                'date_of_birth' => $_POST['p_bday'],
                'place_of_origin' => $_POST['p_porigin'],
                'civil_status' => $_POST['p_cstatus'],
                'contact_number' => $_POST['p_contact'],
                'email' => $_POST['p_email'],
                'e_type' => $_POST['p_etype'],
            ]);

            // Get the ID of the newly inserted employee
            $employee_id = $emp_id;

            // Insert educational information
            $e_level = $_POST['e_level'];
            $e_institution = $_POST['e_institution'];
            $e_degree = $_POST['e_degree'];
            $e_major = $_POST['e_major'];
            $e_graduated = $_POST['e_graduated'];
            $e_units = $_POST['e_units'];

            foreach ($e_level as $index => $level) {
                $stmt = $pdo->prepare("INSERT INTO education 
    (employee_id, Level, Institution, Degree, Major_Specialization, Year_Graduated, Units_Earned) 
    VALUES 
    (:employee_id, :level, :institution, :degree, :major, :graduated, :units)");
                $stmt->execute([
                    'employee_id' => $employee_id,
                    'level' => $level,
                    'institution' => $e_institution[$index],
                    'degree' => $e_degree[$index],
                    'major' => $e_major[$index],
                    'graduated' => $e_graduated[$index],
                    'units' => $e_units[$index],
                ]);
            }

            // Insert licenses information
            $l_type = $_POST['l_type'];
            $l_name = $_POST['l_name'];

            foreach ($l_type as $index => $type) {
                $stmt = $pdo->prepare("INSERT INTO licensesandorganizations 
    (employee_id, Type, Name) 
    VALUES 
    (:employee_id, :type, :name)");
                $stmt->execute([
                    'employee_id' => $employee_id,
                    'type' => $type,
                    'name' => $l_name[$index],
                ]);
            }

            // Insert teaching load information
            $t_ctype = $_POST['t_ctype'];
            $t_ccode = $_POST['t_ccode'];
            $t_ctitle = $_POST['t_ctitle'];
            $t_units = $_POST['t_units'];
            $t_loads = $_POST['t_loads'];
            $t_gunits = $_POST['t_gunits'];

            foreach ($t_ctype as $index => $ctype) {
                $stmt = $pdo->prepare("INSERT INTO teachingload 
    (employee_id, Course_Type, Course_Code, Course_Title, Units, Academic_Load_Units, General_Education_Units) 
    VALUES 
    (:employee_id, :course_type, :course_code, :course_title, :units, :academic_load, :gen_education_units)");
                $stmt->execute([
                    'employee_id' => $employee_id,
                    'course_type' => $ctype,
                    'course_code' => $t_ccode[$index],
                    'course_title' => $t_ctitle[$index],
                    'units' => $t_units[$index],
                    'academic_load' => $t_loads[$index],
                    'gen_education_units' => $t_gunits[$index],
                ]);
            }

            // Insert work information
            $stmt = $pdo->prepare("INSERT INTO workinfo 
(employee_id, Date_of_Appointment, Years_in_Service, Appointment_Status, Tenure_of_Employment, 
Faculty_Rank, Designation, Annual_Salary) 
VALUES 
(:employee_id, :doa, :yis, :ast, :toe, :frk, :desi, :asy)");

            $stmt->execute([
                'employee_id' => $employee_id,
                'doa' => $_POST['w_dappointment'],
                'yis' => $_POST['w_yservice'],
                'ast' => $_POST['w_astatus'],
                'toe' => $_POST['w_temployment'],
                'frk' => $_POST['w_frank'],
                'desi' => $_POST['w_designation'],
                'asy' => $_POST['w_asalary'],
            ]);

            // Display success alert
            echo "<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'success',
        title: 'Record Inserted',
        text: 'A new record has been created successfully!',
        timer: 2000,
        showConfirmButton: false
    }).then(() => {
        window.location.href = 'employees.php';
    });
});
</script>";
        }
    

} catch (PDOException $e) {
    // Handle any errors during insert
    echo "<script>
document.addEventListener('DOMContentLoaded', function () {
Swal.fire({
icon: 'error',
title: 'Error inserting data',
text: 'Recheck your inputs',
timer: 5000,
showConfirmButton: false
}).then(() => {
window.location.href = window.location.href;
});
});
</script>";
}
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

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <?php include("./nav.php") ?>

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Employee Information
                            Management </h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Teaching
                                        Employee Information</li>
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
                                <form method="post">
                                    <div class="form-body">
                                        <h4 class="card-title" id="edata-title">Personal Information</h4>
                                        <hr class="red-hr">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="input-label-e">Username</label>
                                                    <input required type="text" name="username" value="<?= $row['username'] ?? '' ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="input-label-e">Password</label>
                                                    <input required type="text" name="password" value="<?php if (isset($_GET['e_id'])) {
                                                                                                            echo decryptPassword($row['password_hashed']);
                                                                                                        } else {
                                                                                                            echo '';
                                                                                                        } ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="input-label-e">First Name</label>
                                                    <input required type="text" name="p_fname" value="<?= $row['first_name'] ?? '' ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="input-label-e">Middle Name</label>
                                                    <input required type="text" name="p_mname" value="<?= $row['middle_name'] ?? '' ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="input-label-e">Last Name</label>
                                                    <input required type="text" name="p_lname" value="<?= $row['last_name'] ?? '' ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="input-label-e">Sex</label>

                                                    <select class="form-control" required name="p_sex">
                                                        <option value="" <?= ($row['sex']  ?? '') == '' ? 'selected' : '' ?>>Select...</option>
                                                        <option value="Male" <?= ($row['sex']  ?? '') == 'Male' ? 'selected' : '' ?>>Male</option>
                                                        <option value="Female" <?= ($row['sex']  ?? '') == 'Female' ? 'selected' : '' ?>>Female</option>
                                                        <option value="Other" <?= ($row['sex']  ?? '') == 'Other' ? 'selected' : '' ?>>Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="input-label-e">Date of Birth</label>
                                                    <input required type="date"   name="p_bday" id="birthDate" onchange="calculateAge()" value="<?= $row['date_of_birth'] ?? '' ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            

                                        </div>
                                        <div class="row">
                                        <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="input-label-e">Age</label>
                                                    <input required type="number" readonly id="age" name="p_age"  value="<?= $row['age'] ?? '' ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="input-label-e">Place of Origin</label>
                                                    <input required type="text" name="p_porigin" value="<?= $row['place_of_origin'] ?? '' ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="input-label-e">Civil Status</label>
                                                    <select class="form-control" required name="p_cstatus">
                                                        <option value="" <?= ($row['civil_status']  ?? '') == '' ? 'selected' : '' ?>>Select...</option>
                                                        <option value="Single" <?= ($row['civil_status']  ?? '') == 'Single' ? 'selected' : '' ?>>Single</option>
                                                        <option value="Married" <?= ($row['civil_status']  ?? '') == 'Married' ? 'selected' : '' ?>>Married</option>
                                                        <option value="Divorced" <?= ($row['civil_status']  ?? '') == 'Divorced' ? 'selected' : '' ?>>Divorced</option>
                                                        <option value="Separated" <?= ($row['civil_status']  ?? '') == 'Separated' ? 'selected' : '' ?>>Separated</option>
                                                        <option value="Widowed" <?= ($row['civil_status']  ?? '') == 'Widowed' ? 'selected' : '' ?>>Widowed</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="input-label-e">Contact No.</label>
                                                    <input required type="text" pattern="^09\d{9}$" name="p_contact" value="<?= $row['contact_number'] ?? '' ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="input-label-e">Email Address</label>
                                                    <input required type="email" name="p_email" value="<?= $row['email'] ?? '' ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="input-label-e">Employee Type</label>
                                                    <input required type="text"  name="p_etype" value="teaching"
                                                        class="form-control" readonly>
                                                    
                                                </div>
                                            </div>

                                        </div>

                                        <br>

                                        <h4 class="card-title mt-5" id="edata-title">Education</h4>
                                        <hr class="red-hr">
                                        <div class="box-form">
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
                                                                    <input required type="text" name="educ_id[]"
                                                                        value="<?= htmlspecialchars($row2['id']) ?>"
                                                                        class="form-control" style="display:none">
                                                                    <label class="input-label-e">Level</label>
                                                                    <select class="form-control" required name="e_level[]">
                                                                        <option value="" <?= htmlspecialchars($row2['Level']) == '' ? 'selected' : '' ?>>Select...</option>
                                                                        <option value="Bachelors"
                                                                            <?= htmlspecialchars($row2['Level']) == 'Bachelors' ? 'selected' : '' ?>>Bachelor's</option>
                                                                        <option value="Masters"
                                                                            <?= htmlspecialchars($row2['Level']) == 'Masters' ? 'selected' : '' ?>>Master's</option>
                                                                        <option value="Doctorate"
                                                                            <?= htmlspecialchars($row2['Level']) == 'Doctorate' ? 'selected' : '' ?>>Doctorate</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="input-label-e">Institution</label>
                                                                    <input required type="text" name="e_institution[]"
                                                                        value="<?= htmlspecialchars($row2['Institution']) ?>"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="input-label-e">Degree</label>
                                                                    <input required type="text" name="e_degree[]"
                                                                        value="<?= htmlspecialchars($row2['Degree']) ?>"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="input-label-e">Major/Specialization</label>
                                                                    <input required type="text" name="e_major[]"
                                                                        value="<?= htmlspecialchars($row2['Major_Specialization']) ?>"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="input-label-e">Year Graduated</label>
                                                                    <select name="e_graduated[]" required class="form-control">
  <?php
    $currentYear = date("Y"); // Get the current year
    for ($year = 1900; $year <= $currentYear; $year++) {
        // Check if this year matches the Year_Graduated value
        $selected = ($year == $row2['Year_Graduated']) ? 'selected' : '';
        echo "<option value=\"$year\" $selected>$year</option>";
    }
  ?>
</select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="input-label-e">Units Earned</label>
                                                                    <input required type="number" name="e_units[]"
                                                                        value="<?= htmlspecialchars($row2['Units_Earned']) ?>"
                                                                        class="form-control">
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
                                                            <input required type="text" name="educ_id[]"
                                                                value="<?= rand(999, 99999)  ?>"
                                                                class="form-control" style="display:none">
                                                            <label class="input-label-e">Level</label>
                                                            <select class="form-control" required name="e_level[]">
                                                                <option value="" selected>Select...</option>
                                                                <option value="Bachelors">Bachelor's</option>
                                                                <option value="Masters">Master's</option>
                                                                <option value="Doctorate">Doctorate</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Institution</label>
                                                            <input required type="text" name="e_institution[]" value="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Degree</label>
                                                            <input required type="text" name="e_degree[]" value="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Major/Specialization</label>
                                                            <input required type="text" name="e_major[]" value="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Year Graduated</label>
                                                            <select  required name="e_graduated[]" value="" class="form-control">
                                                            <?php
                                                                $currentYear = date("Y"); // Get the current year
                                                                for ($year = 1900; $year <= $currentYear; $year++) {
                                                                    echo "<option value=\"$year\">$year</option>";
                                                                }
                                                            ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Units Earned</label>
                                                            <input required type="number" name="e_units[]" value="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }

                                            ?>
                                            <div id="education"></div>
                                        </div>

                                        <button type="button" onclick="addEducation()" class="btn btn-info">+ Add
                                            New</button>
                                        <br>
                                        <h4 class="card-title mt-5" id="edata-title">Licenses and Organizations</h4>
                                        <hr class="red-hr">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="input-label-e">Type</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="input-label-e">Name</label>
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
                                                    echo '    <div class="col-md-6">';
                                                    echo '        <div class="form-group"> <input required type="text" name="licenseid[]"
                                                                    value="' . $row1['id'] . '"
                                                                    class="form-control" style="display:none">';
                                                    echo '            <input required name="l_type[]" type="text" class="form-control" value="' . htmlspecialchars($row1['Type']) . '" >';
                                                    echo '        </div>';
                                                    echo '    </div>';
                                                    echo '    <div class="col-md-6">';
                                                    echo '        <div class="form-group">';
                                                    echo '            <input required name="l_name[]"  type="text" class="form-control" value="' . htmlspecialchars($row1['Name']) . '" >';
                                                    echo '        </div>';
                                                    echo '    </div>';
                                                    echo '</div>';
                                                }
                                            } else {
                                                echo '<p>No licenses or organizations found for Employee ID: ' . htmlspecialchars($employee_id) . '</p>';
                                            }
                                        } else {
                                        ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input required type="text" name="licenseid[]"
                                                            value="<?= rand(999, 99999) ?>"
                                                            class="form-control" style="display:none">
                                                        <input required type="text" name="l_type[]" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input required type="text" name="l_name[]" class="form-control" value="">
                                                    </div>
                                                </div>
                                             
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div id="licenses"></div>
                                        <button type="button" onclick="addLicense()" class="btn btn-info">+ Add
                                            New</button>


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


                                            $queryunitsRow = "SELECT * FROM teachingload WHERE employee_id = :employee_id";
                                            $stmtunitsRow = $pdo->prepare($queryunitsRow);
                                            $stmtunitsRow->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
                                            $stmtunitsRow->execute();

                                            // Fetch all results
                                            $unitsRow = $stmtunitsRow->fetch(PDO::FETCH_ASSOC);


                                            if ($unitsRow) {
                                        ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Academic Load Units</label>
                                                            <input required type="number" name="t_loads"
                                                                value="<?= htmlspecialchars($unitsRow['Academic_Load_Units']) ?>"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="input-label-e">General Education Units</label>
                                                            <input required type="number" name="t_gunits"
                                                                value="<?= htmlspecialchars($unitsRow['General_Education_Units']) ?>"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="box-form">
                                                    <?php
                                                }

                                                if ($results3) {
                                                    // Loop through each row and generate the HTML structure
                                                    foreach ($results3 as $row3) {
                                                    ?>


                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <input required type="text" name="tload_id[]"
                                                                        value="<?= htmlspecialchars($row3['id']) ?>"
                                                                        class="form-control" style="display:none">
                                                                    <label class="input-label-e">Course Type</label>
                                                                    <select class="form-control" required name="t_ctype[]">
                                                                        <option value="" <?= htmlspecialchars($row3['Course_Type']) == '' ? 'selected' : '' ?>>Select...</option>
                                                                        <option value="Academic"
                                                                            <?= htmlspecialchars($row3['Course_Type']) == 'Academic' ? 'selected' : '' ?>>Academic</option>
                                                                        <option value="General"
                                                                            <?= htmlspecialchars($row3['Course_Type']) == 'General' ? 'selected' : '' ?>>General</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="input-label-e">Course Code</label>
                                                                    <input required type="text" name="t_ccode[]"
                                                                        value="<?= htmlspecialchars($row3['Course_Code']) ?>"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="input-label-e">Course Title</label>
                                                                    <input required type="text" name="t_ctitle[]"
                                                                        value="<?= htmlspecialchars($row3['Course_Title']) ?>"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="input-label-e">Units</label>
                                                                    <input required type="number" name="t_units[]"
                                                                        value="<?= htmlspecialchars($row3['Units']) ?>"
                                                                        class="form-control">
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
                                                            <label class="input-label-e">Academic Load Units</label>
                                                            <input required type="number" name="t_loads[]" value="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="input-label-e">General Education Units</label>
                                                            <input required type="number" name="t_gunits[]" value="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <input required type="text" name="tload_id[]"
                                                                value="<?= rand(999, 9999) ?>"
                                                                class="form-control" style="display:none">
                                                            <label class="input-label-e">Course Type</label>
                                                            <select class="form-control" required name="t_ctype[]">
                                                                <option value="" selected>Select...</option>
                                                                <option value="Academic">Academic</option>
                                                                <option value="General">General</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Course Code</label>
                                                            <input required type="text" name="t_ccode[]" value="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Course Title</label>
                                                            <input required type="text" name="t_ctitle[]" value="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Units</label>
                                                            <input required type="number" name="t_units[]" value="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }

                                            ?>
                                            <div id="tload"></div>
                                                </div>
                                                <button type="button" onclick="addTeachLoad()" class="btn btn-info">+ Add New</button>

                                                <br>
                                                <h4 class="card-title mt-5" id="edata-title">Work Information</h4>
                                                <hr class="red-hr">


                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Date of Appointment</label>
                                                            <input required type="date" name="w_dappointment"
                                                                value="<?= $row['Date_of_Appointment'] ?? '' ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Years in Service</label>
                                                            <input required type="number" name="w_yservice" value="<?= $row['Years_in_Service'] ?? '' ?>"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Appointment Status</label>
                                                            <select class="form-control" required name="w_astatus">
                                                                <option value="" selected="selected">Select...</option>
                                                                <option value="Full Time" <?= htmlspecialchars($row['Appointment_Status'] ?? '') == 'Full Time' ? 'selected' : '' ?>>Full Time</option>
                                                                <option value="Part Time" <?= htmlspecialchars($row['Appointment_Status'] ?? '') == 'Part Time' ? 'selected' : '' ?>>Part Time</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Tenure of Employment</label>
                                                            <select class="form-control" required name="w_temployment">
                                                                <option value="" selected="selected">Select...</option>
                                                                <option value="Permanent" <?= htmlspecialchars($row['Tenure_of_Employment'] ?? '') == 'Permanent' ? 'selected' : '' ?>>Permanent</option>
                                                                <option value="Temporary" <?= htmlspecialchars($row['Tenure_of_Employment'] ?? '') == 'Temporary' ? 'selected' : '' ?>>Temporary</option>
                                                                <option value="Contractual" <?= htmlspecialchars($row['Tenure_of_Employment'] ?? '') == 'Contractual' ? 'selected' : '' ?>>Contractual</option>
                                                                <option value="Guest Lecturer" <?= htmlspecialchars($row['Tenure_of_Employment'] ?? '') == 'Guest Lecturer' ? 'selected' : '' ?>>Guest Lecturer</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Faculty Rank</label>
                                                            <select class="form-control" required name="w_frank">
                                                                <option value="" selected="selected">Select...</option>
                                                                <option value="Instructor I" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Instructor I' ? 'selected' : '' ?>>Instructor I</option>
                                                                <option value="Instructor II" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Instructor II' ? 'selected' : '' ?>>Instructor II</option>
                                                                <option value="Instructor III" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Instructor III' ? 'selected' : '' ?>>Instructor III</option>
                                                                <option value="Assistant Professor I" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Assistant Professor I' ? 'selected' : '' ?>>Assistant Professor I
                                                                </option>
                                                                <option value="Assistant Professor II" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Assistant Professor II' ? 'selected' : '' ?>>Assistant Professor II
                                                                </option>
                                                                <option value="Assistant Professor III" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Assistant Professor III' ? 'selected' : '' ?>>Assistant Professor III
                                                                </option>
                                                                <option value="Assistant Professor IV" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == '>Assistant Professor IV' ? 'selected' : '' ?>>Assistant Professor IV
                                                                </option>
                                                                <option value="Associate Professor I" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Associate Professor I' ? 'selected' : '' ?>>Associate Professor I
                                                                </option>
                                                                <option value="Associate Professor II" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Associate Professor II' ? 'selected' : '' ?>>Associate Professor II
                                                                </option>
                                                                <option value="Associate Professor III" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Associate Professor III' ? 'selected' : '' ?>>Associate Professor III
                                                                </option>
                                                                <option value="Associate Professor IV" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Associate Professor IV' ? 'selected' : '' ?>>Associate Professor IV
                                                                </option>
                                                                <option value="Associate Professor V" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Associate Professor V' ? 'selected' : '' ?>>Associate Professor V
                                                                </option>
                                                                <option value="Professor I" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Professor I' ? 'selected' : '' ?>>Professor I</option>
                                                                <option value="Professor II" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Professor II' ? 'selected' : '' ?>>Professor II</option>
                                                                <option value="Professor III" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Professor III' ? 'selected' : '' ?>>Professor III</option>
                                                                <option value="Professor IV" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Professor IV' ? 'selected' : '' ?>>Professor IV</option>
                                                                <option value="Professor V" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Professor V' ? 'selected' : '' ?>>Professor V</option>
                                                                <option value="Professor VI" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Professor VI' ? 'selected' : '' ?>>Professor VI</option>
                                                                <option value="College/University Professor" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'College/University Professor' ? 'selected' : '' ?>>College/University Professor</option>
                                                                <option value="Lecturer I" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Lecturer II' ? 'selected' : '' ?>>Lecturer I</option>
                                                                <option value="Lecturer II" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Lecturer II' ? 'selected' : '' ?>>Lecturer II</option>
                                                                <option value="Lecturer III" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Lecturer III' ? 'selected' : '' ?>>Lecturer III</option>
                                                                <option value="Lecturer IV" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Lecturer IV' ? 'selected' : '' ?>>Lecturer IV</option>
                                                                <option value="Lecturer V" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Lecturer V' ? 'selected' : '' ?>>Lecturer V</option>
                                                                <option value="Lecturer VI" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Lecturer VI' ? 'selected' : '' ?>>Lecturer VI</option>
                                                                <option value="Lecturer VII" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Lecturer VII' ? 'selected' : '' ?>>Lecturer VII</option>
                                                                <option value="Senior Lecturer I" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Senior Lecturer III' ? 'selected' : '' ?>>Senior Lecturer I</option>
                                                                <option value="Senior Lecturer II" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Senior Lecturer II' ? 'selected' : '' ?>>Senior Lecturer II</option>
                                                                <option value="Senior Lecturer III" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Senior Lecturer III' ? 'selected' : '' ?>>Senior Lecturer III</option>
                                                                <option value="Senior Lecturer IV" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Senior Lecturer IV' ? 'selected' : '' ?>>Senior Lecturer IV</option>
                                                                <option value="Senior Lecturer V" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Senior Lecturer V' ? 'selected' : '' ?>>Senior Lecturer V</option>
                                                                <option value="Professorial Lecturer I" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Professorial Lecturer I' ? 'selected' : '' ?>>Professorial Lecturer I
                                                                </option>
                                                                <option value="Professorial Lecturer II" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Professorial Lecturer II' ? 'selected' : '' ?>>Professorial Lecturer
                                                                    II</option>
                                                                <option value="Professorial Lecturer III" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Professorial Lecturer III' ? 'selected' : '' ?>>Professorial Lecturer
                                                                    III</option>
                                                                <option value="Professorial Lecturer IV" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Professorial Lecturer IV' ? 'selected' : '' ?>>Professorial Lecturer
                                                                    IV</option>
                                                                <option value="Professorial Lecturer V" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Professorial Lecturer V' ? 'selected' : '' ?>>Professorial Lecturer V
                                                                </option>
                                                                <option value="Professorial Lecturer VI" <?= htmlspecialchars($row['Faculty_Rank'] ?? '') == 'Professorial Lecturer VI' ? 'selected' : '' ?>>Professorial Lecturer
                                                                    VI</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Designation</label>
                                                            <input required type="text" name="w_designation" value="<?= $row['Designation'] ?? '' ?>"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="input-label-e">Annual Salary</label>
                                                            <input required type="number" name="w_asalary" value="<?= $row['Annual_Salary'] ?? '' ?>"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr class="red-hr">

                                    </div>


                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            
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
    <script>
    function addEducation() {
        const educationDiv = document.getElementById("education");

        // Create the HTML structure with a delete button
        const educationHtml = `
            <div class="education-section">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input required type="text" name="educ_id[]" value="<?= rand(999, 99999) ?>" class="form-control" style="display:none">
                            <label class="input-label-e">Level</label>
                            <select class="form-control" required name="e_level[]">
                                <option value="" selected>Select...</option>
                                <option value="Bachelors">Bachelor's</option>
                                <option value="Masters">Master's</option>
                                <option value="Doctorate">Doctorate</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="input-label-e">Institution</label>
                            <input required type="text" name="e_institution[]" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="input-label-e">Degree</label>
                            <input required type="text" name="e_degree[]" value="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="input-label-e">Major/Specialization</label>
                            <input required type="text" name="e_major[]" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="input-label-e">Year Graduated</label>
                            <select  required name="e_graduated[]" value="" class="form-control">
                                                            <?php
                                                                $currentYear = date("Y"); // Get the current year
                                                                for ($year = 1900; $year <= $currentYear; $year++) {
                                                                    echo "<option value=\"$year\">$year</option>";
                                                                }
                                                            ?>
                                                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="input-label-e">Units Earned</label>
                            <input required type="number" name="e_units[]" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-danger mt-2" onclick="this.parentElement.remove()">Delete</button>
                <hr>
            </div>
        `;

        educationDiv.insertAdjacentHTML("beforeend", educationHtml);
    }

    function addLicense() {
        const licenseDiv = document.getElementById("licenses");

        // Create the HTML structure with a delete button
        const licenseHtml = `
            <div class="license-section">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input required type="text" name="licenseid[]" value="<?= rand(999, 99999) ?>" class="form-control" style="display:none">
                            <input required type="text" class="form-control" name="l_type[]" placeholder="License type here">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input required type="text" class="form-control" name="l_name[]" placeholder="License name here">
                        </div>
                    </div>
                  
                </div>
                <button type="button" class="btn btn-danger mt-2" onclick="this.parentElement.remove()">Delete</button>
                <hr>
            </div>
        `;

        licenseDiv.insertAdjacentHTML("beforeend", licenseHtml);
    }

    function addTeachLoad() {
        const tloadDiv = document.getElementById("tload");

        // Create the HTML structure with a delete button
        const tloadHtml = `
            <div class="tload-section">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input required type="text" name="tload_id[]" value="<?= rand(999, 9999) ?>" class="form-control" style="display:none">
                            <label class="input-label-e">Course Type</label>
                            <select class="form-control" required name="t_ctype[]">
                                <option value="" selected>Select...</option>
                                <option value="Academic">Academic</option>
                                <option value="General">General</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label-e">Course Code</label>
                            <input required type="text" name="t_ccode[]" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label-e">Course Title</label>
                            <input required type="text" name="t_ctitle[]" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label-e">Units</label>
                            <input required type="number" name="t_units[]" value="" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-danger mt-2" onclick="this.parentElement.remove()">Delete</button>
                <hr>
            </div>
        `;

        tloadDiv.insertAdjacentHTML("beforeend", tloadHtml);
    }

    function calculateAge() {
    const birthDateInput = document.getElementById('birthDate');
    const ageInput = document.getElementById('age');

    // Ensure the birthDateInput has a value
    if (birthDateInput.value) {
        const today = new Date();
        const birthDate = new Date(birthDateInput.value);

        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();

        // Adjust age if the birth date has not occurred yet this year
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        ageInput.value = age;
    } else {
        ageInput.value = ''; // Clear the age field if no date is selected
    }
}
    const dp = document.getElementById('birthDate');

    // Set the starting date to 2022-01-01
    dp.value = '2002-01-01';

    // Get today's date in the format YYYY-MM-DD
    const today = new Date();
    const todayFormatted = today.toISOString().split('T')[0];
    dp.setAttribute('max', todayFormatted);

    // Update the date range display
    const maxDate = dp.getAttribute('max');
    document.getElementById('dateRange').textContent = 
        'Accepted Date Range: Starting from 2002-01-01 to ' + maxDate;

    dp.addEventListener('change', function () {
        const dateSelect = dp.value;
        document.getElementById('selectedDate').textContent = 
            'Selected Date: ' + dateSelect;
    });

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
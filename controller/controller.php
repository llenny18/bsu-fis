

<?php
include("../model/conn.php");



define('ENCRYPTION_KEY', 'aEloMUFGdmJlSnBFUEVhZzRNbkJ5UktGbVJiMUUvcGhqTDJadXFkMVUxaz06OkygJAkjIuZV690rgA7wOFY='); 
define('ENCRYPTION_METHOD', 'AES-256-CBC'); 

function encryptPassword($password) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(ENCRYPTION_METHOD));
    $encrypted = openssl_encrypt($password, ENCRYPTION_METHOD, ENCRYPTION_KEY, 0, $iv);
    return base64_encode($encrypted . '::' . $iv); // Store both encrypted data and IV
}


function decryptPassword($encryptedPassword) {
    list($encrypted_data, $iv) = explode('::', base64_decode($encryptedPassword), 2);
    return openssl_decrypt($encrypted_data, ENCRYPTION_METHOD, ENCRYPTION_KEY, 0, $iv);
}



// Encrypt the password
// $encryptedPassword = encryptPassword($plainPassword);
// echo "Encrypted Password: " . $encryptedPassword . PHP_EOL;

// Decrypt the password
// $decryptedPassword = decryptPassword($encryptedPassword);

// Function to fetch and display admin accounts
function display_admin_accounts($pdo) {
    try {
        // Query to fetch admin accounts
        $adminQuery = "SELECT id, full_name, username, password_hashed FROM admin_accounts WHERE status= 'saved'";
        $stmtAdmin = $pdo->prepare($adminQuery);
        $stmtAdmin->execute();
        $adminResults = $stmtAdmin->fetchAll(PDO::FETCH_ASSOC);

        
        // Display admin accounts
        foreach ($adminResults as $admin) {
            echo "<tr>
                    <td>{$admin['id']}</td>
                    <td>{$admin['full_name']}</td>
                    <td>{$admin['username']}</td>
                    <td>{$admin['password_hashed']}</td>
                    <td><a href='manage_admin.php?a_id={$admin['id']}' class='btn btn-success'>Edit</a><a href='archive.php?id_value={$admin['id']}&id_name=id&table=admin_accounts&link=admins.php' class='btn btn-danger'>Archive</a></td>
                  </tr>";
        }

       
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Function to fetch and display employee accounts
function display_employee_accounts($pdo) {
    try {
        // Query to fetch employee accounts
        $employeeQuery = "SELECT * FROM employee_accounts WHERE status= 'saved'";
        $stmtEmployee = $pdo->prepare($employeeQuery);
        $stmtEmployee->execute();
        $employeeResults = $stmtEmployee->fetchAll(PDO::FETCH_ASSOC);

        // Display employee accounts
        foreach ($employeeResults as $employee) {
            echo "<tr>
                    <td>{$employee['id']}</td>
                <td>{$employee['username']}</td>
                <td>{$employee['password_hashed']}</td>
                <td>{$employee['first_name']} {$employee['middle_name']} {$employee['last_name']}</td>
               
              
                <td>
                    <a href='";
if($employee['e_type']== "teaching"){ echo "e_data.php"; }else{ echo "e_data_n.php"; }
                    echo "?e_id={$employee['id']}' class='btn btn-success'>View Full Data</a>
                    <a href='archive.php?id_value={$employee['id']}&id_name=id&table=employee_accounts&link=employees.php' class='btn btn-danger'>Archive</a>
                </td>
                  </tr>";
        
    }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}




function display_admin_accounts_a($pdo) {
    try {
        // Query to fetch admin accounts
        $adminQuery = "SELECT id, full_name, username, password_hashed FROM admin_accounts WHERE status= 'archived'";
        $stmtAdmin = $pdo->prepare($adminQuery);
        $stmtAdmin->execute();
        $adminResults = $stmtAdmin->fetchAll(PDO::FETCH_ASSOC);

        
        // Display admin accounts
        foreach ($adminResults as $admin) {
            echo "<tr>
                    <td>{$admin['id']}</td>
                    <td>{$admin['full_name']}</td>
                    <td>{$admin['username']}</td>
                    <td>{$admin['password_hashed']}</td>
                    <td><a href='manage_admin.php?a_id={$admin['id']}' class='btn btn-success'>Edit</a><a href='recover.php?id_value={$admin['id']}&id_name=id&table=admin_accounts&link=admins_a.php' class='btn btn-danger'>Restore</a></td>
                  </tr>";
        }

       
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Function to fetch and display employee accounts
function display_employee_accounts_a($pdo) {
    try {
        // Query to fetch employee accounts
        $employeeQuery = "SELECT * FROM employee_accounts WHERE status= 'archived'";
        $stmtEmployee = $pdo->prepare($employeeQuery);
        $stmtEmployee->execute();
        $employeeResults = $stmtEmployee->fetchAll(PDO::FETCH_ASSOC);

        // Display employee accounts
        foreach ($employeeResults as $employee) {
            echo "<tr>
                    <td>{$employee['id']}</td>
                <td>{$employee['username']}</td>
                <td>{$employee['password_hashed']}</td>
                <td>{$employee['first_name']} {$employee['middle_name']} {$employee['last_name']}</td>
               
              
                <td>
                    <a href='";
if($employee['e_type']== "teaching"){ echo "e_data.php"; }else{ echo "e_data_n.php"; }
                    echo "?e_id={$employee['id']}' class='btn btn-success'>View Full Data</a>
                    <a href='recover.php?id_value={$employee['id']}&id_name=id&table=employee_accounts&link=employees_a.php' class='btn btn-danger'>Restore</a>
                </td>
                  </tr>";
        
    }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Function to fetch and display data from the view
function display_pmm_data($pdo) {
    try {
        // Query to fetch data from the view
        $sql = "SELECT * FROM operational_plan_full  WHERE status= 'saved' GROUP BY unique_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Fetch all results
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if data is available
        if (!empty($data)) {
            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['unique_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['development_area_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['outcome_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['strategy_name']) . "</td>";
                echo "<td><a href='view-oppm.php?op_id={$row['unique_id']}' class='btn btn-success'>View Full Data</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='19'>No data found</td></tr>";
        }
    } catch (PDOException $e) {
        echo "<tr><td colspan='19'>Error: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
    }
}

// Function to fetch and display data from the view
function display_pmm_data_matrix($pdo) {
    try {
        // Query to fetch data from the view
        $sql = "SELECT *, operational_plan_monitoring_matrix.id as matrix_id  FROM `operational_plan_monitoring_matrix` inner join operational_plan_full on operational_plan_full.unique_id = operational_plan_monitoring_matrix.opmm_fid  WHERE operational_plan_full.status= 'saved' group by development_area_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Fetch all results
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if data is available
        if (!empty($data)) {
            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['matrix_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['development_area_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['outcome_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['strategy_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['pap_name']) . "</td>";
                echo "<td><a href='view-oppm-matrix.php?pap_id={$row['unique_id']}' class='btn btn-success'>View Full Data</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='19'>No data found</td></tr>";
        }
    } catch (PDOException $e) {
        echo "<tr><td colspan='19'>Error: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
    }
}

function get_pmm_data_matrix_count($pdo) {
    try {
        // Query to count the rows grouped by development_area
        $countSql = "SELECT COUNT(*) as row_count FROM operational_plan_monitoring_matrix";
        $countStmt = $pdo->prepare($countSql);
        $countStmt->execute();

        // Fetch the count result
        $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);
        return $countResult['row_count'];
    } catch (PDOException $e) {
        // Return 0 in case of an error
        return 0;
    }
}


function get_pmm_data_count($pdo) {
    try {
        // Query to count the rows grouped by development_area
        $countSql = "SELECT COUNT(*) as row_count FROM (SELECT development_area_name FROM operational_plan_full GROUP BY development_area_name) as grouped_data";
        $countStmt = $pdo->prepare($countSql);
        $countStmt->execute();

        // Fetch the count result
        $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);
        return $countResult['row_count'];
    } catch (PDOException $e) {
        // Return 0 in case of an error
        return 0;
    }
}

function get_employee_count($pdo) {
    try {
        // Query to count the rows grouped by development_area
        $countSql = "SELECT COUNT(*) as row_count FROM employee_accounts";
        $countStmt = $pdo->prepare($countSql);
        $countStmt->execute();

        // Fetch the count result
        $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);
        return $countResult['row_count'];
    } catch (PDOException $e) {
        // Return 0 in case of an error
        return 0;
    }
}


function get_admin_count($pdo) {
    try {
        // Query to count the rows grouped by development_area
        $countSql = "SELECT COUNT(*) as row_count FROM admin_accounts";
        $countStmt = $pdo->prepare($countSql);
        $countStmt->execute();

        // Fetch the count result
        $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);
        return $countResult['row_count'];
    } catch (PDOException $e) {
        // Return 0 in case of an error
        return 0;
    }
}


try {
    // Fetch data from the database
    $developmentAreasStmt = $pdo->query("SELECT id, name FROM development_area");
    $outcomesStmt = $pdo->query("SELECT id, name as outcome FROM outcome");
    $strategiesStmt = $pdo->query("SELECT id, name as strategy FROM strategy");
    $papStmt = $pdo->query("SELECT id, name FROM pap");

    $developmentAreas = $developmentAreasStmt->fetchAll(PDO::FETCH_ASSOC);
    $outcomes = $outcomesStmt->fetchAll(PDO::FETCH_ASSOC);
    $strategies = $strategiesStmt->fetchAll(PDO::FETCH_ASSOC);
    $pap = $papStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching data: " . $e->getMessage());
}

function getValueBeforeHyphen($string) {
    if (strpos($string, '-') !== false) {
        $parts = explode('-', $string);
    // Return the value before the first hyphen
    return trim($parts[0]);
    }
        else{
            return $string;
        }
    // Use explode to split the string at the first hyphen
    
}

function getValueAfterHyphen($string) {
    if (strpos($string, '-') !== false) {
        $parts = explode('-', $string);
    // Return the value after the hyphen
    return trim($parts[1]);
    }
        else{
            return $string;
        }
    // Use explode to split the string at the first hyphen
    
}

function findPAP($pdo, $npap_id, $opmm_fid) {
    try {
        $query_new = "SELECT COUNT(*) AS row_count FROM operational_plan_monitoring_matrix WHERE m_pap_id = :npap_id AND opmm_fid = :opmm_fid";
        $stmt_new = $pdo->prepare($query_new);
        $stmt_new->bindParam(':npap_id', $npap_id, PDO::PARAM_INT);
        $stmt_new->bindParam(':opmm_fid', $opmm_fid, PDO::PARAM_INT);
        $stmt_new->execute();
        $row_new = $stmt_new->fetch(PDO::FETCH_ASSOC);
        $row_count = $row_new['row_count'];

        if ($row_count == 0) {
            echo "<hr><a class='btn btn-success' href='view-oppm-matrix.php?new_id=" . htmlspecialchars($npap_id) . "&pap_id=" . htmlspecialchars($opmm_fid) . "'>Add to Matrix</a>";
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

